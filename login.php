<?php
session_start();
include "./db-conn.php";

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)===1) {
        $row = mysqli_fetch_assoc($result);
        if($row['user_name'] === $uname && $row['password']===$password) {
            echo "Logged In!";
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['id'] = $row['id'];
            header('Location: resource.php');
            exit();
        }
    } else {
        header("Location: index.php?error=Incorrect Username or Password");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

