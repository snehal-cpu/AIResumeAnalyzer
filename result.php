<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

if (!isset($_GET['id'])) {
    die("Invalid Request");
}

$id = $_GET['id'];

$sql = "SELECT * FROM resumes WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$resume = mysqli_fetch_assoc($result);

if (!$resume) {
    die("Resume not found.");
}

/* Temporary random scores */
$ats = rand(70, 95);
$skills = rand(75, 98);
$grammar = rand(80, 99);
$keywords = rand(65, 95);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Analysis Result</title>

    <style>
        body{
            font-family:Arial;
            background:#f4f7fb;
            padding:40px;
        }

        .container{
            max-width:900px;
            margin:auto;
            background:#fff;
            padding:40px;
            border-radius:15px;
            box-shadow:0 0 20px rgba(0,0,0,.1);
        }

        h1{
            color:#4f46e5;
        }

        .score{
            font-size:60px;
            color:#22c55e;
            font-weight:bold;
        }

        .card{
            background:#eef2ff;
            padding:20px;
            margin:15px 0;
            border-radius:10px;
        }

        ul{
            line-height:2;
        }

        .btn{
            display:inline-block;
            padding:12px 25px;
            background:#4f46e5;
            color:white;
            text-decoration:none;
            border-radius:8px;
            margin-top:20px;
        }

        .btn:hover{
            background:#3730a3;
        }
    </style>

</head>

<body>

<div class="container">

<h1>Resume Analysis Completed ✅</h1>

<p><strong>File:</strong> <?php echo htmlspecialchars($resume['file_name']); ?></p>

<p><strong>Target Role:</strong> <?php echo htmlspecialchars($resume['job_role']); ?></p>

<hr>

<h2>ATS Score</h2>

<div class="score"><?php echo $ats; ?>%</div>

<div class="card">
<strong>Skills Match:</strong> <?php echo $skills; ?>%
</div>

<div class="card">
<strong>Grammar Score:</strong> <?php echo $grammar; ?>%
</div>

<div class="card">
<strong>Keyword Match:</strong> <?php echo $keywords; ?>%
</div>

<h2>Suggestions</h2>

<ul>
<li>✔ Add more technical skills.</li>
<li>✔ Include measurable achievements.</li>
<li>✔ Improve your professional summary.</li>
<li>✔ Add GitHub and LinkedIn links.</li>
</ul>

<a href="dashboard.php" class="btn">Back to Dashboard</a>

</div>

</body>
</html>