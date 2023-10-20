<?php
    require "./../controllers/BaseController.php";
    include('./layouts/header.php');
    if($_SESSION['user_role'] == 4  ){
      $_SESSION['access_restricted'] = "You don't have access to this page";
      Redirect('./admin.php');
    }

?>


<?php

$mysql =new MySQL();
$mysql->init_conn();


?>

<style>
  body {
    margin: 0;
    padding: 0;
    background-color: #ECECEC !important;
  }

  .navbar {
    position: fixed !important;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    z-index: 999;
  }

  .navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
  }

  .navbar-logo {
    color: #000;
    font-size: 20px;
    text-decoration: none;
  }

  .navbar-menu {
    list-style-type: none;
    display: flex;
    margin: 0;
    padding: 0;
  }

  .navbar-item {
    margin-right: 20px;
  }

  .navbar-item a {
    color: #fff;
    text-decoration: none;
  }

  .navbar-icons a {
    color: #fff;
    margin-left: 10px;
    text-decoration: none;
  }

  .navbar-icons a:hover {
    color: #66afe9;
  }

  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: Arial, sans-serif;
    margin-top: 50px;
  }

  h2 {
    margin-bottom: 20px;
  }

  select {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    color: #333;
    width: 200px;
    transition: border-color 1s ease-in-out;
  }

  select:hover {
    border-color: #66afe9;
  }

  select:focus {
    outline: none;
    border-color: #66afe9;
    box-shadow: 0 0 5px rgba(102, 175, 233, 0.6);
  }

  .fixed-time-input,
  .datetimepicker {
    width: 23%;
    margin: 1%;
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
  }
  .real-time-input {
    width : 45%;
    margin : 2%;
  }

  /* #mySelect {
    width: 200px;
    margin-bottom: 20px;
    margin-right: 20px;
  } */

  input {
    margin-bottom: 20px;
  }

  select:focus,
  input:focus {
    outline: none;
    border-color: dodgerblue;
    box-shadow: 0 0 5px dodgerblue;
  }

  #daterange {
    transition: height 0.5s ease;
    margin-right: 10px;
  }

  .hidden {
    height: 0;
  }

  @keyframes slideInFromLeft {
    from {
      transform: translateX(-100%);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }

  .container {
    animation: slideInFromLeft 1s ease;
    justify-content: center;
    align-items: center;
  }

  .canvas_containar {
    display: flex;
    /* justify-content: center;
    align-items: center; */
    display: flex;
    flex-wrap: wrap;
  }

  .chartjs-size-monitor {
    animation: slideInFromLeft 1s ease;
    justify-content: center;
    align-items: center;
  }

  .chart {
    width: 50%;
    box-sizing: border-box;
    animation: slideInFromLeft 2s ease;
    justify-content: center;
    align-items: center;
  }

  canvas {
    max-width: 90%;
    max-height: 100%;
    justify-content: center;
    align-items: center;
  }

  canvas {
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 5px rgb(159 80 80 / 30%);
    justify-content: center;
    align-items: center;
    margin-left: 5%;
    margin-bottom: 30px;
  }

  .topsearch {
    display: flex;
    margin-top: 50px;
    margin-left: 50px;
  }

  .label-container {
    display: flex;
    padding: 20px;
    margin: 30px;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    border: 0;
    border-radius: 3px;
    margin-bottom: 20px;
    height: auto !important;
    color: #555;
    background-color: #fff !important;
    box-shadow: 0 4px 18px 0px rgba(0, 0, 0, 0.12), 0 7px 10px -5px rgba(0, 0, 0, 0.15);
  }

  .label {
    width: 20%;
    box-sizing: border-box;
    justify-content: center;
    align-items: center;
  }

  label {
    display: block !important;
  }

  .condition {
    width: 80%;
    margin-left: 10%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    border: 0;
    border-radius: 3px;
    height: auto !important;
    color: #555;
    background-color: #fff !important;
    box-shadow: 0 4px 18px 0px rgba(0, 0, 0, 0.12), 0 7px 10px -5px rgba(0, 0, 0, 0.15);
  }

  .fullscreenbutton {
    background-color: #4CAF50;
  
    /* Button text color */
    color: white;
    
    /* Button padding */
    
    /* Button border */
    border: none;
    
    /* Button border radius */
    border-radius: 4px;
    
    /* Button cursor on hover */
    cursor: pointer;
  }

  .fullscreenbutton:hover {
    background-color: #45a049;
  }

  .fullscreenbutton i {
  }

  .full_screen {
    margin-bottom: 10px;
    float: right;
    margin-right: 2%;
  }

  .input100 {
    font-family: Poppins-Medium;
    font-size: 16px;
    color: #333333;
    line-height: 1.2;

    display: block;
    width: 45%;
    height: 45px;
    background: transparent;
    padding: 0 7px 0 43px;
  }


  /*---------------------------------------------*/
  input {
    outline: none;
    border: 2px solid #e9e1e1;
  }

  .focus-input100 {
    position: absolute;
    display: block;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
  }

  .focus-input100::after {
    content: attr(data-symbol);
    font-family: Material-Design-Iconic-Font;
    color: #adadad;
    font-size: 22px;

    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    height: calc(100% - 20px);
    bottom: 0;
    left: 0;
    padding-left: 13px;
    padding-top: 3px;
  }

  .focus-input100::before {
    content: "";
    display: block;
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: #7f7f7f;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
  }


  .input100:focus + .focus-input100::before {
    width: 100%;
  }

  .has-val.input100 + .focus-input100::before {
    width: 100%;
  }

  .input100:focus + .focus-input100::after {
    color: #a64bf4;
  }

  .has-val.input100 + .focus-input100::after {
    color: #a64bf4;
  }
</style>

<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="#" class="navbar-logo">Chart Page</a>
    </div>
    <div class="navbar-select">
      <select id="mySelect" style="margin-left:">
        <option value="0">Select Type</option>
        <option value="1">Fixed</option>
        <option value="2" selected>Real Time</option>
      </select>
    </div>
  </nav>
  <div id="real-time" style="margin-top: 120px;">
    <div class="label-container">
      <div class="label">
        <label class="checkbox1">
          <input type="checkbox" id="checkbox1" checked />
          <span class="custom-checkbox"></span>
          Sensor1
        </label>
      </div>
      <div class="label">
        <label class="checkbox2">
          <input type="checkbox" id="checkbox2" checked />
          <span class="custom-checkbox"></span>
          Sensor2
        </label>
      </div>
      <div class="label">
        <label class="checkbox3">
          <input type="checkbox" id="checkbox3" checked />
          <span class="custom-checkbox"></span>
          Sensor3
        </label>
      </div>
      <div class="label">
        <label class="checkbox4">
          <input type="checkbox" id="checkbox4" checked />
          <span class="custom-checkbox"></span>
          Sensor4
        </label>
      </div>
      <div class="label">
        <label class="checkbox5">
          <input type="checkbox" id="checkbox5" checked />
          <span class="custom-checkbox"></span>
          Sensor5
        </label>
      </div>
      <div class="label">
        <label class="checkbox6">
          <input type="checkbox" id="checkbox6" checked />
          <span class="custom-checkbox"></span>
          Sensor6
        </label>
      </div>
      <div class="label">
        <label class="checkbox7">
          <input type="checkbox" id="checkbox7" checked />
          <span class="custom-checkbox"></span>
          Sensor7
        </label>
      </div>
      <div class="label">
        <label class="checkbox8">
          <input type="checkbox" id="checkbox8" checked />
          <span class="custom-checkbox"></span>
          Sensor8
        </label>
      </div>
      <div class="label">
        <label class="checkbox9">
          <input type="checkbox" id="checkbox9" checked />
          <span class="custom-checkbox"></span>
          Sensor9
        </label>
      </div>
      <div class="label">
        <label class="checkbox10">
          <input type="checkbox" id="checkbox10" checked />
          <span class="custom-checkbox"></span>
          Sensor10
        </label>
      </div>
    </div>
    <div class="canvas_containar">
      <div class="chart" id="chart1">
        <div class="full_screen">
            <button id="fullscreenButton1" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart1"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue1"
            onchange="setMinValue(1)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue1"
            onchange="setMaxValue(1)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart2">
        <div class="full_screen">
          <button id="fullscreenButton2" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart2"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue2"
            onchange="setMinValue(2)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue2"
            onchange="setMaxValue(2)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart3">
        <div class="full_screen">
          <button id="fullscreenButton3" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart3"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue3"
            onchange="setMinValue(3)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue3"
            onchange="setMaxValue(3)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart4">
        <div class="full_screen">
          <button id="fullscreenButton4" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart4"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue4"
            onchange="setMinValue(4)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue4"
            onchange="setMaxValue(4)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart5">
        <div class="full_screen">
          <button id="fullscreenButton5" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart5"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue5"
            onchange="setMinValue(5)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue5"
            onchange="setMaxValue(5)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart6">
        <div class="full_screen">
          <button id="fullscreenButton6" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart6"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue6"
            onchange="setMinValue(6)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue6"
            onchange="setMaxValue(6)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart7">
        <div class="full_screen">
          <button id="fullscreenButton7" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart7"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue7"
            onchange="setMinValue(7)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue7"
            onchange="setMaxValue(7)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart8">
        <div class="full_screen">
          <button id="fullscreenButton8" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart8"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue8"
            onchange="setMinValue(8)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue8"
            onchange="setMaxValue(8)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart9">
        <div class="full_screen">
          <button id="fullscreenButton9" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart9"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue9"
            onchange="setMinValue(9)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue9"
            onchange="setMaxValue(9)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart10">
        <div class="full_screen">
          <button id="fullscreenButton10" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myChart10"></canvas>
        <div class="condition">
          <input
            class="real-time-input input100"
            type="text"
            id="minValue10"
            onchange="setMinValue(10)"
            placeholder="Input Min Value"
          />
          <input
            class="real-time-input input100"
            type="text"
            id="maxValue10"
            onchange="setMaxValue(10)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
    </div>
  </div>
  <div id="fixed-time" style="margin-top: 120px;">
    <div class="label-container">
      <div class="label">
        <label class="checkbox1">
          <input type="checkbox" id="fixedcheckbox1" checked />
          <span class="custom-checkbox"></span>
          Sensor1
        </label>
      </div>
      <div class="label">
        <label class="checkbox2">
          <input type="checkbox" id="fixedcheckbox2" checked />
          <span class="custom-checkbox"></span>
          Sensor2
        </label>
      </div>
      <div class="label">
        <label class="checkbox3">
          <input type="checkbox" id="fixedcheckbox3" checked />
          <span class="custom-checkbox"></span>
          Sensor3
        </label>
      </div>
      <div class="label">
        <label class="checkbox4">
          <input type="checkbox" id="fixedcheckbox4" checked />
          <span class="custom-checkbox"></span>
          Sensor4
        </label>
      </div>
      <div class="label">
        <label class="checkbox5">
          <input type="checkbox" id="fixedcheckbox5" checked />
          <span class="custom-checkbox"></span>
          Sensor5
        </label>
      </div>
      <div class="label">
        <label class="checkbox6">
          <input type="checkbox" id="fixedcheckbox6" checked />
          <span class="custom-checkbox"></span>
          Sensor6
        </label>
      </div>
      <div class="label">
        <label class="checkbox7">
          <input type="checkbox" id="fixedcheckbox7" checked />
          <span class="custom-checkbox"></span>
          Sensor7
        </label>
      </div>
      <div class="label">
        <label class="checkbox8">
          <input type="checkbox" id="fixedcheckbox8" checked />
          <span class="custom-checkbox"></span>
          Sensor8
        </label>
      </div>
      <div class="label">
        <label class="checkbox9">
          <input type="checkbox" id="fixedcheckbox9" checked />
          <span class="custom-checkbox"></span>
          Sensor9
        </label>
      </div>
      <div class="label">
        <label class="checkbox10">
          <input type="checkbox" id="fixedcheckbox10" checked />
          <span class="custom-checkbox"></span>
          Sensor10
        </label>
      </div>
    </div>
    <div class="canvas_containar">
      <div class="chart" id="fixedchart1">
        <div class="full_screen">
           <button id="fixedfullscreenButton1" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart1"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart1"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend1"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue1"
            onchange="setFixedMinValue(1)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue1"
            onchange="setFixedMaxValue(1)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart2">
        <div class="full_screen">
            <button id="fixedfullscreenButton2" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart2"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart2"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend2"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue2"
            onchange="setFixedMinValue(2)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue2"
            onchange="setFixedMaxValue(2)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart3">
        <div class="full_screen">
            <button id="fixedfullscreenButton3" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart3"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart3"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend3"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue3"
            onchange="setFixedMinValue(3)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue3"
            onchange="setFixedMaxValue(3)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart4">
        <div class="full_screen">
            <button id="fixedfullscreenButton4" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart4"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart4"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend4"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue4"
            onchange="setFixedMinValue(4)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue4"
            onchange="setFixedMaxValue(4)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart5">
        <div class="full_screen">
            <button id="fixedfullscreenButton5" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart5"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart5"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend5"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue5"
            onchange="setFixedMinValue(5)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue5"
            onchange="setFixedMaxValue(5)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart6">
        <div class="full_screen">
            <button id="fixedfullscreenButton6" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart6"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart6"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend6"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue6"
            onchange="setFixedMinValue(6)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue6"
            onchange="setFixedMaxValue(6)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart7">
        <div class="full_screen">
            <button id="fixedfullscreenButton7" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart7"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart7"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend7"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue7"
            onchange="setFixedMinValue(7)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue7"
            onchange="setFixedMaxValue(7)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart8">
        <div class="full_screen">
            <button id="fixedfullscreenButton8" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart8"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart8"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend8"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue8"
            onchange="setFixedMinValue(8)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue8"
            onchange="setFixedMaxValue(8)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart9">
        <div class="full_screen">
            <button id="fixedfullscreenButton9" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart9"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerstart9"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepickerend9"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue9"
            onchange="setFixedMinValue(9)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue9"
            onchange="setFixedMaxValue(9)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart10">
        <div class="full_screen">
            <button id="fixedfullscreenButton10" class="fullscreenbutton"><i class="fas fa-expand"></i></button>
        </div>
        <canvas id="myfixedChart10"></canvas>
        <div class="condition">
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepicker1"
            placeholder="Select a start date and time"
          />
          <input
            class="datetimepicker input100"
            type="datetime"
            id="datetimepicker2"
            placeholder="Select a end date and time"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="minFixedValue10"
            onchange="setFixedMinValue(10)"
            placeholder="Input Min Value"
          />
          <input
            class="fixed-time-input input100"
            type="text"
            id="maxFixedValue10"
            onchange="setFixedMaxValue(10)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
    </div>
  </div>
    <?php include('./layouts/footer.php');?>




    <script type="text/javascript">
  $(document).ready(function () {
    initializeDateTimePickers();
    $("#fixed-time").hide();
  });

  function makeChartFullscreen(chartId, buttonId) {
    document.getElementById(buttonId).addEventListener('click', function() {
      var chart = document.getElementById(chartId);

      if (chart.requestFullscreen) {
        chart.requestFullscreen();
      } else if (chart.mozRequestFullScreen) { // Firefox
        chart.mozRequestFullScreen();
      } else if (chart.webkitRequestFullscreen) { // Chrome, Safari and Opera
        chart.webkitRequestFullscreen();
      } else if (chart.msRequestFullscreen) { // IE/Edge
        chart.msRequestFullscreen();
      }
    });
  }

  makeChartFullscreen('myChart1', 'fullscreenButton1');
  makeChartFullscreen('myChart2', 'fullscreenButton2');
  makeChartFullscreen('myChart3', 'fullscreenButton3');
  makeChartFullscreen('myChart4', 'fullscreenButton4');
  makeChartFullscreen('myChart5', 'fullscreenButton5');
  makeChartFullscreen('myChart6', 'fullscreenButton6');
  makeChartFullscreen('myChart7', 'fullscreenButton7');
  makeChartFullscreen('myChart8', 'fullscreenButton8');
  makeChartFullscreen('myChart9', 'fullscreenButton9');
  makeChartFullscreen('myChart10', 'fullscreenButton10');

  makeChartFullscreen('myfixedChart1', 'fixedfullscreenButton1');
  makeChartFullscreen('myfixedChart2', 'fixedfullscreenButton2');
  makeChartFullscreen('myfixedChart3', 'fixedfullscreenButton3');
  makeChartFullscreen('myfixedChart4', 'fixedfullscreenButton4');
  makeChartFullscreen('myfixedChart5', 'fixedfullscreenButton5');
  makeChartFullscreen('myfixedChart6', 'fixedfullscreenButton6');
  makeChartFullscreen('myfixedChart7', 'fixedfullscreenButton7');
  makeChartFullscreen('myfixedChart8', 'fixedfullscreenButton8');
  makeChartFullscreen('myfixedChart9', 'fixedfullscreenButton9');
  makeChartFullscreen('myfixedChart10', 'fixedfullscreenButton10');

  

  function initializeDateTimePickers() {
    $(
      "[id^='datetimepickerstart'], [id^='datetimepickerend']"
    ).datetimepicker({format: 'Y-m-d H:i'});
  }

  function setMinValue(chartNumber) {
    let min = $("#minValue" + chartNumber).val();
    window["config" + chartNumber].options.scales.yAxes[0].ticks.min =
      parseInt(min);
  }

  function setMaxValue(chartNumber) {
    let max = $("#maxValue" + chartNumber).val();
    window["config" + chartNumber].options.scales.yAxes[0].ticks.max =
      parseInt(max);
  }

  function setFixedMinValue(chartNumber) {
    let min = $("#minFixedValue" + chartNumber).val();
    window["fixedconfig" + chartNumber].options.scales.yAxes[0].ticks.min =
      parseInt(min);
  }

  function setFixedMaxValue(chartNumber) {
    let max = $("#maxFixedValue" + chartNumber).val();
    window["fixedconfig" + chartNumber].options.scales.yAxes[0].ticks.max =
      parseInt(max);
  }

  $("#mySelect").change(function () {
    var selectedOption = $(this).val();
    if (selectedOption == 1) {
      $("#real-time").hide();
      $("#fixed-time").show();
    } else {
      $("#real-time").show();
      $("#fixed-time").hide();
    }
  });

  $("[id^='checkbox']").change(function () {
    var checkboxNumber = $(this).attr("id").slice(-1);
    
    if (checkboxNumber == 0) {
      checkboxNumber = '10';
    }
    var chartId = "#chart" + checkboxNumber;
    if ($(this).is(":checked")) {
      $(chartId).show();
    } else {
      $(chartId).hide();
    }
  });

  $("[id^='fixedcheckbox']").change(function () {
    var checkboxNumber = $(this).attr("id").slice(-1);
    
    if (checkboxNumber == 0) {
      checkboxNumber = '10';
    }
    var chartId = "#fixedchart" + checkboxNumber;
    if ($(this).is(":checked")) {
      $(chartId).show();
    } else {
      $(chartId).hide();
    }
  });

var chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)',
	pink: 'rgb(255, 192, 203)',
	brown: 'rgb(165, 42, 42)',
	teal: 'rgb(0, 128, 128)'
};

