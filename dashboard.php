<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$userId = $_SESSION['id'];
$name   = $_SESSION['name'];

/* ==========================
   Dashboard Statistics
========================== */

$totalResume = 0;
$atsScore = "--";

$res = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM resumes
WHERE user_id='$userId'");

if($res){
    $row = mysqli_fetch_assoc($res);
    $totalResume = $row['total'];
}

$result = mysqli_query($conn,
"SELECT ats_score
FROM resume_analysis
WHERE user_id='$userId'
ORDER BY id DESC
LIMIT 1");

if($result && mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $atsScore = $row['ats_score'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>AI Resume Analyzer Dashboard</title>


    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link rel="stylesheet"
href="css/dashboard.css">

<link rel="preconnect"
href="https://fonts.googleapis.com">

<link rel="preconnect"
href="https://fonts.gstatic.com"
crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>


<body>

<!-- ==========================
        SIDEBAR
========================== -->

<aside class="sidebar">

<div class="logo">

<div class="logo-icon">

<i class="fa-solid fa-brain"></i>

</div>

<div>

<h2>ResumeAI</h2>

<p>AI Resume Analyzer</p>

</div>

</div>

<nav>

<a href="dashboard.php" class="active">

<i class="fa-solid fa-house"></i>

<span>Dashboard</span>

</a>

<a href="result.php">

<i class="fa-solid fa-file-circle-check"></i>

<span>Reports</span>

</a>

<a href="#analysis">

<i class="fa-solid fa-chart-line"></i>

<span>ATS Analysis</span>

</a>

<div class="top-icons">

    <div class="notification">

        <i class="fa-solid fa-bell" id="bell"></i>

        <span class="badge">3</span>

        <div class="notification-box" id="notificationBox">

            <h3>Notifications</h3>

            <div class="notify-item">
                ✅ Resume analyzed successfully.
            </div>

            <div class="notify-item">
                🎯 ATS Score: 87%
            </div>

            <div class="notify-item">
                💡 Add SQL & Git to improve your ATS score.
            </div>

        </div>

    </div>

   <div class="top-icons">

    <div class="notification">

        <i class="fa-solid fa-bell" id="bell"></i>

        <span class="badge">3</span>

        <div class="notification-box" id="notificationBox">

            <h3>Notifications</h3>

            <div class="notify-item">
                ✅ Resume analyzed successfully.
            </div>

            <div class="notify-item">
                🎯 ATS Score: 87%
            </div>

            <div class="notify-item">
                💡 Add SQL & Git to improve your ATS score.
            </div>

        </div>

   <div class="top-icons">

    <div class="notification">

        <i class="fa-solid fa-bell" id="bell"></i>

        <span class="badge">3</span>

        <div class="notification-box" id="notificationBox">

            <h3>Notifications</h3>

            <div class="notify-item">
                ✅ Resume analyzed successfully.
            </div>

            <div class="notify-item">
                🎯 ATS Score: 87%
            </div>

            <div class="notify-item">
                💡 Add SQL & Git to improve your ATS score.
            </div>

        </div>

    </div>

    <a href="profile.php">
        <i class="fa-solid fa-circle-user"></i>
        <span>Profile</span>
    </a>

    <a href="#">
        <i class="fa-solid fa-gear"></i>
        <span>Settings</span>
    </a>

</div>

</div>

</nav>

<div class="sidebar-bottom">

<a href="logout.php" class="logout">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</div>

</aside>

<!-- ==========================
        MAIN CONTENT
========================== -->

<main class="main-content">

<!-- HEADER -->

<header class="topbar">

<div>

<h1>

Welcome Back,
<strong><?php echo htmlspecialchars($name); ?></strong> 👋

</h1>

<p>

Track your resume performance and improve your ATS score with AI.

</p>

</div>

<div class="profile-box">

<div class="profile-icon">

<i class="fa-solid fa-user"></i>

</div>

<div>

<span>Logged in as</span>

<h3><?php echo htmlspecialchars($name); ?></h3>

</div>

</div>

</header>

<!-- ==========================
        DASHBOARD CARDS
========================== -->

<section class="dashboard-cards">

<div class="card">

<div class="card-icon blue">

<i class="fa-solid fa-file"></i>

</div>

<div>

<h2><?php echo $totalResume; ?></h2>

<p>Uploaded Resumes</p>

</div>

</div>

<div class="card">

<div class="card-icon green">

<i class="fa-solid fa-chart-simple"></i>

</div>

<div>

<h2><?php echo $atsScore; ?>%</h2>

<p>Latest ATS Score</p>

</div>

</div>

<div class="card">

<div class="card-icon orange">

<i class="fa-solid fa-briefcase"></i>

</div>

<div>

<h2>25+</h2>

<p>Job Roles</p>

</div>

</div>

<div class="card">

<div class="card-icon purple">

<i class="fa-solid fa-robot"></i>

</div>

<div>

<h2>AI</h2>

<p>Powered Analysis</p>

</div>

</div>

</section><!-- ===================================================
                UPLOAD RESUME SECTION
=================================================== -->

<section class="upload-section">

    <div class="section-header">

        <h2>
            <i class="fa-solid fa-cloud-arrow-up"></i>
            Upload Resume
        </h2>

        <p>
            Upload your resume in PDF or DOCX format and let AI analyze it.
        </p>

    </div>

    <form action="upload.php"
          method="POST"
          enctype="multipart/form-data">

        <div class="upload-box">

            <i class="fa-solid fa-file-arrow-up upload-big-icon"></i>

            <h3>Drag & Drop Resume</h3>

            <p>or click below to choose your file</p>

            <label for="resume" class="choose-btn">

                Choose Resume

            </label>

            <input
                type="file"
                id="resume"
                name="resume"
                accept=".pdf,.doc,.docx"
                hidden
                required>

            <span id="fileName">

                No file selected

            </span>

        </div>

        <input
            type="text"
            name="jobrole"
            placeholder="Target Job Role (Example: Software Engineer)"
            required>

        <button class="analyze-btn">

            <i class="fa-solid fa-wand-magic-sparkles"></i>

            Analyze Resume

        </button>

    </form>

</section>



<!-- ===================================================
                AI ANALYSIS
=================================================== -->

<section class="analysis-section" id="analysis">

<h2>

<i class="fa-solid fa-chart-line"></i>

Resume Analysis

</h2>

<div class="analysis-grid">

<div class="analysis-card">

<div class="analysis-icon blue">

<i class="fa-solid fa-award"></i>

</div>

<h3>ATS Score</h3>

<div class="circle-score">

<?php echo ($atsScore=="--") ? "0%" : $atsScore."%"; ?>

</div>

<p>

Your latest AI generated ATS score.

</p>

</div>



<div class="analysis-card">

<div class="analysis-icon green">

<i class="fa-solid fa-lightbulb"></i>

</div>

<h3>AI Suggestions</h3>

<ul>

<li>Improve resume summary</li>

<li>Add measurable achievements</li>

<li>Use ATS keywords</li>

<li>Add projects</li>

</ul>

</div>



<div class="analysis-card">

<div class="analysis-icon orange">

<i class="fa-solid fa-code"></i>

</div>

<h3>Missing Skills</h3>

<div class="skills">

<span>Java</span>

<span>Python</span>

<span>Git</span>

<span>SQL</span>

<span>Communication</span>

</div>

</div>

</div>

</section>



<!-- ===================================================
            STRENGTHS & IMPROVEMENTS
=================================================== -->

<section class="strength-grid">

<div class="strength-card">

<h2>

<i class="fa-solid fa-circle-check"></i>

Strengths

</h2>

<ul>

<li>Professional layout</li>

<li>Readable formatting</li>

<li>Good education section</li>

<li>Clear section headings</li>

</ul>

</div>



<div class="strength-card danger">

<h2>

<i class="fa-solid fa-circle-xmark"></i>

Needs Improvement

</h2>

<ul>

<li>Add internships</li>

<li>Add certifications</li>

<li>Include more technical skills</li>

<li>Add achievements</li>

</ul>

</div>

</section>



<!-- ===================================================
                ATS PROGRESS
=================================================== -->

<section class="progress-section">

<h2>

<i class="fa-solid fa-chart-column"></i>

ATS Progress

</h2>

<div class="progress-card">

<div class="progress-head">

<span>Current Score</span>

<strong>

<?php echo ($atsScore=="--") ? "0%" : $atsScore."%"; ?>

</strong>

</div>

<div class="progress-bar">

<div class="progress-fill"

style="width:<?php echo ($atsScore=="--") ? 0 : $atsScore; ?>%;">

</div>

</div>

<p>

Aim for an ATS score above <strong>90%</strong>

</p>

</div>

</section>



<!-- ===================================================
                RECENT REPORTS
=================================================== -->

<section class="reports">

<h2>

<i class="fa-solid fa-folder-open"></i>

Recent Reports

</h2>

<table>

<thead>

<tr>

<th>Resume</th>

<th>Role</th>

<th>ATS</th>

<th>Status</th>

</tr>

</thead>

<tbody>

<tr>

<td colspan="4" class="empty">

No Resume Analysis Available

</td>

</tr>

</tbody>

</table>

</section>



<!-- ===================================================
                CAREER TIPS
=================================================== -->

<section class="career">

<h2>

<i class="fa-solid fa-lightbulb"></i>

Career Tips

</h2>

<div class="tips">

<div class="tip">

<i class="fa-solid fa-user-tie"></i>

<h3>Customize Resume</h3>

<p>

Tailor your resume according to each job description.

</p>

</div>

<div class="tip">

<i class="fa-solid fa-key"></i>

<h3>ATS Keywords</h3>

<p>

Use keywords from the job description.

</p>

</div>

<div class="tip">

<i class="fa-solid fa-diagram-project"></i>

<h3>Projects</h3>

<p>

Showcase projects with measurable outcomes.

</p>

</div>

<div class="tip">

<i class="fa-solid fa-certificate"></i>

<h3>Certifications</h3>

<p>

Add certifications to improve credibility.

</p>

</div>

</div>

</section>



<footer class="footer">

<p>

© <?php echo date("Y"); ?>

AI Resume Analyzer • Developed using PHP • MySQL • Gemini AI

</p>

</footer>

</main>

<script>

const resume=document.getElementById("resume");

const file=document.getElementById("fileName");

resume.onchange=function(){

if(this.files.length>0){

file.innerHTML=this.files[0].name;

}

}

</script>

</body>

</html>