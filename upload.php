<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "db.php";

if (!$conn) {
    die("Database connection failed.");
}

if(!isset($_SESSION['id']))
{
    header("Location:login.php");
    exit();
}



if(isset($_FILES['resume']))
{

$file=$_FILES['resume'];
if ($file['error'] != 0) {
    die("File upload error: " . $file['error']);
}

$fileName=$file['name'];

$tmpName=$file['tmp_name'];

$size=$file['size'];

$error=$file['error'];

$extension=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

$allowed=array("pdf","doc","docx");

if(!in_array($extension,$allowed))
{

die("Only PDF and DOCX allowed");

}

$newName=time()."_".$fileName;

$destination="uploads/".$newName;

if(move_uploaded_file($tmpName,$destination))
{

$user=$_SESSION['id'];

$role=$_POST['jobrole'];

// Extract text from PDF
require_once 'vendor/autoload.php';
$text = "";
if ($extension == 'pdf') {
    try {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($destination);
        $text = $pdf->getText();
    } catch (Exception $e) {
        $text = "Error parsing PDF: " . $e->getMessage();
    }
} else {
    $text = "Could not extract text. File is not a PDF.";
}

// Call AI
include_once "gemini.php";
$aiResult = analyzeResumeAI($text, $role);
$aiJson = json_encode($aiResult);

$sql="INSERT INTO resumes(user_id,file_name,job_role,ai_analysis)

VALUES(?,?,?,?)";

$stmt=mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param($stmt,"isss",$user,$newName,$role,$aiJson);

if (!mysqli_stmt_execute($stmt)) {
    die("Database Error: " . mysqli_error($conn));
}

$resume_id = mysqli_insert_id($conn);

header("Location: result.php?id=" . $resume_id);
exit();
}
else{

echo "Upload Failed";

}

}

?>