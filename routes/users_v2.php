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
    $count = 0;

    if(isset($_POST['func']) && $_POST['func'] == 'insert_update') {
      $id = isset($_POST['id']) ? $_POST['id'] : 0;
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
          $sql = "INSERT INTO users (username, password, email, role, email_verified, status, reg_date ) VALUES('$username', '$password', '$email', '$role', '$verified', '$status', '$timestamp')";

          if($mysql->conn->query($sql)) {
            $json['msg'] = 'success';
            $json['error'] = false;
          } else {
            $json['msg'] = 'fail';
            $json['error'] = true;
          }

      } else {
          $sql = "DELETE FROM users WHERE id = $id";
          $mysql->conn->query($sql);

          $sql = "INSERT INTO users VALUES($id, '$username', '$password', '$email', '$role', '$verified', '$status', '$timestamp')";

          if($mysql->conn->query($sql)) {
            $json['msg'] = 'success';
            $json['error'] = false;
          } else {
            $json['msg'] = 'fail';
            $json['error'] = true;
          }

      }

        echo(json_encode($json));

    }


  if(isset($_POST['func']) && $_POST['func'] == 'deleteUsers') {

    if(isset($_POST['id'])) {
      $id = isset($_POST['id']) ? $_POST['id'] : 0;
      if($id) {
        $sql = "DELETE FROM users WHERE id = $id";
        $mysql->conn->query($sql);
        $json['msg'] = 'success';
        $json['error'] = false;
      } else {
        $json['msg'] = 'fail';
        $json['error'] = true;
      }
    } else {
      $json['msg'] = 'fail';
      $json['error'] = true;
    }
    echo(json_encode($json));
  }


  if(isset($_POST['func']) && $_POST['func'] == 'fetchUser') {

    if(isset($_POST['id'])) {
      $id = isset($_POST['id']) ? $_POST['id'] : 0;
      if($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $mysql->conn->query($sql);
        $json['msg'] = 'success';
        $json['error'] = false;
        while($row = $result->fetch_assoc()) {
            $json[$count++] = $row;
        }

      } else {
        $json['msg'] = 'fail';
        $json['error'] = true;
      }
    } else {
      $json['msg'] = 'fail';
      $json['error'] = true;
    }

    echo(json_encode($json));
  }


    if(isset($_POST['func']) && $_POST['func'] == 'getUsers') {
      $sql = "SELECT * FROM users";
      $json = [];
      $count = 0;
      $result = $mysql->conn->query($sql);

      $table = '';

      $table.= '<table id="users" class="display nowrap" style="width:100%">';
      $table.= '<thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Verified</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>';
        $table.= '<tbody>';

        $status = ['','Super User', 'Limited User', 'Pre-Weekend', 'Rector'];

      while($row = $result->fetch_assoc()) {
          $table.= '<tr>';
          $table.= '<td>'.$row['id'].'</td>';
          $table.= '<td>'.$row['username'].'</td>';
          $table.= '<td>'.$row['email'].'</td>';
          if($row['email_verified'])
          $table.= '<td>Yes</td>';
          else
          $table.= '<td>NO</td>';
          $table.= '<td>'.$status[$row['role']].'</td>';

          if($row['status'])
          $table.= '<td>Yes</td>';
          else
          $table.= '<td>NO</td>';

          if($row['role']==1){
      	$table.='<td><button class="btn btn-sm btn-primary edit_user" id="'.$row['id'].'">Edit</button>';
      	$table.=' &nbsp;<button class="btn btn-sm btn-danger del_user" id="'.$row['id'].'">Delete</button></td>';
      } else {
        $table.='<td></td>';
      }
          $table.= '</tr>';
      }
      $table.= '</tbody>';
      $table.='</table>';


      $json['msg'] = 'success';
      $json['error'] = false;
      $json['table'] = $table;

      echo(json_encode($json));
    }


    if(isset($_POST['func']) && $_POST['func'] == 'login' && isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] !='' && $_POST['password'] !='') {


      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM users where username = '$username' and password = '$password' ";
      $count = 0;
      $result = $mysql->conn->query($sql);
      while($row = $result->fetch_assoc()) {
          $json[$count++] = $row;
      }

      if($count > 0) {
        $json['msg'] = 'success';
        $json['error'] = false;
      } else {
        $json['msg'] = 'fail';
        $json['error'] = true;
      }

      echo(json_encode($json));

    }


    if(isset($_POST['func']) && $_POST['func'] == 'getData') {

   
          $table = isset($_POST['table']) ? $_POST['table'] : 'SN1';
          
          $date = date('Y-m-d H:i:s');
          $timestamp = strtotime($date);

          $digits = 3;

          for($i=0; $i<10; $i++) {
             $valuee = rand(pow(10, $digits-1), pow(10, $digits)-1);
               $sensorInsert = $mysql->conn->query("INSERT INTO ".$table."(timest,pid,cid,counter,value,timestamp,cmd) VALUES($timestamp, 1, 3, 1, $valuee, NOW(), 0)");
             }
    

          $sensor = "select * from ".$table." ORDER BY timestamp DESC limit 1 ";

          $sensorData = $mysql->conn->query($sensor);
          $sensorRow = $sensorData->fetch_assoc();
          $sensorRow = explode(' ',$sensorRow['timestamp']);
          $sensorRow = $sensorRow[0];


        //   if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate'] != '' && $_POST['endDate'] != '') {
        //     $sql = "select * from ".$table." WHERE timestamp BETWEEN '".$_POST['startDate']."' AND '".$_POST['endDate']."' ";
        //   } else if(isset($_POST['startDate']) && !isset($_POST['endDate']) && $_POST['startDate'] != '') {
        //     $sql = "select * from ".$table."  WHERE DATE(timestamp) = CURDATE() ORDER BY timestamp DESC";
        //   } else {
        //     $sql = "select * from ".$table." WHERE DATE(timestamp) = '$sensorRow'";
        //   }
        
        
        
    if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate'] != '' && $_POST['endDate'] != '') {
      $sql = "select * from ".$table." WHERE timestamp BETWEEN '".$_POST['startDate']."' AND '".$_POST['endDate']."' ";
    } else if(isset($_POST['startDate']) && !isset($_POST['endDate']) && $_POST['startDate'] != '') {
      if(isset($_POST['table']) && isset($_POST['from']) && $_POST['to'] != '' && $_POST['table'] == $table) {
        $sql = "select * from ".$table."  WHERE (timestamp BETWEEN DATE_SUB(NOW() , INTERVAL 30 SECOND) AND NOW()) AND (value BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') ";
      } else {
        $sql = "select * from ".$table."  WHERE timestamp BETWEEN DATE_SUB(NOW() , INTERVAL 30 SECOND) AND NOW()";
      }

    } else if(isset($_POST['from']) && isset($_POST['to']) && $_POST['from'] != '' && $_POST['to'] != '' && !isset($_POST['table'])) {
      $sql = "select * from ".$table." WHERE value BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' ";
    } else {
      $sql = "select * from ".$table." WHERE DATE(timestamp) = '$sensorRow'";
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

    }

?>
