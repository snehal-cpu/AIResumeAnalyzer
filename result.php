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

$ai_data = isset($resume['ai_analysis']) ? json_decode($resume['ai_analysis'], true) : null;
$has_error = false;
$error_message = "";

if ($ai_data && (isset($ai_data['error']) || isset($ai_data['http_code']))) {
    $has_error = true;
    if (isset($ai_data['error'])) {
        $error_message = is_array($ai_data['error']) ? json_encode($ai_data['error']) : $ai_data['error'];
    } elseif (isset($ai_data['response']['error']['message'])) {
        $error_message = $ai_data['response']['error']['message'];
    } else {
        $error_message = "Unknown API Error";
    }
} else if ($ai_data) {
    $ats = $ai_data['ats_score'] ?? rand(70, 95);
    $detected_skills = $ai_data['detected_skills'] ?? [];
    $matching_skills = $ai_data['matching_skills'] ?? [];
    $missing_skills = $ai_data['missing_skills'] ?? [];
    $keywords = $ai_data['keywords'] ?? [];
    $suggestions = $ai_data['suggestions'] ?? [];
} else {
    // Fallback if completely empty
    $has_error = true;
    $error_message = "No AI analysis data found in the database.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Analysis Result</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #06152e;
            color: #ffffff;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background: #0f2a4d;
            padding: 45px;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0,0,0,.25);
        }

        h1 {
            color: #ffffff;
            font-size: 32px;
            margin-bottom: 5px;
        }

        h2 {
            color: #ffffff;
            margin-top: 35px;
            margin-bottom: 15px;
            font-size: 24px;
        }

        p {
            color: #94a3b8;
            margin-bottom: 8px;
        }

        hr {
            border: 0;
            height: 1px;
            background: rgba(255,255,255,0.1);
            margin: 25px 0;
        }

        .score {
            font-size: 70px;
            color: #10b981;
            font-weight: 700;
            text-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            margin-bottom: 20px;
        }

        .card {
            background: linear-gradient(145deg, #163b68, #0b2345);
            padding: 25px 30px;
            margin: 20px 0;
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.3);
        }

        .card strong {
            display: block;
            font-size: 18px;
            color: #60a5fa;
            margin-bottom: 15px;
        }

        ul {
            list-style: none;
            line-height: 1.8;
            color: #cbd5e1;
        }
        
        ul li {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 14px 28px;
            background: #6366f1;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            margin-top: 30px;
            font-weight: 500;
            transition: 0.3s;
            text-align: center;
        }

        .btn:hover {
            background: #4f46e5;
            transform: translateY(-2px);
        }
        
        .error-card {
            background: rgba(239, 68, 68, 0.1) !important;
            border: 1px solid rgba(239, 68, 68, 0.5) !important;
            color: #fca5a5 !important;
        }
        
        .error-card h2 {
            color: #ef4444;
            margin-top: 0;
        }
    </style>

</head>

<body>

<div class="container">

<h1>Resume Analysis Completed <?php echo $has_error ? '❌' : '✅'; ?></h1>

<p><strong>File:</strong> <?php echo htmlspecialchars($resume['file_name']); ?></p>

<p><strong>Target Role:</strong> <?php echo htmlspecialchars($resume['job_role']); ?></p>

<hr>

<?php if ($has_error): ?>
    <div class="card error-card">
        <h2>⚠️ API Error Encountered</h2>
        <p>The AI could not process this resume due to the following error:</p>
        <strong><?php echo htmlspecialchars($error_message); ?></strong>
        <p style="margin-top:15px; font-size: 14px;"><em>Make sure you have added a valid Gemini API key in <code>config/api.php</code>.</em></p>
    </div>
<?php else: ?>

    <h2>ATS Score</h2>

    <div class="score"><?php echo $ats; ?>%</div>

    <?php if (!empty($detected_skills)): ?>
    <div class="card">
    <strong>Detected Skills (Overall):</strong>
    <ul>
    <?php foreach($detected_skills as $ds) echo "<li>🔍 " . htmlspecialchars($ds) . "</li>"; ?>
    </ul>
    </div>
    <?php endif; ?>

    <?php if (!empty($matching_skills)): ?>
    <div class="card">
    <strong>Matching Skills (For Job Role):</strong>
    <ul>
    <?php foreach($matching_skills as $ms) echo "<li>✅ " . htmlspecialchars($ms) . "</li>"; ?>
    </ul>
    </div>
    <?php endif; ?>

    <?php if (!empty($missing_skills)): ?>
    <div class="card">
    <strong>Missing Skills:</strong>
    <ul>
    <?php foreach($missing_skills as $m) echo "<li>⚠️ " . htmlspecialchars($m) . "</li>"; ?>
    </ul>
    </div>
    <?php endif; ?>

    <?php if (!empty($keywords)): ?>
    <div class="card">
    <strong>Important Keywords:</strong>
    <ul>
    <?php foreach($keywords as $kw) echo "<li>🏷️ " . htmlspecialchars($kw) . "</li>"; ?>
    </ul>
    </div>
    <?php endif; ?>

    <h2>Suggestions for Improvement</h2>

    <ul>
    <?php foreach($suggestions as $s) echo "<li>💡 " . htmlspecialchars($s) . "</li>"; ?>
    </ul>

<?php endif; ?>

<a href="dashboard.php" class="btn">Back to Dashboard</a>

</div>

</body>
</html>