function randomScalingFactor() {
	return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
}

function onRefresh(chart) {
  var now = Date.now();
  var tenMinutesBefore = now + 10 * 60 * 1000;

  $.ajax({
    url: "./actions/getData.php",
    dataType: 'json',
    async: false,
    data: { table: "SN"+(chart.id+1), time: now},
    success: function(data) {
      console.log(chart.id+1, data);
      chart.data.datasets.forEach(function(dataset) {
        if (data == 0) {
          var addvalue = 0;
        } else {
          var addvalue = data[0][1];
        }
        console.log({
          x: now,
          y: addvalue
        });
        dataset.data.push({
          x: now,
          y: addvalue
        });
      });
    }
  });

  // chart.data.datasets.forEach(function(dataset) {
  //   dataset.data.push({
  //     x: new Date(now),
  //     y: randomScalingFactor()
  //   });
  // });
}

var color = Chart.helpers.color;
function createConfig(sensorLabel, borderColor) {
    return {
        type: 'line',
        data: {
            datasets: [{
                label: sensorLabel,
                backgroundColor: color(chartColors.red).alpha(0.5).rgbString(),
                borderColor: borderColor,
                fill: false,
                lineTension: 0,
                borderDash: [8, 4],
                data: []
            }]
        },
        options: {
          title: {
            display: true,
            text: 'Select Sensor'
          },
          scales: {
            xAxes: [{
              type: 'realtime',
              realtime: {
                unit: 'second',
                displayFormats: {
                  second: 'YYYY-MM-DD HH:mm:ss'
                },
                tooltipFormat: 'YYYY-MM-DD HH:mm:ss',
                duration: 20000,
                refresh: 3000,
                delay: 3000,
                onRefresh: onRefresh
              }
            }],
            yAxes: [{
              type: 'linear',
              display: true,
              // ticks: {
              //     min: 10, // minimum value
              //     max: 30 // maximum value
              // },
              scaleLabel: {
                display: true,
                labelString: 'value'
              }
            }],
          },
          tooltips: {
            mode: 'nearest',
            intersect: false
          },
          hover: {
            mode: 'nearest',
            intersect: false
          },
          pan: {
            enabled: true,
            mode: 'x',
            rangeMax: {
              x: 4000
            },
            rangeMin: {
              x: 0
            }
          },
          zoom: {
            enabled: true,
            mode: 'x',
            rangeMax: {
              x: 20000
            },
            rangeMin: {
              x: 1000
            }
          }
        }
    };
}
var config1 = createConfig('Sensor1', chartColors.red);
var config2 = createConfig('Sensor2', chartColors.orange);
var config3 = createConfig('Sensor3', chartColors.yellow);
var config4 = createConfig('Sensor4', chartColors.green);
var config5 = createConfig('Sensor5', chartColors.blue);
var config6 = createConfig('Sensor6', chartColors.purple);
var config7 = createConfig('Sensor7', chartColors.grey);
var config8 = createConfig('Sensor8', chartColors.pink);
var config9 = createConfig('Sensor9', chartColors.brown);
var config10 = createConfig('Sensor10', chartColors.teal);

