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

  select,
  input {
    width: 23%;
    margin: 1%;
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
  }

  select {
    width: 200px;
    margin-bottom: 20px;
    margin-right: 20px;
  }

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
    background-color: lightgray;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
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
    margin: 30px;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
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
    display: flex;
  }
</style>

<body class="">
  <div class="topsearch">
    <select id="mySelect">
      <option value="0">Select Type</option>
      <option value="1">Fixed</option>
      <option value="2" selected>Real Time</option>
    </select>
  </div>
  <div id="real-time">
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
        <canvas id="myChart1"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart1"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend1"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue1"
            onchange="setMinValue(1)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue1"
            onchange="setMaxValue(1)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart2">
        <canvas id="myChart2"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart2"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend2"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue2"
            onchange="setMinValue(2)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue2"
            onchange="setMaxValue(2)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart3">
        <canvas id="myChart3"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart3"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend3"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue3"
            onchange="setMinValue(3)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue3"
            onchange="setMaxValue(3)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart4">
        <canvas id="myChart4"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart4"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend4"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue4"
            onchange="setMinValue(4)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue4"
            onchange="setMaxValue(4)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart5">
        <canvas id="myChart5"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart5"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend5"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue5"
            onchange="setMinValue(5)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue5"
            onchange="setMaxValue(5)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart6">
        <canvas id="myChart6"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart6"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend6"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue6"
            onchange="setMinValue(6)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue6"
            onchange="setMaxValue(6)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart7">
        <canvas id="myChart7"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart7"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend7"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue7"
            onchange="setMinValue(7)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue7"
            onchange="setMaxValue(7)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart8">
        <canvas id="myChart8"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart8"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend8"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue8"
            onchange="setMinValue(8)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue8"
            onchange="setMaxValue(8)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart9">
        <canvas id="myChart9"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart10"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend10"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue9"
            onchange="setMinValue(9)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue9"
            onchange="setMaxValue(9)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="chart10">
        <canvas id="myChart10"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepicker1"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepicker2"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue10"
            onchange="setMinValue(10)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue10"
            onchange="setMaxValue(10)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
    </div>
  </div>
  <div id="fixed-time">
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
        <canvas id="myfixedChart1"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart1"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend1"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue1"
            onchange="setMinValue(1)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue1"
            onchange="setMaxValue(1)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart2">
        <canvas id="myfixedChart2"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart2"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend2"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue2"
            onchange="setMinValue(2)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue2"
            onchange="setMaxValue(2)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart3">
        <canvas id="myfixedChart3"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart3"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend3"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue3"
            onchange="setMinValue(3)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue3"
            onchange="setMaxValue(3)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart4">
        <canvas id="myfixedChart4"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart4"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend4"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue4"
            onchange="setMinValue(4)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue4"
            onchange="setMaxValue(4)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart5">
        <canvas id="myfixedChart5"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart5"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend5"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue5"
            onchange="setMinValue(5)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue5"
            onchange="setMaxValue(5)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart6">
        <canvas id="myfixedChart6"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart6"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend6"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue6"
            onchange="setMinValue(6)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue6"
            onchange="setMaxValue(6)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart7">
        <canvas id="myfixedChart7"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart7"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend7"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue7"
            onchange="setMinValue(7)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue7"
            onchange="setMaxValue(7)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart8">
        <canvas id="myfixedChart8"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart8"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend8"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue8"
            onchange="setMinValue(8)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue8"
            onchange="setMaxValue(8)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart9">
        <canvas id="myfixedChart9"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepickerstart10"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepickerend10"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue9"
            onchange="setMinValue(9)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue9"
            onchange="setMaxValue(9)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
      <div class="chart" id="fixedchart10">
        <canvas id="myfixedChart10"></canvas>
        <div class="condition">
          <input
            type="text"
            id="datetimepicker1"
            placeholder="Select a start date and time"
          />
          <input
            type="text"
            id="datetimepicker2"
            placeholder="Select a end date and time"
          />
          <input
            type="text"
            id="minValue10"
            onchange="setMinValue(10)"
            placeholder="Input Min Value"
          />
          <input
            type="text"
            id="maxValue10"
            onchange="setMaxValue(10)"
            placeholder="Input Max Value"
          />
        </div>
      </div>
    </div>
  </div>
    <?php include('./layouts/footer.php');?>




</script>


<script type="text/javascript">
  $(document).ready(function () {
    initializeDateTimePickers();
    $("#fixed-time").hide();
  });

  function initializeDateTimePickers() {
    $(
      "[id^='datetimepickerstart'], [id^='datetimepickerend']"
    ).datetimepicker();
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
    var chartId = "#chart" + checkboxNumber;

    if ($(this).is(":checked")) {
      $(chartId).show();
    } else {
      $(chartId).hide();
    }
  });

  $("[id^='fixedcheckbox']").change(function () {
    var checkboxNumber = $(this).attr("id").slice(-1);
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
      chart.data.datasets.forEach(function(dataset) {
        if (data == 0) {
          var addvalue = 0;
        } else {
          var addvalue = data[0][1];
        }
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
                duration: 20000,
                refresh: 1000,
                delay: 2000,
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
            labels: ['2022-01-01T00:00:00', '2022-01-02T00:00:00', '2022-01-03T00:00:00', '2022-01-04T00:00:00', '2022-01-05T00:00:00', '2022-01-06T00:00:00'],
            datasets: [{
                label: sensorLabel,
                backgroundColor: color(chartColors.red).alpha(0.5).rgbString(),
                borderColor: borderColor,
                fill: false,
                lineTension: 0,
                borderDash: [8, 4],
                data: [10, 20, 30, 25, 40, 35]
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
});

	// setInterval(function(){updateChart()}, 1000);
</script>

</body>

</html>
