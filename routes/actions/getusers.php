<?php
  require '../../controllers/BaseController.php';
    if($_SESSION['auth_result'] != "true") {
        Redirect('../login.php');
    }

    $mysql = new MySQL("localhost", "root", "");
    $mysql->init_conn();

    $sql = "SELECT * FROM users";
    $json = [];
    $count = 0;
    $result = $mysql->conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $json[$count++] = $row;
    }

    echo(json_encode($json));
?>
