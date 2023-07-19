<?php
    require '../../controllers/BaseController.php';

    if($_SESSION['verify_status'] != "true") {
        Redirect('../fgpassword.php');
    }

    if(isset($_POST['username']) && isset($_POST['password'])) {
        $mysql = new MySQL("localhost", "root", "");
        $mysql->init_conn();

        $user = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_SESSION['email'];
        
        $sql = "UPDATE users SET username = '$user', password = '$pass' WHERE email = '$email'";
        $mysql->conn->query($sql);
    }
    Redirect('../login.php');
?>