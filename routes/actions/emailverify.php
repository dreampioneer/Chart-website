<?php
    require '../../controllers/BaseController.php';

    if(isset($_POST['code'])) {
        if(md5($_POST['code']) == $_SESSION['verify_code']) {
            $mysql = new MySQL("localhost", "root", "");
            $mysql->init_conn();
            $email = $_SESSION['email'];
            $sql = "UPDATE users SET email_verified = 1 WHERE email = '$email'";
            $mysql->conn->query($sql);
            $_SESSION['verify_status'] = "true";
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
?>