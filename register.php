<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AI Resume Analyzer</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
display:flex;
justify-content:center;
align-items:center;
height:100vh;
background:linear-gradient(135deg,#0f172a,#2563eb);
}

.container{
width:420px;
background:#fff;
padding:40px;
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,.2);
}

.container h2{
text-align:center;
margin-bottom:10px;
color:#0f172a;
}

.container p{
text-align:center;
color:#666;
margin-bottom:25px;
}

.input-box{
margin-bottom:18px;
}

.input-box label{
display:block;
margin-bottom:8px;
font-weight:500;
}

.input-box input{
width:100%;
padding:12px;
border:1px solid #ccc;
border-radius:8px;
font-size:15px;
outline:none;
transition:.3s;
}

.input-box input:focus{
border-color:#2563eb;
box-shadow:0 0 8px rgba(37,99,235,.3);
}

button{
width:100%;
padding:14px;
background:#2563eb;
color:#fff;
border:none;
border-radius:8px;
font-size:16px;
font-weight:600;
cursor:pointer;
transition:.3s;
}

button:hover{
background:#1d4ed8;
}

.login-link{
text-align:center;
margin-top:20px;
}

.login-link a{
text-decoration:none;
color:#2563eb;
font-weight:600;
}

.login-link a:hover{
text-decoration:underline;
}

    </style>

</head>
<body>

<div class="container">

<h2>Create Account</h2>

<p>Register to use AI Resume Analyzer</p>

<form action="register_process.php" method="POST">

<div class="input-box">
<label>Full Name</label>
<input type="text" name="name" required>
</div>

<div class="input-box">
<label>Email Address</label>
<input type="email" name="email" required>
</div>

<div class="input-box">
<label>Password</label>
<input type="password" name="password" required>
</div>

<div class="input-box">
<label>Confirm Password</label>
<input type="password" name="confirm_password" required>
</div>

<button type="submit">
Create Account
</button>

</form>

<div class="login-link">

Already have an account?

<a href="login.php">
Login
</a>

</div>

</div>

</body>
</html>