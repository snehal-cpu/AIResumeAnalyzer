<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>My Profile | AI Resume Analyzer</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>
body{
    background:linear-gradient(135deg,#071d36,#123b63);
    font-family:'Poppins',sans-serif;
}


/* Main profile wrapper */
.profile-container{

    width:100%;
    max-width:850px;
    margin:70px auto;
}


/* Profile Card */

.profile-card{

    background:white;
    border-radius:25px;
    padding:45px;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);

}


/* Avatar */

.avatar{

    width:120px;
    height:120px;

    border-radius:50%;

    background:linear-gradient(135deg,#0066ff,#00c6ff);

    color:white;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:50px;
    font-weight:700;

    margin:auto;

    box-shadow:0 10px 25px rgba(0,102,255,.4);

}



/* Name */

.profile-header h2{

    margin-top:20px;

    color:#0f2a4d !important;

    font-size:32px;

    font-weight:700;

}


.profile-header p{

    color:#666 !important;

    font-size:16px;

}



/* Information Card */

.info-box{

    background:#f4f7fc;

    border-radius:20px;

    padding:25px;

    margin-top:35px;

}


.info-item{

    display:flex;

    align-items:center;

    gap:20px;

    padding:18px;

    color:#222 !important;

    border-bottom:1px solid #ddd;

}



.info-item:last-child{

    border:none;

}


.info-item strong{

    color:#0f2a4d !important;

    font-size:16px;

}



.info-item div{

    color:#555 !important;

}



/* Icon circle */

.info-item i{

    width:45px;

    height:45px;

    border-radius:50%;

    background:#0d6efd;

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:18px;

}



/* Buttons */


.action-btn{

    margin-top:35px;

}


.action-btn a{

    height:50px;

    display:flex;

    justify-content:center;

    align-items:center;

    gap:8px;

    border-radius:12px;

    font-weight:600;

    font-size:16px;

}


.action-btn a:hover{

    transform:translateY(-4px);

    transition:.3s;

}
</style>

</head>


<body>


<div class="container profile-container">


<div class="profile-card">


<div class="profile-header">


<div class="avatar">

<?php echo strtoupper(substr($user['name'],0,1)); ?>

</div>


<h2>

<?php echo htmlspecialchars($user['name']); ?>

</h2>


<p>

<i class="fa-solid fa-envelope"></i>

<?php echo htmlspecialchars($user['email']); ?>

</p>


</div>



<div class="info-box">


<div class="info-item">

<i class="fa-solid fa-id-card"></i>

<div>

<strong>User ID</strong><br>

<?php echo $user['id']; ?>

</div>

</div>



<div class="info-item">

<i class="fa-solid fa-user"></i>

<div>

<strong>Name</strong><br>

<?php echo htmlspecialchars($user['name']); ?>

</div>

</div>



<div class="info-item">

<i class="fa-solid fa-envelope"></i>

<div>

<strong>Email</strong><br>

<?php echo htmlspecialchars($user['email']); ?>

</div>

</div>


</div>



<div class="row action-btn g-3">


<div class="col-md-4">

<a href="dashboard.php" class="btn btn-primary w-100">

<i class="fa-solid fa-chart-line"></i>

Dashboard

</a>

</div>



<div class="col-md-4">

<a href="upload.php" class="btn btn-success w-100">

<i class="fa-solid fa-file-arrow-up"></i>

Upload Resume

</a>

</div>



<div class="col-md-4">

<a href="logout.php" class="btn btn-danger w-100">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</div>


</div>



</div>


</div>


</body>

</html>