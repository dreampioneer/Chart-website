<?php
    require '../../controllers/BaseController.php';

    if($_SESSION['auth_result'] != "true") {
        Redirect('../login.php');
    }

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $verified = $_POST['verified'];
    $status = $_POST['status'];
    $role = $_POST['role'];

    $mysql = new MySQL("localhost", "root", "");
    $mysql->init_conn();

    $timestamp = date('Y-m-d h:i:s');
    
    if($id == 0) {
        $sql = "INSERT INTO users VALUES(0, '$username', '$password', '$email', '$role', '$verified', '$status', '$timestamp', '')";
        $mysql->conn->query($sql);
    } else {
        $sql = "DELETE FROM users WHERE id = $id";
        $mysql->conn->query($sql);

        $sql = "INSERT INTO users VALUES($id, '$username', '$password', '$email', '$role', '$verified', '$status', '$timestamp', '')";
        $mysql->conn->query($sql);
    }
?>
