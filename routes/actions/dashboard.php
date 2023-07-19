<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

  require '../../controllers/BaseController.php';

    $mysql = new MySQL("localhost", "root", "");
    $mysql->init_conn();

    $json = [];

    if(isset($_POST['func']) && $_POST['func'] == 'getDashboard') {

      $count = 0;

      for($i=1; $i<=10; $i++) {

        $sensor = "select  count(id) as allcount from SN".$i."";

        $sensorData = $mysql->conn->query($sensor);
        $sensorRow = $sensorData->fetch_assoc();
        $count1 = $sensorRow['allcount'];
        $json[$count++] = $count1;
      }

      $json['msg'] = 'success';
      $json['error'] = false;

      echo(json_encode($json));
    }



?>
