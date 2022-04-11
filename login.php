<?php
session_start();
include "./db-conn.php";

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name=?");
    $stmt -> bind_param("s", $uname_bind);
    $uname_bind = $uname;
    $stmt->execute();
    $stmt->store_result();

    if (mysqli_stmt_num_rows($stmt)===1) {
        mysqli_stmt_bind_result($stmt, $id, $username, $res_password);
        $row = mysqli_stmt_fetch($stmt);
        if($username === $uname && password_verify($password, $res_password) ) {
            echo "Logged In!";
            $_SESSION['user_name'] = $username;
            $_SESSION['id'] = $id;
            header('Location: resource.php');
            exit();
        } else {
            header("Location: index.php?error=Incorrect Username or Password");
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
?>
