<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI Resume Analyzer</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(135deg,#081c5d,#3b1fd6);
display:flex;
color:white;
}

.sidebar{
width:250px;
height:100vh;
background:#07113d;
padding:25px;
position:fixed;
}

.logo{
font-size:28px;
font-weight:700;
margin-bottom:40px;
}

.menu a{
display:block;
text-decoration:none;
color:white;
padding:15px;
margin-bottom:15px;
border-radius:12px;
transition:.3s;
}

.menu a:hover{
background:#3f5cff;
}

.main{
margin-left:250px;
padding:25px;
width:100%;
}

.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
}

.header h1{
font-size:42px;
}

.header p{
opacity:.8;
margin-top:5px;
}

.right{
display:flex;
align-items:center;
gap:15px;
}

.profile{
width:55px;
height:55px;
border-radius:50%;
background:#ff4fa5;
display:flex;
align-items:center;
justify-content:center;
font-weight:bold;
font-size:22px;
}

.cards{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
}

.card{
background:white;
color:black;
padding:25px;
border-radius:20px;
display:flex;
align-items:center;
gap:18px;
box-shadow:0 10px 25px rgba(0,0,0,.2);
transition:.3s;
}

.card:hover{
transform:translateY(-8px);
}

.icon{
width:70px;
height:70px;
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
font-size:30px;
color:white;
}

