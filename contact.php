<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | AI Resume Analyzer</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#071a35,#0d2d5f,#123d7a);
    min-height:100vh;
    font-family:'Poppins',sans-serif;
}

.contact-card{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:40px;
    color:white;
    box-shadow:0 10px 30px rgba(0,0,0,.4);
}

.title{
    font-size:38px;
    font-weight:bold;
    color:#4fc3ff;
}

.subtitle{
    color:#d6e8ff;
    line-height:1.8;
}

.info-box{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:30px;
    color:white;
    height:100%;
    box-shadow:0 10px 30px rgba(0,0,0,.3);
}

.form-control{
    background:rgba(255,255,255,.12);
    border:none;
    color:white;
    border-radius:12px;
    padding:12px;
}

.form-control::placeholder{
    color:#d6e8ff;
}

.form-control:focus{
    background:rgba(255,255,255,.18);
    color:white;
    border:1px solid #4fc3ff;
    box-shadow:none;
}

.btn-send{
    background:#00b4ff;
    color:white;
    border:none;
    border-radius:30px;
    padding:12px;
    font-size:18px;
    font-weight:600;
    transition:.3s;
}

.btn-send:hover{
    background:#0088cc;
}

h5{
    color:#4fc3ff;
    margin-top:20px;
}

.home-btn{
    display:inline-block;
    margin-top:40px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:12px 28px;
    border-radius:8px;
    font-weight:600;
    transition:0.3s;
}

.home-btn:hover{
    background:#1d4ed8;
    color:white;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="row align-items-center">

<div class="col-lg-5 mb-4">

<div class="info-box">

<h2 class="title">Contact Us</h2>

<p class="subtitle">
Have questions about your AI Resume Analyzer?
We're here to help you improve your resume and achieve a better ATS score.
</p>

<hr class="text-light">

<h5>📧 Email</h5>
<p>support@airesume.com</p>

<h5>📞 Phone</h5>
<p>+91 9876543210</p>

<h5>📍 Address</h5>
<p>Pune, Maharashtra, India</p>

<h5>⏰ Working Hours</h5>
<p>Monday – Friday<br>9:00 AM – 6:00 PM</p>

</div>

</div>

<div class="col-lg-7">

<div class="contact-card">

<h2 class="text-center mb-4">
Send Us a Message
</h2>

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<input type="text" class="form-control" name="name" placeholder="Full Name" required>
</div>

<div class="col-md-6 mb-3">
<input type="email" class="form-control" name="email" placeholder="Email Address" required>
</div>

</div>

<div class="mb-3">
<input type="text" class="form-control" name="subject" placeholder="Subject" required>
</div>

<div class="mb-3">
<textarea class="form-control" rows="6" name="message" placeholder="Write your message here..." required></textarea>
</div>

<div class="d-grid">
<button type="submit" class="btn btn-send">
🚀 Send Message
</button>
</div>

</form>

</div>

</div>

</div>

<!-- Back Button -->
<div class="text-center">
    <a href="index.php" class="home-btn">
        🏠 Back to Home
    </a>
</div>

</div>

</body>
</html>