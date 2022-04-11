<?php
session_start();
include "./db-conn.php";

if (isset($_POST['uname']) && isset ($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        return data;
    }
}

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)===1) {
    $row = mysqli_fetch_assoc($result);
    if($row['user_name']===$uname && $row['password']===$pass) {
        echo "Logged In";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        file_get_contents("resource.html");
        exit();
    } else {
        header("Location: index.php?error=Incorrect User Name or Password");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}