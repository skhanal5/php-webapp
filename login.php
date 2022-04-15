<?php
session_start();
include "./db-conn.php";

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name=?");
    $stmt -> bind_param("s", $uname_bind);
    $uname_bind = $uname;
    $stmt->execute();
    $stmt->store_result();

    if (mysqli_stmt_num_rows($stmt)===1) {
        mysqli_stmt_bind_result($stmt, $id, $username, $res_password, $user_certs);
        $row = mysqli_stmt_fetch($stmt);
        if($username === $uname && password_verify($password, $res_password)) {
            $user_certs = trim(preg_replace('/\s\s+/', ' ', $cert));
            if (str_contains($_SERVER['SSL_CLIENT_CERT'], $user_certs)) {
                $_SESSION['user_name'] = $username;
                $_SESSION['id'] = $id;
                if ($_SESSION['url']=="admin-resource.php") {
                    header('Location: admin-resource.php');
                    exit();
                } else {
                    header('Location: resource.php');
                    exit();
                }
            } else {
                print_r($_SERVER['SSL_CLIENT_CERT']);
                exit();
            }
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
