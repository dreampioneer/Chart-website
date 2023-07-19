<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");


  require '../../controllers/BaseController.php';
    if($_SESSION['auth_result'] != "true") {
        Redirect('../login.php');
    }

    $mysql = new MySQL("localhost", "root", "");
    $mysql->init_conn();


    $table = isset($_GET['table']) ? $_GET['table'] : 'SN1';

    $sensor = "select * from ".$table." ORDER BY timestamp DESC limit 1 ";

    $sensorData = $mysql->conn->query($sensor);
    $sensorRow = $sensorData->fetch_assoc();
    $sensorRow = explode(' ',$sensorRow['timestamp']);
    $sensorRow = $sensorRow[0];


    if(isset($_GET['startDate']) && isset($_GET['endDate']) && $_GET['startDate'] != '' && $_GET['endDate'] != '') {
      $sql = "select * from ".$table." WHERE timestamp BETWEEN '".$_GET['startDate']."' AND '".$_GET['endDate']."' ";
    } else if(isset($_GET['startDate']) && !isset($_GET['endDate']) && $_GET['startDate'] != '') {
      $sql = "select * from ".$table."  WHERE DATE(timestamp) = CURDATE() ORDER BY timestamp DESC";
    } else if(isset($_GET['from']) && isset($_GET['to']) && $_GET['from'] != '' && $_GET['to'] != '') {
      $sql = "select * from ".$table." WHERE value BETWEEN '".$_GET['from']."' AND '".$_GET['to']."' ";
    } else {
      $sql = "select * from ".$table." WHERE DATE(timestamp) = '$sensorRow'";
    }


    $result = $mysql->conn->query($sql);

    $obj = array();

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){

      $timestampValue = explode(' ',$row['timestamp']);
      $dateValues[] = $timestampValue[0];
      $timevalue = explode(':',$timestampValue[1]);
      $timeValues[] = $timevalue[0].':'.$timevalue[1];
      $values[] = $row['value'];
      $newTime = $timevalue[0].':'.$timevalue[1];


    	$element = array($newTime,$row['value'],$sensorRow);
    	array_push($obj,$element);
  }
    	echo json_encode($obj);
  } else {
      echo "0";
  }



?>
