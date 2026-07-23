<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $row['password'])) {

            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            header("Location: profile.php");
            exit();

        } else {
            echo "<script>alert('Incorrect Password'); window.location='login.php';</script>";
        }

    } else {
        echo "<script>alert('Email not found'); window.location='login.php';</script>";
    }
}
?>