.blue{background:#2563eb;}
.green{background:#22c55e;}
.orange{background:#f59e0b;}
.purple{background:#7c3aed;}

.card h2{
font-size:36px;
margin-top:5px;
}

.action{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-top:25px;
}

.btn{
padding:22px;
border-radius:18px;
font-size:18px;
font-weight:600;
text-align:center;
cursor:pointer;
transition:.3s;
color:white;
}

.b1{background:#2563eb;}
.b2{background:#7c3aed;}
.b3{background:#16a34a;}
.b4{background:#ec4899;}

.btn:hover{
transform:scale(1.05);
}

</style>
</head>

<body>

<div class="sidebar">

<div class="logo">🤖 AI Resume</div>

<div class="menu">

<a href="#">🏠 Dashboard</a>
<a href="#">📤 Upload Resume</a>
<a href="#">📄 View Reports</a>
<a href="#">📊 ATS Score</a>
<a href="#">👤 Profile</a>
<a href="#">⚙ Settings</a>
<a href="#">🚪 Logout</a>

</div>

</div>

<div class="main">

<div class="header">

<div>

<h1>Welcome Back, Shruti 👋</h1>

<p>Analyze your resume and improve your ATS Score.</p>

</div>

<div class="right">

<div>
21 July 2026
</div>

<div class="profile">
S
</div>

</div>

</div>

<div class="cards">

<div class="card">
<div class="icon blue">📄</div>
<div>
<p>Total Resume</p>
<h2>12</h2>
</div>
</div>

<div class="card">
<div class="icon green">📈</div>
<div>
<p>Average ATS</p>
<h2>78%</h2>
</div>
</div>

<div class="card">
<div class="icon orange">✔</div>
<div>
<p>Selected</p>
<h2>05</h2>
</div>
</div>

<div class="card">
<div class="icon purple">🚀</div>
<div>
<p>Improvement</p>
<h2>32%</h2>
</div>
</div>

</div>

<div class="action">

<div class="btn b1">📤 Upload Resume</div>

<div class="btn b2">📄 View Reports</div>

<div class="btn b3">📊 Check ATS</div>

<div class="btn b4">👤 Edit Profile</div>

</div>
<div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;margin-top:30px;">

<div>

<div style="background:rgba(255,255,255,.08);padding:20px;border-radius:20px;">

<h2>📈 ATS Score Trend</h2>

<canvas id="lineChart" height="120"></canvas>

</div>

<div style="background:rgba(255,255,255,.08);padding:20px;border-radius:20px;margin-top:20px;">

<h2>🥧 Resume Status</h2>


<div style="width:300px; height:300px; margin:auto;">
    <canvas id="pieChart"></canvas>
</div>
<canvas id="pieChart" height="180"></canvas>

</div>

</div>

<div>

<div style="background:#08173d;padding:25px;border-radius:20px;text-align:center;">

<h2>Your ATS Score</h2>

<div style="
width:180px;
height:180px;
border:12px solid #00e676;
border-radius:50%;
margin:20px auto;
display:flex;
align-items:center;
justify-content:center;
font-size:45px;
font-weight:bold;">

85%

</div>

<p>Excellent 🎉</p>

<button style="
margin-top:20px;
padding:12px 30px;
background:#00c853;
border:none;
color:white;
border-radius:10px;
cursor:pointer;">

Improve More

</button>

</div>

<div style="background:#08173d;padding:20px;border-radius:20px;margin-top:20px;">

<h2>💡 Tips to Improve</h2>

<ul style="line-height:35px;margin-top:15px;">

<li>✔ Add relevant keywords</li>

<li>✔ Improve skills section</li>

<li>✔ Add certifications</li>

<li>✔ Keep resume concise</li>

<li>✔ Add project details</li>

</ul>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById("lineChart"),{

type:"line",

data:{

labels:["15 Jul","16 Jul","17 Jul","18 Jul","19 Jul","20 Jul","21 Jul"],

datasets:[{

label:"ATS",

data:[50,58,75,62,82,76,85],

borderColor:"#00e5ff",

backgroundColor:"rgba(0,229,255,.2)",

fill:true,

tension:.4

}]

}

});

new Chart(document.getElementById("pieChart"),{

type:"pie",

data:{

labels:["Selected","Review","Need Improvement"],

datasets:[{

data:[42,33,25],

backgroundColor:["#00e676","#2196f3","#ff9800"]

}]

}

});

</script>
<div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;margin-top:30px;">

<div style="background:rgba(255,255,255,.08);padding:20px;border-radius:20px;">

<h2 style="margin-bottom:20px;">📄 Recent Activity</h2>

<table style="width:100%;border-collapse:collapse;color:white;">

<tr style="background:#1b2d6b;">
<th style="padding:15px;">Resume</th>
<th>ATS</th>
<th>Status</th>
<th>Action</th>
</tr>

<tr>
<td style="padding:15px;">Software_Engineer.pdf</td>
<td style="color:#00e676;">85%</td>
<td><span style="background:#16a34a;padding:6px 12px;border-radius:20px;">Selected</span></td>
<td>👁️ ⬇️</td>
</tr>

<tr>
<td style="padding:15px;">Data_Analyst.pdf</td>
<td style="color:#ffd54f;">72%</td>
<td><span style="background:#2563eb;padding:6px 12px;border-radius:20px;">Review</span></td>
<td>👁️ ⬇️</td>
</tr>

<tr>
<td style="padding:15px;">Frontend_Resume.pdf</td>
<td style="color:#ff9800;">65%</td>
<td><span style="background:#ef4444;padding:6px 12px;border-radius:20px;">Improve</span></td>
<td>👁️ ⬇️</td>
</tr>

<tr>
<td style="padding:15px;">Java_Developer.pdf</td>
<td style="color:#00e676;">91%</td>
<td><span style="background:#16a34a;padding:6px 12px;border-radius:20px;">Selected</span></td>
<td>👁️ ⬇️</td>
</tr>

</table>

</div>

<div>

<div style="background:linear-gradient(135deg,#2563eb,#7c3aed);padding:25px;border-radius:20px;text-align:center;">

<h2>🚀 Upgrade to Pro</h2>

<p style="margin:15px 0;">
Unlock AI insights, premium ATS reports and advanced analytics.
</p>

<button style="
padding:12px 25px;
background:white;
color:#2563eb;
border:none;
border-radius:10px;
font-weight:bold;
cursor:pointer;">
Upgrade Now
</button>

</div>

</div>

</div>

<footer style="
margin-top:30px;
padding:20px;
text-align:center;
color:#ccc;">

© 2026 AI Resume Analyzer | Developed by Shruti

</footer>

</div>

</body>
</html>
