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

<body class="">
    <div class="wrapper ">
        <?php //include('./layouts/sidebar.php');?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include('./layouts/nav.php');?>

            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 order-xl-1">
                            <div class="card">
                                <!-- <div class="card-header">

                                    <div class="row align-items-center">
                                        <div class="col-12 p-3">

                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h3 class="mb-0 text-center">Sensor Reports</h3>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card-body">



                                  <div class="row">
                                      <div class="col-xl-12 order-xl-1">
                                          <div class="card">
                                              <div class="card-header">

                                              </div>

                                              <div class="card-body">

                                                <div class="row">

                                                  <div class="col-lg-6 col-md-6 col-sm-6">

                                                        <div class="card-body">
                                                          <div class="">
                                                            <label for="sel1">Sensor Type:</label>
                                                            <select class="form-control" id="sel1">
                                                              <option value="http://cies-western-eng.ca/sensor/routes/reports.php" >Fixed</option>
                                                              <option value="http://cies-western-eng.ca/sensor/routes/realtime.php" selected>Real Type</option>
                                                                                                                        </select>
                                                          </div>
                                                        </div>

                                                  </div>

                                                  <div class="col-lg-6 col-md-6 col-sm-12">

                                                        <div class="card-body">
                                                          <p>Select Sensor </p>
                                                          <div class="form-check">
                                                              <label class="">
                                                                <input name="chk1" class="check_box m-2" type="checkbox" data-ptag="sb1" id="chk1" value="" >Sensor 1
                                                              </label>
                                                              <label class="">
                                                                <input name="chk2" class="check_box m-2" type="checkbox" data-ptag="sb2" id="chk2" value="" >Sensor 2
                                                              </label>
                                                              <label class="">
                                                                <input name="chk3" class="check_box m-2" type="checkbox" data-ptag="sb3" id="chk3" value="" >Sensor 3
                                                              </label>
                                                              <label class="">
                                                                <input name="chk4" class="check_box m-2" type="checkbox" data-ptag="sb4" id="chk4" value="" >Sensor 4
                                                              </label>
                                                              <label class="">
                                                                <input name="chk5" class="check_box m-2" type="checkbox" data-ptag="sb5" id="chk5" value="" >Sensor 5
                                                              </label>
                                                              <label class="">
                                                                <input name="chk6" class="check_box m-2" type="checkbox" data-ptag="sb6" id="chk6" value="" >Sensor 6
                                                              </label>
                                                              <label class="">
                                                                <input name="chk7" class="check_box m-2" type="checkbox" data-ptag="sb7" id="chk7" value="" >Sensor 7
                                                              </label>
                                                              <label class="">
                                                                <input name="chk8" class="check_box m-2" type="checkbox" data-ptag="sb8" id="chk8" value="" >Sensor 8
                                                              </label>
                                                              <label class="">
                                                                <input name="chk9" class="check_box m-2" type="checkbox" data-ptag="sb9" id="chk9" value="" >Sensor 9
                                                              </label>
                                                              <label class="">
                                                                <input name="chk10" class="check_box m-2" type="checkbox" data-ptag="sb10" id="chk10" value="" >Sensor 10
                                                              </label>
                                                          </div>

                                                        </div>

                                                  </div>

                                                </div>

                                      </div>

                                    </div>

                                  </div>

                                </div>






                        <div class="row">


                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb1">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 1</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer1" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal1" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit1">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb2">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 2</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer2" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal2" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit2">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb3">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 3</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer3" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal3" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit3">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb4">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 4</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer4" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal4" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit4">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb5">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 5</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer5" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal5" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit5">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb6">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 6</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer6" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal6" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit6">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb7">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 7</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer7" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal7" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit7">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb8">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 8</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer8" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal8" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit8">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb9">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 9</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer9" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal9" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit9">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-6 p_element" id="sb10">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <!-- <h3 class="card-title pt-2">Sensor 9</h3> -->
                          </div>
                            <div class="card-body">
                              <div id="chartContainer10" style="height: 370px;"></div>
                            </div>
                          <div class="card-footer">
                            <div class="stats">
                              <a href="#myyaxisModal10" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                              <button type="button" class="btn btn-success resetSubmit" id="resetSubmit10">RESET</button>
                            </div>
                          </div>
                        </div>
                      </div>





            </div>




            <?php     for($i=1; $i<=10; $i++) { ?>


              <!-- The Modal -->
              <div class="modal" id="myyaxisModal<?php echo $i?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Y axis values</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <div>
                        <input type='text' class="form-control" id="from_<?php echo $i?>" name="from[]" placeholder="Start value..." />
                        <input type='text' class="form-control mt-2" id="to_<?php echo $i?>" name="to[]" placeholder="End value..." />
                        <button type="button" class="btn btn-success yaxisSubmit" id="yaxisSubmit<?php echo $i?>">SUBMIT</button>
                      </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>


           <?php } ?>





                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script><i class="material-icons"></i>
                        <a href="#" target="_blank"></a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php include('./layouts/footer.php');?>




