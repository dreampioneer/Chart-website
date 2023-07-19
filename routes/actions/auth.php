<?php
    require '../../controllers/BaseController.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $mysql = new MySQL("localhost", "root", "");
    $mysql->init_conn();

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $mysql->conn->query($sql); 
    if($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        if($row['email_verified'] == 0) {
            Redirect('../fgpassword.php');
            exit();
        }

        $_SESSION['auth_result'] = 'true';
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['user_role'] = $row['role'];
        $_SESSION['user_email'] = $row['email'];
        Redirect('../admin.php');
    } else {
        $_SESSION['auth_result'] = 'false';
        Redirect('../login.php');
    }
?>
