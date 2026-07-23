<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AI Resume Analyzer | Dashboard</title>

    <link rel="stylesheet" href="css/dashboard.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>


<body>


<!-- SIDEBAR -->

<aside class="sidebar">


    <div class="brand">

        <i class="fa-solid fa-brain"></i>

        <h2>ResumeAI</h2>

    </div>



    <nav>


        <a href="dashboard.php" class="active">

            <i class="fa-solid fa-house"></i>
            Dashboard

        </a>



        <a href="result.php">

            <i class="fa-solid fa-file-circle-check"></i>
            My Reports

        </a>



        <a href="#score">

            <i class="fa-solid fa-chart-line"></i>
            ATS Score

        </a>



        <a href="profile.php">

            <i class="fa-solid fa-user"></i>
            Profile

        </a>



        <a href="#settings">

            <i class="fa-solid fa-gear"></i>
            Settings

        </a>


    </nav>



    <a href="logout.php" class="logout">

        <i class="fa-solid fa-right-from-bracket"></i>

        Logout

    </a>


</aside>





<!-- MAIN CONTENT -->

<main class="dashboard">



<header class="header">


<div>


<h1>
Welcome back,
<?php echo htmlspecialchars($name); ?> 👋
</h1>


<p>
Analyze your resume and improve your career opportunities.
</p>


</div>




<div class="user-card">


<i class="fa-solid fa-circle-user"></i>


<div>

<span>Hello</span>

<strong>
<?php echo htmlspecialchars($name); ?>
</strong>


</div>


</div>


</header>






<!-- STATISTICS -->


<section class="stats">


<div class="stat-card">


<div class="icon purple">

<i class="fa-solid fa-file"></i>

</div>


<div>

<h2>0</h2>

<p>
Uploaded Resume
</p>

</div>


</div>






<div class="stat-card">


<div class="icon blue">

<i class="fa-solid fa-chart-simple"></i>

</div>


<div>

<h2>--</h2>

<p>
ATS Score
</p>

</div>


</div>






<div class="stat-card">


<div class="icon green">

<i class="fa-solid fa-bullseye"></i>

</div>


<div>

<h2>0</h2>

<p>
Job Matches
</p>

</div>


</div>



</section>








<!-- UPLOAD SECTION -->


<section class="upload-container">


<div class="section-title">

<i class="fa-solid fa-cloud-arrow-up"></i>

<h2>
Upload Resume
</h2>


</div>



<p>
Upload your resume PDF and get AI-powered analysis.
</p>




<form action="upload.php" method="POST" enctype="multipart/form-data">


<div class="upload-area">


<i class="fa-solid fa-file-arrow-up"></i>


<input type="file"
name="resume"
accept=".pdf,.doc,.docx"
required>


</div>




<input type="text"
name="jobrole"
placeholder="Target Job Role (Example: Software Engineer)"
required>




<button type="submit">


<i class="fa-solid fa-wand-magic-sparkles"></i>

Analyze Resume


</button>



</form>


</section>







<!-- ANALYSIS -->


<section class="analysis-box" id="score">


<h2>
Resume Analysis Overview
</h2>



<div class="analysis-grid">


<div>

<i class="fa-solid fa-star"></i>

<h3>ATS Score</h3>

<p>
Your score will appear after analysis.
</p>

</div>




<div>

<i class="fa-solid fa-lightbulb"></i>

<h3>AI Suggestions</h3>

<p>
Improve skills and keywords.
</p>

</div>





<div>

<i class="fa-solid fa-code"></i>

<h3>Missing Skills</h3>

<p>
AI will detect missing skills.
</p>

</div>



</div>


</section>







<!-- RECENT REPORT -->


<section class="reports">


<h2>
Recent Reports
</h2>



<div class="empty-report">


<i class="fa-solid fa-folder-open"></i>


<p>
No resume analysis available yet.
</p>


</div>



</section>





</main>




<script src="js/dashboard.js"></script>


</body>

</html>