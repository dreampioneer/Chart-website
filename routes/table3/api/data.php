<?php
/**
 * filename: data.php
 * description: this will return the score of the teams.
 */
header('Access-Control-Allow-Origin: *');
//setting header to json
header('Content-Type: application/json');

$current = $_GET['t1'];
//echo "t1 received: " . $current . "<br>" ;

//http://localhost/plot2trial1/api/data.php?t1=0

$current2 = +$current;
//echo "time received dec: " . $current2 . "<br>" ;

if ($current2 == 0) {
	$tst = time();
	//echo("tst = ".$tst . "<br>");
	//echo(date("Y-m-d",$tst)."<br>");
	$current1 = $tst - 10;
	//echo "time updated dec: " . $current1 . "<br>" ;
	//echo "time updated dec: " . (date("Y-m-d",$current1) . "<br>" ;

} else {
	$current1 = $current2 + 1;
}



//database
//define('DB_HOST', '127.0.0.1');
//define('DB_USERNAME', 'abaridb');
//define('DB_PASSWORD', 'mysqlusr');
//define('DB_NAME', 'samd');

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'triniws6_sensor');
define('DB_PASSWORD', 'Xitb?f!{^M{(');
define('DB_NAME', 'triniws6_samd');

//get connection
//$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//$mysqli = mysqli_connect("107.180.26.73", "orfteam", "orfproject", "samd");
$mysqli = mysqli_connect("localhost", "triniws6_sensor", "Xitb?f!{^M{(", "triniws6_samd");

if (!$mysqli) {
	die("Connection failed: " . $mysqli->error);
}

$sql = "SELECT timest, value FROM SN3 WHERE timest >=$current1";

// print_r($sql);

$result = mysqli_query($mysqli,$sql);

// print_r($result);

$obj = array();

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)){

	$obj[] = $row;
  }
    	
 }

echo json_encode($obj);
