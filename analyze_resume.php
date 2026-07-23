$resumeText = substr($resumeText, 0, 8000);
<?php
session_start();

require_once __DIR__ . "/extract_resume.php";
require_once __DIR__ . "/groq_service.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid Request");
}

if (!isset($_FILES["resume"]) || $_FILES["resume"]["error"] != 0) {
    die("Please upload a resume.");
}

$jobRole = trim($_POST["jobrole"]);

$uploadDir = "uploads/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$fileName = time() . "_" . basename($_FILES["resume"]["name"]);
$filePath = $uploadDir . $fileName;

if (!move_uploaded_file($_FILES["resume"]["tmp_name"], $filePath)) {
    die("Resume upload failed.");
}

// Extract Resume Text
$resumeText = extractResumeText($filePath);

if (!$resumeText) {
    die("Unable to extract text from the resume.");
}

// Send to Groq
$result = analyzeResumeWithGroq($resumeText, $jobRole);

if (!$result["success"]) {
    echo "<h2>Groq Error</h2>";
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    exit;
}

$analysis = $result["analysis"];

// Store data in session for result page
$_SESSION["analysis"] = $analysis;
$_SESSION["resume_name"] = basename($_FILES["resume"]["name"]);
$_SESSION["job_role"] = $jobRole;

// Redirect to result page
header("Location: result.php");
exit;
?>