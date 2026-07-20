<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password != $confirm_password) {
    echo "<script>
            alert('Passwords do not match!');
            window.history.back();
          </script>";
    exit();
}

$check = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    echo "<script>
            alert('Email already exists!');
            window.history.back();
          </script>";
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(name,email,password)
VALUES('$name','$email','$hashedPassword')";

if(mysqli_query($conn,$sql))
{
    echo "<script>
            alert('Registration Successful!');
            window.location='login.php';
          </script>";
}
else
{
    echo "Error : " . mysqli_error($conn);
}

?>