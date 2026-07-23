<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Resume Analyzer Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <i class="fa-solid fa-brain"></i>
            <h2>ResumeAI</h2>
        </div>
        <ul>
            <li class="active">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </li>
            <li>
                <i class="fa-solid fa-file-lines"></i>
                My Reports
            </li>
            <li>
                <i class="fa-solid fa-chart-line"></i>
                ATS Score
            </li>
            <li>
                <i class="fa-solid fa-user"></i>
                Profile
            </li>
            <li>
                <i class="fa-solid fa-gear"></i>
                Settings
            </li>
        </ul>
        <a href="logout.php" class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>
    </aside>
    <!-- Main -->
    <main class="main">
        <!-- Navbar -->
        <div class="topbar">
            <div>
                <h1>
                    Welcome,
                    <?php echo htmlspecialchars($_SESSION['name']); ?> 👋
                </h1>
                <p id="currentDate"></p>
            </div>
            <div class="profile">
                <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>
        <!-- Cards -->
        <section class="cards">
            <div class="card">
                <i class="fa-solid fa-file"></i>
                <h2>0</h2>
                <p>Uploaded Resumes</p>
            </div>
            <div class="card">
                <i class="fa-solid fa-chart-simple"></i>
                <h2>--</h2>
                <p>ATS Score</p>
            </div>
            <div class="card">
                <i class="fa-solid fa-briefcase"></i>
                <h2>0</h2>
                <p>Job Matches</p>
            </div>
        </section>
        <!-- Upload -->
        <section class="upload-box">
            <h2>
                <i class="fa-solid fa-cloud-arrow-up"></i>
                Upload Resume
            </h2>
            <p>
                Upload your resume in PDF or DOCX format.
            </p>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="drop-area">
                    <input type="file"
                        id="resume"
                        name="resume"
                        accept=".pdf,.doc,.docx"
                        required>
                </div>
                <p id="fileName">
                    No file selected
                </p>
                <input type="text"
                    name="jobrole"
                    placeholder="Enter Target Job Role (Example: Software Engineer)"
                    required>
                <button type="submit">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    Analyze Resume
                </button>
            </form>
        </section>
        <!-- Recent -->
        <section class="recent">
            <h2>Recent Analysis</h2>
            <div class="empty">
                <i class="fa-solid fa-folder-open"></i>
                <p>No resume analyzed yet.</p>
            </div>
        </section>
        <!-- NEW: Career Tips Section -->
        <section class="tips">
            <h2>
                <i class="fa-solid fa-lightbulb"></i>
                Career Tips
            </h2>
            <div class="tips-grid">
                <div class="tip-card">
                    <i class="fa-solid fa-bullseye"></i>
                    <h3>Tailor Your Resume</h3>
                    <p>Customize your resume for each job role to improve ATS matching.</p>
                </div>
                <div class="tip-card">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <h3>Use Keywords</h3>
                    <p>Include relevant keywords from the job description naturally.</p>
                </div>
                <div class="tip-card">
                    <i class="fa-solid fa-list-check"></i>
                    <h3>Keep It Concise</h3>
                    <p>Aim for a clean, one-to-two-page resume with clear formatting.</p>
                </div>
            </div>
        </section>
    </main>
    <script src="js/dashboard.js"></script>
</body>
</html>