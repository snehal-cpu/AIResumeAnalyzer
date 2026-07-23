<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | AI Resume Analyzer</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
<<<<<<< Updated upstream
    
=======
>>>>>>> Stashed changes

body{
    background:linear-gradient(135deg,#071a35,#0d2d5f,#123d7a);
    min-height:100vh;
    font-family:'Poppins',sans-serif;
}
<<<<<<< Updated upstream
header{
    width:100%;
}

/* ==========================================
   Navigation
========================================== */

nav{

    position:fixed;

    top:0;

    left:0;

    width:100%;

    height:85px;

    background:linear-gradient(135deg,#0f172a,#2563eb);

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:0 8%;

    box-shadow:0 8px 20px rgba(0,0,0,.15);

    z-index:1000;

}

/* Logo */

.logo{

    font-family:Gabriola;

    font-size:42px;

    color:#ffffff;

    font-weight:bold;

    letter-spacing:1px;

}

/* Navigation */

nav ul{

    display:flex;

    list-style:none;

    align-items:center;

}

nav ul li{

    margin-left:35px;

}

nav ul li a{

    text-decoration:none;

    color:#ffffff;

    font-size:25px;

    font-family:Gabriola;

    transition:.3s;

}

nav ul li a:hover{

    color:#00d4ff;

}

/* Login Button */

.login-btn{

    background:#00d4ff;

    color:#0f172a !important;

    padding:10px 28px;

    border-radius:30px;

    font-size:25px;

    font-family:Gabriola;

    font-weight:bold;

    transition:.4s;

}

.login-btn:hover{

    background:#ffffff;

    color:#2563eb !important;

    transform:translateY(-3px);

    box-shadow:0 10px 20px rgba(0,0,0,.2);

}


=======
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
footer{

    background:linear-gradient(135deg,#0f172a,#2563eb);

    color:white;

    text-align:center;

    padding:60px 20px 30px;

}

footer h2{

    font-family:Gabriola;

    font-size:50px;

    margin-bottom:15px;

}

footer p{

    font-size:17px;

    line-height:30px;

    margin-bottom:20px;

}

.footer-links{

    margin:30px 0;

}

.footer-links a{

    color:white;

    text-decoration:none;

    margin:0 15px;

    font-family:Gabriola;

    font-size:28px;

    transition:.3s;

}

.footer-links a:hover{

    color:#00d4ff;

}

.social-icons{

    margin:25px 0;

}

.social-icons a{

    color:white;

    font-size:28px;

    margin:0 12px;

    transition:.3s;

}

.social-icons a:hover{

    color:#00d4ff;

    transform:scale(1.2);

}

footer hr{

    width:80%;

    margin:30px auto;

    border:0;

    border-top:1px solid rgba(255,255,255,.25);

}

.copyright{

    font-size:15px;

    color:#dddddd;

}

/* ==========================================
   RESPONSIVE
========================================== */

@media(max-width:992px){

    .steps{

        grid-template-columns:repeat(2,1fr);

    }

    .feature-container{

        grid-template-columns:repeat(2,1fr);

    }

}

@media(max-width:768px){

    .steps{

        grid-template-columns:1fr;

    }

    .feature-container{

        grid-template-columns:1fr;

    }

    .how-it-works h2,
    .features h2,
    footer h2{

        font-size:42px;

    }

    .step h3,
    .card h3{

        font-size:30px;

    }

    .footer-links a{

        display:block;

        margin:12px 0;

    }

    .social-icons a{

        margin:0 10px;

    }

}

@media(max-width:480px){

    .step{

        padding:30px 20px;

    }

    .card{

        padding:30px 20px;

    }

    footer{

        padding:50px 15px 25px;

    }

    footer p{

        font-size:15px;

    }

}
=======
>>>>>>> Stashed changes

</style>

</head>

<body>
<<<<<<< Updated upstream
    <header>

<nav>

    <div class="logo">
        AI Resume Analyzer
    </div>

    <ul>

        <li><a href="index.php" class="login-btn">Home</a></li>

        <li><a href="#contact" class="login-btn">Contact</a></li>

        <li>
            <a href="login.php" class="login-btn">
                Login
            </a>
        </li>

    </ul>

</nav>

</header>



=======
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
<p>support@airesume.com</p>
=======
<p>resumeanalyze.team6@gmail.com</p>
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
<footer>

    <h2>AI Resume Analyzer</h2>

    <p>
        Build ATS-friendly resumes using Artificial Intelligence and improve your chances of getting hired.
    </p>

    <div class="footer-links">
        <a href="#">Home</a>
        <a href="#features">Features</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>

    <div class="social-icons">

        
<a href="https://github.com/snehal-cpu/AIResumeAnalyzer/tree/dev" target="_blank">
    <i class="fa-brands fa-github"></i>
</a>
    </div>
    <hr>

    <p class="copyright">
        © 2026 AI Resume Analyzer. All Rights Reserved.
    </p>

</footer>
=======
>>>>>>> Stashed changes

</body>
</html>