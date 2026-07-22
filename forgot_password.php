<?php
include "db.php";

if(isset($_POST['reset']))
{
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($new_password != $confirm_password)
    {
        echo "<script>alert('Passwords do not match!');</script>";
    }
    else
    {
        $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check) > 0)
        {
            $password = password_hash($new_password, PASSWORD_DEFAULT);

            mysqli_query($conn,"UPDATE users SET password='$password' WHERE email='$email'");

            echo "<script>
                    alert('Password Reset Successfully!');
                    window.location='login.php';
                  </script>";
        }
        else
        {
            echo "<script>alert('Email not found!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password | AI Resume Analyzer</title>

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
background:white;
padding:40px;
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,.25);
}

h2{
text-align:center;
color:#0f172a;
margin-bottom:10px;
}

p{
text-align:center;
color:#666;
margin-bottom:25px;
}

.input-box{
margin-bottom:18px;
}

label{
display:block;
margin-bottom:8px;
font-weight:500;
}

input{
width:100%;
padding:12px;
border:1px solid #ccc;
border-radius:8px;
font-size:15px;
}

input:focus{
border-color:#2563eb;
outline:none;
}

button{
width:100%;
padding:14px;
background:#2563eb;
color:white;
border:none;
border-radius:8px;
font-size:16px;
cursor:pointer;
transition:.3s;
}

button:hover{
background:#1d4ed8;
}

.back{
text-align:center;
margin-top:20px;
}

.back a{
text-decoration:none;
color:#2563eb;
font-weight:600;
}

.back a:hover{
text-decoration:underline;
}

</style>

</head>

<body>

<div class="container">

<h2>Reset Password</h2>

<p>Enter your email and choose a new password.</p>

<form method="POST">

<div class="input-box">
<label>Email Address</label>
<input type="email" name="email" required>
</div>

<div class="input-box">
<label>New Password</label>
<input type="password" name="new_password" required>
</div>

<div class="input-box">
<label>Confirm Password</label>
<input type="password" name="confirm_password" required>
</div>

<button type="submit" name="reset">
Reset Password
</button>

</form>

<div class="back">
<a href="login.php">← Back to Login</a>
</div>

</div>

</body>
</html>