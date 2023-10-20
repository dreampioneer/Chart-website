<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");


  require '../../controllers/BaseController.php';
    // if($_SESSION['auth_result'] != "true") {
    //     Redirect('../login.php');
    // }

    $mysql = new MySQL("localhost", "root", "");
    $mysql->init_conn();


    $table = isset($_GET['table']) ? $_GET['table'] : 'SN1';
    $time = isset($_GET['time']) ? $_GET['time'] : 0;
    $starttime = isset($_GET['starttime']) ? $_GET['starttime'] : 0;
    $endtime = isset($_GET['endtime']) ? $_GET['endtime'] : 0;


    $date = date('Y-m-d H:i:s');
    $timestamp = strtotime($date);

    $digits = 3;

    // for($i=0; $i<10; $i++) {
    //   $valuee = '186.'.rand(pow(10, $digits-1), pow(10, $digits)-1);
    //   $sensorInsert = $mysql->conn->query("INSERT INTO ".$table."(timest,pid,cid,counter,value,timestamp,cmd) VALUES($timestamp, 1, 3, 1, $valuee, NOW(), 0)");
    // }

    $sensor = "select * from ".$table." ORDER BY timestamp DESC limit 1 ";

    $sensorData = $mysql->conn->query($sensor);
    $sensorRow = $sensorData->fetch_assoc();
    $sensorRow = explode(' ',$sensorRow['timestamp']);
    $sensorRow = $sensorRow[0];
    $tentime = $time-30*1000;


    if(isset($_GET['starttime']) && $_GET['starttime'] != 0 && isset($_GET['endtime']) && $_GET['endtime'] != 0) {
      $starttime = $starttime + 2*60*60*1000;
      $endtime = $endtime + 2*60*60*1000;
      $res_data = [];
      $totalinterval = $endtime - $starttime;
      $interval = $totalinterval/100;
      for ($i = 0; $i < 100; $i++) {
        $tempstarttime = $starttime + $i * $interval;
        $tempemdtime = $starttime + ($i + 1) * $interval;
        $sql = "select * from ".$table." WHERE timest BETWEEN '".$tempstarttime."' AND '".$tempemdtime."' limit 1";
        $result = $mysql->conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){

              array_push($res_data, $row);
          }
        }
      }
      echo json_encode($res_data);
      exit;
    } else if(isset($_GET['time']) && $_GET['time'] != '') {
      $sql = "select * from ".$table." WHERE timest BETWEEN '".$tentime."' AND '".$_GET['time']."' limit 1";
    } else  {

      if(isset($_GET['startDate']) && isset($_GET['endDate']) && $_GET['startDate'] != '' && $_GET['endDate'] != '') {
        $sql = "select * from ".$table." WHERE timestamp BETWEEN '".$_GET['startDate']."' AND '".$_GET['endDate']."' ";
      } else if(isset($_GET['startDate']) && !isset($_GET['endDate']) && $_GET['startDate'] != '') {
        if(isset($_GET['table']) && isset($_GET['from']) && $_GET['to'] != '' && $_GET['table'] == $table) {
          $sql = "select * from ".$table."  WHERE (timestamp BETWEEN DATE_SUB(NOW() , INTERVAL 30 SECOND) AND NOW()) AND (value BETWEEN '".$_GET['from']."' AND '".$_GET['to']."') ";
        } else {
          $sql = "select * from ".$table."  WHERE timestamp BETWEEN DATE_SUB(NOW() , INTERVAL 30 SECOND) AND NOW()";
        }

      } else if(isset($_GET['from']) && isset($_GET['to']) && $_GET['from'] != '' && $_GET['to'] != '') {
        $sql = "select * from ".$table." WHERE value BETWEEN '".$_GET['from']."' AND '".$_GET['to']."' ORDER BY value ASC";
      } else {
        $sql = "select * from ".$table." WHERE DATE(timestamp) = '$sensorRow'";
      }
    }

   // print_r($sql); die();

    $result = $mysql->conn->query($sql);

    $obj = array();

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){

        $timestampValue = explode(' ',$row['timestamp']);
        $dateValues[] = $timestampValue[0];
        $timevalue = explode(':',$timestampValue[1]);
        $timeValues[] = $timevalue[0].':'.$timevalue[1].':'.$timevalue[2];
        $values[] = $row['value'];
        $newTime = $timevalue[0].':'.$timevalue[1].':'.$timevalue[2];


        $element = array($newTime,$row['value'],$sensorRow);
        array_push($obj,$element);
    }
        echo json_encode($obj);
    } else {
        echo "0";
    }



?>
