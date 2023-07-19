<?php
    require '../../controllers/BaseController.php';
    if($_SESSION['auth_result'] != "true") {
        Redirect('../login.php');
    }

    $mysql = new MySQL("localhost", "root", "");
    $mysql->init_conn();

    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id = $id";
    $mysql->conn->query($sql);
?>