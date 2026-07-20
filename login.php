<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | AI Resume Analyzer</title>

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
width:400px;
background:white;
padding:40px;
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,.2);
}

h2{
text-align:center;
margin-bottom:10px;
color:#0f172a;
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

button{
width:100%;
padding:14px;
background:#2563eb;
color:white;
border:none;
border-radius:8px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#1d4ed8;
}

.register{
margin-top:20px;
text-align:center;
}

.register a{
text-decoration:none;
color:#2563eb;
font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h2>Welcome Back</h2>

<p>Login to AI Resume Analyzer</p>

<form action="login_process.php" method="POST">

<div class="input-box">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="input-box">
<label>Password</label>
<input type="password" name="password" required>
</div>

<button type="submit">
Login
</button>

</form>

<div class="register">

Don't have an account?

<a href="register.php">
Register
</a>

</div>

</div>

</body>
</html>