</script>


<script type="text/javascript">

window.onload = function () {


for(var i=1;i<=10;i++){
  localStorage['table'+i] = 'SN'+i;

  if(!localStorage['from'+i] || ['from'+i] == '' || localStorage['from'+i] == 0) {
      localStorage['from'+i] = 0;
  }

  if(!localStorage['to'+i] || localStorage['to'+i] == '' || localStorage['to'+i] == 500) {
      localStorage['to'+i] = 500;
  }

}

console.log('From 1 value = ' + localStorage.from10);


var todayDate = new Date().toISOString().slice(0, 10);
console.log(todayDate);


var urlmenu = document.getElementById('sel1');

urlmenu.onchange = function() {
  document.location.href = this.value;
};

      $('.check_box').change(function(){
          if($('.check_box:checked').length==0){
              $('.p_element').show();
          }else{
              $('.p_element').hide();
              $('.check_box:checked').each(function(){
                  $('#'+$(this).attr('data-ptag')).show();
              });
          }

      });



      $(document).on('click','.yaxisSubmit', function(e) {
        e.preventDefault();

        var dateID = $(this).attr('id');

        if(dateID == 'yaxisSubmit10') {
          dateID = dateID.slice(-2);
        } else {
          dateID = dateID.charAt(dateID.length -1 );
        }


        console.log(dateID);

        var from = $('#from_'+dateID).val();
        var to = $('#to_'+dateID).val();

        localStorage['from'+dateID] = from;
        localStorage['to'+dateID] = to;

        console.log(localStorage);

        $('#myyaxisModal'+dateID).modal('toggle');

        location.reload();

      });


      $(document).on('click','.resetSubmit', function(e) {
        e.preventDefault();

        var dateID = $(this).attr('id');
        if(dateID == 'yaxisSubmit10') {
          dateID = dateID.slice(-2);
        } else {
          dateID = dateID.charAt(dateID.length -1 );
        }

        console.log(dateID);

        localStorage['from'+dateID] = 0;
        localStorage['to'+dateID] = 500;

        console.log(localStorage);

        location.reload();
      });


      var current = new Date();
      var currentTime = current.toLocaleTimeString();

        var dataPoints1 = [{ label: currentTime, y: 0}];
        var dataPoints2 = [{ label: currentTime, y: 0}];
        var dataPoints3 = [{ label: currentTime, y: 0}];
        var dataPoints4 = [{ label: currentTime, y: 0}];
        var dataPoints5 = [{ label: currentTime, y: 0}];
        var dataPoints6 = [{ label: currentTime, y: 0}];
        var dataPoints7 = [{ label: currentTime, y: 0}];
        var dataPoints8 = [{ label: currentTime, y: 0}];
        var dataPoints9 = [{ label: currentTime, y: 0}];
        var dataPoints10 = [{ label: currentTime, y: 0}];

        var chart1 = new CanvasJS.Chart("chartContainer1", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 1",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints1
          }]
        });


        var chart2 = new CanvasJS.Chart("chartContainer2", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 2",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints2
          }]
        });



        var chart3 = new CanvasJS.Chart("chartContainer3", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 3",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints3
          }]
        });



        var chart4 = new CanvasJS.Chart("chartContainer4", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 4",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints4
          }]
        });




        var chart5 = new CanvasJS.Chart("chartContainer5", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 5",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints5
          }]
        });



        var chart6 = new CanvasJS.Chart("chartContainer6", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 6",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints6
          }]
        });



        var chart7 = new CanvasJS.Chart("chartContainer7", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 7",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints7
          }]
        });



        var chart8 = new CanvasJS.Chart("chartContainer8", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 8",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints8
          }]
        });



        var chart9 = new CanvasJS.Chart("chartContainer9", {
          theme: "light2",
          backgroundColor: "black",
          animationEnabled: true,
          zoomEnabled: true,
          title: {
            text: "Sensor 9",
            fontColor: "white",
          },
          axisY: {
            title: "Value",
            fontColor: "white",
            minimum: 0,
            maximum: 500,
            interval: 100
          },
          legend : {
            fontColor: "red",
         },
         axisX:{
                 labelFontColor: "white"
              },
               axisY:{
                 labelFontColor: "white"
              },
        data: [{
            type: "area",
            lineColor: "#FF8C00",
            fillOpacity: .2,
            color: "orange",
            dataPoints: dataPoints9
          }]
        });




                var chart10 = new CanvasJS.Chart("chartContainer10", {
                  theme: "light2",
                  backgroundColor: "black",
                  animationEnabled: true,
                  zoomEnabled: true,
                  title: {
                    text: "Sensor 10",
                    fontColor: "white",
                  },
                  axisY: {
                    title: "Value",
                    fontColor: "white",
                    minimum: 0,
                    maximum: 500,
                    interval: 100
                  },
                  legend : {
                    fontColor: "red",
                 },
                 axisX:{
                         labelFontColor: "white"
                      },
                       axisY:{
                         labelFontColor: "white"
                      },
                data: [{
                    type: "area",
                    lineColor: "#FF8C00",
                    fillOpacity: .2,
                    color: "orange",
                    dataPoints: dataPoints10
                  }]
                });


    updateChart1();
    updateChart2();
    updateChart3();
    updateChart4();
    updateChart5();
    updateChart6();
    updateChart7();
    updateChart8();
    updateChart9();
    updateChart10();



    function updateChart1() {
        console.log(localStorage);
        $.ajax({
            url: "./actions/getData.php",
            dataType: 'json',
            async: false,
            data: { table: 'SN1', startDate: todayDate, from: localStorage.from1, to: localStorage.to1},
            success: function(data) {
              var newdate = '';
              // newChart.options.data[0].dataPoints = [];
              $.each((data), function(key, value){
                  // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                dataPoints1.push({
                label: value[0],
                y: parseInt(value[1])
                });
                newdate = value[2];
              });

              chart1.render();
              chart1.axisX[0].set("title", todayDate, true);
              chart1.axisY[0].set("minimum", parseInt(localStorage.from1), true);
              chart1.axisY[0].set("maximum", parseInt(localStorage.to1), true);
              chart1.axisY[0].set("interval", 50, true);
            }
          });

        //   setTimeout(updateChart1, 5000);

        }



        function updateChart2() {

            $.ajax({
                url: "./actions/getData.php",
                dataType: 'json',
                async: false,
                data: { table: 'SN2', startDate: todayDate, from: localStorage.from2, to: localStorage.to2},
                success: function(data) {
                  var newdate = '';
                  // newChart.options.data[0].dataPoints = [];
                  $.each((data), function(key, value){
                    // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                    dataPoints2.push({
                    label: value[0],
                    y: parseInt(value[1])
                    });
                    newdate = value[2];
                  });

                  chart2.render();
                  chart2.axisX[0].set("title", todayDate, true);
                  chart2.axisY[0].set("minimum", parseInt(localStorage.from2), true);
                  chart2.axisY[0].set("maximum", parseInt(localStorage.to2), true);
                  chart2.axisY[0].set("interval", 50, true);
                }
              });

            //   setTimeout(updateChart2, 5000);

            }



            function updateChart3() {

                $.ajax({
                    url: "./actions/getData.php",
                    dataType: 'json',
                    async: false,
                    data: { table: 'SN3', startDate: todayDate, from: localStorage.from3, to: localStorage.to3},
                    success: function(data) {
                      var newdate = '';
                      // newChart.options.data[0].dataPoints = [];
                      $.each((data), function(key, value){
                        // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                        dataPoints3.push({
                        label: value[0],
                        y: parseInt(value[1])
                        });
                        newdate = value[2];
                      });

                      chart3.render();
                      chart3.axisX[0].set("title", todayDate, true);
                      chart3.axisY[0].set("minimum", parseInt(localStorage.from3), true);
                      chart3.axisY[0].set("maximum", parseInt(localStorage.to3), true);
                      chart3.axisY[0].set("interval", 50, true);
                    }
                  });

                //   setTimeout(updateChart3, 5000);

                }



                function updateChart4() {

                    $.ajax({
                        url: "./actions/getData.php",
                        dataType: 'json',
                        async: false,
                        data: { table: 'SN4', startDate: todayDate, from: localStorage.from4, to: localStorage.to4},
                        success: function(data) {
                          var newdate = '';
                          // newChart.options.data[0].dataPoints = [];
                          $.each((data), function(key, value){
                            // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                            dataPoints4.push({
                            label: value[0],
                            y: parseInt(value[1])
                            });
                            newdate = value[2];
                          });

                          chart4.render();
                          chart4.axisX[0].set("title", todayDate, true);
                          chart4.axisY[0].set("minimum", parseInt(localStorage.from4), true);
                          chart4.axisY[0].set("maximum", parseInt(localStorage.to4), true);
                          chart4.axisY[0].set("interval", 50, true);
                        }
                      });

                    //   setTimeout(updateChart4, 5000);

                    }


                    function updateChart5() {

                        $.ajax({
                            url: "./actions/getData.php",
                            dataType: 'json',
                            async: false,
                            data: { table: 'SN5', startDate: todayDate, from: localStorage.from5, to: localStorage.to5},
                            success: function(data) {
                              var newdate = '';
                              // newChart.options.data[0].dataPoints = [];
                              $.each((data), function(key, value){
                                // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                                dataPoints5.push({
                                label: value[0],
                                y: parseInt(value[1])
                                });
                                newdate = value[2];
                              });

                              chart5.render();
                              chart5.axisX[0].set("title", todayDate, true);
                              chart5.axisY[0].set("minimum", parseInt(localStorage.from5), true);
                              chart5.axisY[0].set("maximum", parseInt(localStorage.to5), true);
                              chart5.axisY[0].set("interval", 50, true);
                            }
                          });

                        //   setTimeout(updateChart5, 5000);

                        }


                        function updateChart6() {

                            $.ajax({
                                url: "./actions/getData.php",
                                dataType: 'json',
                                async: false,
                                data: { table: 'SN6', startDate: todayDate, from: localStorage.from6, to: localStorage.to6},
                                success: function(data) {
                                  var newdate = '';
                                  // newChart.options.data[0].dataPoints = [];
                                  $.each((data), function(key, value){
                                    // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                                    dataPoints6.push({
                                    label: value[0],
                                    y: parseInt(value[1])
                                    });
                                    newdate = value[2];
                                  });

                                  chart6.render();
                                  chart6.axisX[0].set("title", todayDate, true);
                                  chart6.axisY[0].set("minimum", parseInt(localStorage.from6), true);
                                  chart6.axisY[0].set("maximum", parseInt(localStorage.to6), true);
                                  chart6.axisY[0].set("interval", 50, true);
                                }
                              });

                            //   setTimeout(updateChart6, 5000);

                            }



                            function updateChart7() {

                                $.ajax({
                                    url: "./actions/getData.php",
                                    dataType: 'json',
                                    async: false,
                                    data: { table: 'SN7', startDate: todayDate, from: localStorage.from7, to: localStorage.to7},
                                    success: function(data) {
                                      var newdate = '';
                                      // newChart.options.data[0].dataPoints = [];
                                      $.each((data), function(key, value){
                                        // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                                        dataPoints7.push({
                                        label: value[0],
                                        y: parseInt(value[1])
                                        });
                                        newdate = value[2];
                                      });

                                      chart7.render();
                                      chart7.axisX[0].set("title", todayDate, true);
                                      chart7.axisY[0].set("minimum", parseInt(localStorage.from7), true);
                                      chart7.axisY[0].set("maximum", parseInt(localStorage.to7), true);
                                      chart7.axisY[0].set("interval", 50, true);
                                    }
                                  });

                                //   setTimeout(updateChart7, 5000);

                                }




                                function updateChart8() {

                                    $.ajax({
                                        url: "./actions/getData.php",
                                        dataType: 'json',
                                        async: false,
                                        data: { table: 'SN8', startDate: todayDate, from: localStorage.from8, to: localStorage.to8},
                                        success: function(data) {
                                          var newdate = '';
                                          // newChart.options.data[0].dataPoints = [];
                                          $.each((data), function(key, value){
                                            // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                                            dataPoints8.push({
                                            label: value[0],
                                            y: parseInt(value[1])
                                            });
                                            newdate = value[2];
                                          });

                                          chart8.render();
                                          chart8.axisX[0].set("title", todayDate, true);
                                          chart8.axisY[0].set("minimum", parseInt(localStorage.from8), true);
                                          chart8.axisY[0].set("maximum", parseInt(localStorage.to8), true);
                                          chart8.axisY[0].set("interval", 50, true);
                                        }
                                      });

                                    //   setTimeout(updateChart8, 5000);

                                    }



                                    function updateChart9() {

                                        $.ajax({
                                            url: "./actions/getData.php",
                                            dataType: 'json',
                                            async: false,
                                            data: { table: 'SN9', startDate: todayDate, from: localStorage.from9, to: localStorage.to9},
                                            success: function(data) {
                                              var newdate = '';
                                              // newChart.options.data[0].dataPoints = [];
                                              $.each((data), function(key, value){
                                                // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                                                dataPoints9.push({
                                                label: value[0],
                                                y: parseInt(value[1])
                                                });
                                                newdate = value[2];
                                              });

                                              chart9.render();
                                              chart9.axisX[0].set("title", todayDate, true);
                                              chart9.axisY[0].set("minimum", parseInt(localStorage.from9), true);
                                              chart9.axisY[0].set("maximum", parseInt(localStorage.to9), true);
                                              chart9.axisY[0].set("interval", 50, true);
                                            }
                                          });

                                        //   setTimeout(updateChart9, 5000);

                                        }








                                                                            function updateChart10() {

                                                                                $.ajax({
                                                                                    url: "./actions/getData.php",
                                                                                    dataType: 'json',
                                                                                    async: false,
                                                                                    data: { table: 'SN10', startDate: todayDate, from: localStorage.from10, to: localStorage.to10},
                                                                                    success: function(data) {
                                                                                      var newdate = '';
                                                                                      // newChart.options.data[0].dataPoints = [];
                                                                                      $.each((data), function(key, value){
                                                                                        // newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                                                                                        dataPoints10.push({
                                                                                        label: value[0],
                                                                                        y: parseInt(value[1])
                                                                                        });
                                                                                        newdate = value[2];
                                                                                      });

                                                                                      chart10.render();
                                                                                      chart10.axisX[0].set("title", todayDate, true);
                                                                                      chart10.axisY[0].set("minimum", parseInt(localStorage.from10), true);
                                                                                      chart10.axisY[0].set("maximum", parseInt(localStorage.to10), true);
                                                                                      chart10.axisY[0].set("interval", 50, true);
                                                                                    }
                                                                                  });

                                                                                //   setTimeout(updateChart10, 5000);

                                                                                }





  }



</script>

</body>

</html>