function createFixedConfig(sensorLabel, borderColor) {
    return {
        type: 'line',
        data: {
            labels: ['2022-01-01T00:00:00', '2022-01-02T00:00:00', '2022-01-03T00:00:00', '2022-01-04T00:00:00', '2022-01-05T00:00:00', '2022-01-06T00:00:00',
'2022-01-07T00:00:00', '2022-01-08T00:00:00', '2022-01-09T00:00:00', '2022-01-10T00:00:00', '2022-01-11T00:00:00', '2022-01-12T00:00:00',
'2022-01-13T00:00:00', '2022-01-14T00:00:00', '2022-01-15T00:00:00', '2022-01-16T00:00:00', '2022-01-17T00:00:00', '2022-01-18T00:00:00',
'2022-01-19T00:00:00', '2022-01-20T00:00:00', '2022-01-2T00:00:00', '2022-01-22T00:00:00', '2022-01-23T00:00:00', '2022-01-24T00:00:00'],
            datasets: [{
                label: sensorLabel,
                backgroundColor: color(chartColors.red).alpha(0.5).rgbString(),
                borderColor: borderColor,
                fill: false,
                lineTension: 0,
                borderDash: [8, 4],
                data: [100, 150, 170, 180,130,120,100, 150, 170, 180,130,120,100, 150, 170, 180,130,120,100, 150, 170, 180,130,120]
            }]
        },
        options: {
          title: {
            display: true,
            text: 'Select Sensor'
          },
          tooltips: {
            mode: 'nearest',
            intersect: false
          },
          hover: {
            mode: 'nearest',
            intersect: false
          },
          pan: {
            enabled: true,
            mode: 'x',
            rangeMax: {
              x: 4000
            },
            rangeMin: {
              x: 0
            }
          },
          zoom: {
            enabled: true,
            mode: 'x',
            rangeMax: {
              x: 20000
            },
            rangeMin: {
              x: 1000
            }
          }
		    }
    };
}
var fixedconfig1 = createFixedConfig('Sensor1', chartColors.red);
var fixedconfig2 = createFixedConfig('Sensor2', chartColors.orange);
var fixedconfig3 = createFixedConfig('Sensor3', chartColors.yellow);
var fixedconfig4 = createFixedConfig('Sensor4', chartColors.green);
var fixedconfig5 = createFixedConfig('Sensor5', chartColors.blue);
var fixedconfig6 = createFixedConfig('Sensor6', chartColors.purple);
var fixedconfig7 = createFixedConfig('Sensor7', chartColors.grey);
var fixedconfig8 = createFixedConfig('Sensor8', chartColors.pink);
var fixedconfig9 = createFixedConfig('Sensor9', chartColors.brown);
var fixedconfig10 = createFixedConfig('Sensor10', chartColors.teal);

