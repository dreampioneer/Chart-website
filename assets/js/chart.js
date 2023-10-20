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

$.ajax({
	url: "./actions/getData.php",
	dataType: 'json',
	async: false,
	data: { table: "SN"+i},
	success: function(data) {
		var newdate = '';
		$.each((data), function(key, value){
		newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
		newdate = value[2];
		});

		newChart.render();
		newChart.axisX[0].set("title", newdate, true);
	}
});

function onRefresh(chart) {
	var now = Date.now();
	chart.data.datasets.forEach(function(dataset) {
		dataset.data.push({
			x: now,
			y: randomScalingFactor()
		});
	});
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

function createCharts() {
    var chartElements = document.querySelectorAll('[id^="myChart"]');
    chartElements.forEach(function(element, index) {
        var ctx = element.getContext('2d');
        window['myChart' + (index + 1)] = new Chart(ctx, window['config' + (index + 1)]);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    createCharts();
});

// window.onload = function() {
// 	var ctx1 = document.getElementById('myChart1').getContext('2d');
// 	var ctx2 = document.getElementById('myChart2').getContext('2d');
// 	var ctx3 = document.getElementById('myChart3').getContext('2d');
// 	var ctx4 = document.getElementById('myChart4').getContext('2d');
// 	var ctx5 = document.getElementById('myChart5').getContext('2d');
// 	var ctx6 = document.getElementById('myChart6').getContext('2d');
// 	var ctx7 = document.getElementById('myChart7').getContext('2d');
// 	var ctx8 = document.getElementById('myChart8').getContext('2d');
// 	var ctx9 = document.getElementById('myChart9').getContext('2d');
// 	var ctx10 = document.getElementById('myChart10').getContext('2d');
// 	window.myChart1 = new Chart(ctx1, config1);
// 	window.myChart2 = new Chart(ctx2, config2);
// 	window.myChart3 = new Chart(ctx3, config3);
// 	window.myChart4 = new Chart(ctx4, config4);
// 	window.myChart5 = new Chart(ctx5, config5);
// 	window.myChart6 = new Chart(ctx6, config6);
// 	window.myChart7 = new Chart(ctx7, config7);
// 	window.myChart8 = new Chart(ctx8, config8);
// 	window.myChart9 = new Chart(ctx9, config9);
// 	window.myChart10 = new Chart(ctx10, config10);
// };

// document.getElementById('randomizeData').addEventListener('click', function() {
// 	config.data.datasets.forEach(function(dataset) {
// 		dataset.data.forEach(function(dataObj) {
// 			dataObj.y = randomScalingFactor();
// 		});
// 	});

// 	window.myChart.update();
// });

// var colorNames = Object.keys(chartColors);
// document.getElementById('addDataset').addEventListener('click', function() {
// 	var colorName = colorNames[config.data.datasets.length % colorNames.length];
// 	var newColor = chartColors[colorName];
// 	var newDataset = {
// 		label: 'Dataset ' + (config.data.datasets.length + 1),
// 		backgroundColor: color(newColor).alpha(0.5).rgbString(),
// 		borderColor: newColor,
// 		fill: false,
// 		lineTension: 0,
// 		data: []
// 	};

// 	config.data.datasets.push(newDataset);
// 	window.myChart.update();
// });

// document.getElementById('removeDataset').addEventListener('click', function() {
// 	config.data.datasets.pop();
// 	window.myChart.update();
// });

// document.getElementById('minValue').addEventListener('change', function() {
// 	config.options.scales.yAxes.ticks =  {
//         // min: document.getElementById("minValue"), // minimum value
//         // max: document.getElementById("maxValue") // maximum value
// 		min: 1000,
//         max: 10000
//     }
// 	window.myChart.update();	
// });

// document.getElementById('addData').addEventListener('click', function() {
// 	onRefresh(window.myChart);
// 	window.myChart.update();
// });

// document.getElementById('resetZoom').addEventListener('click', function() {
// 	window.myChart.resetZoom();
// });