function createCharts() {
    var chartElements = document.querySelectorAll('[id^="myChart"]');
    chartElements.forEach(function(element, index) {
        var ctx = element.getContext('2d');
        window['myChart' + (index + 1)] = new Chart(ctx, window['config' + (index + 1)]);
    });
}

function createfixedCharts() {
    var chartElements = document.querySelectorAll('[id^="myfixedChart"]');
    chartElements.forEach(function(element, index) {
        var ctx = element.getContext('2d');
        window['myfixedChart' + (index + 1)] = new Chart(ctx, window['fixedconfig' + (index + 1)]);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    createCharts();
    createfixedCharts();
    initialFixedChart();
});

function initialFixedChart() {
  for (var i = 1; i <= 10; i++) {
    var start = Date.now() - 24*60*60*1000;
    var end = Date.now();
    $.ajax({
      url: "./actions/getData.php",
      dataType: 'json',
      async: false,
      data: { table: "SN"+i, starttime: start, endtime: end},
      success: function(data) {
        var labels = data.map(item => item.timestamp);
        var datas = data.map(item => item.value);
        fixedconfig2.data.labels = labels;
        fixedconfig2.data.datasets[0].data = datas;
        window["fixedconfig" + i].data.labels = labels;
        window["fixedconfig" + i].data.datasets[0].data = datas;
        window["myfixedChart" + i].update();
      }
    });
  }
}

function handleDateChange(startId, endId, chartNumber) {
  $(startId).on('change', function(e) {
    var selectedDate = $(this).val();
    if ($(endId).val() != '') {
      var start = Date.parse(selectedDate);
      var end = Date.parse($(endId).val());
      if (end > start) {
        $.ajax({
          url: "./actions/getData.php",
          dataType: 'json',
          async: false,
          data: { table: "SN"+chartNumber, starttime: start, endtime: end},
          success: function(data) {
            console.log(data);
            var labels = data.map(item => item.timestamp);
            var datas = data.map(item => item.value);
            console.log(labels);
            console.log(datas);
            fixedconfig2.data.labels = labels;
            fixedconfig2.data.datasets[0].data = datas;
            window["fixedconfig" + chartNumber].data.labels = labels;
            window["fixedconfig" + chartNumber].data.datasets[0].data = datas;
            window["myfixedChart" + chartNumber].update();
          }
        });
        console.log('action');
      }
    }
  });
   $(endId).on('change', function(e) {
    var selectedDate = $(this).val();
    if ($(startId).val() != '') {
      var start = Date.parse($(startId).val());
      var end = Date.parse(selectedDate);
      if (end > start) {
        $.ajax({
          url: "./actions/getData.php",
          dataType: 'json',
          async: false,
          data: { table: "SN"+chartNumber, starttime: start, endtime: end},
          success: function(data) {
            console.log(data);
            var labels = data.map(item => item.timestamp);
            var datas = data.map(item => item.value);
            fixedconfig2.data.labels = labels;
            fixedconfig2.data.datasets[0].data = datas;
            window["fixedconfig" + chartNumber].data.labels = labels;
            window["fixedconfig" + chartNumber].data.datasets[0].data = datas;
            window["myfixedChart" + chartNumber].update();
          }
        });
        console.log('action');
      }
    }
  });
}

handleDateChange('#datetimepickerstart1', '#datetimepickerend1', 1);
handleDateChange('#datetimepickerstart2', '#datetimepickerend2', 2);
handleDateChange('#datetimepickerstart3', '#datetimepickerend3', 3);
handleDateChange('#datetimepickerstart4', '#datetimepickerend4', 4);
handleDateChange('#datetimepickerstart5', '#datetimepickerend5', 5);
handleDateChange('#datetimepickerstart6', '#datetimepickerend6', 6);
handleDateChange('#datetimepickerstart7', '#datetimepickerend7', 7);
handleDateChange('#datetimepickerstart8', '#datetimepickerend8', 8);
handleDateChange('#datetimepickerstart9', '#datetimepickerend9', 9);
handleDateChange('#datetimepickerstart10', '#datetimepickerend10', 10);

</script>

</body>

</html>
