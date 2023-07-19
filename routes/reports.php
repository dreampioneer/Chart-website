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

                                                <div class="row">

                                                  <div class="col-lg-6 col-md-6 col-sm-6">

                                                        <div class="card-body">
                                                          <div class="">
                                                            <label for="sel1">Sensor Type:</label>
                                                            <select class="form-control" id="sel1">
                                                              <option value="http://trinityaether.com/sensor/routes/reports.php" selected>Fixed</option>
                                                              <option value="http://trinityaether.com/sensor/routes/realtime.php" >Real Type</option>
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
                              <a href="#myModal1" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                              <a href="#myyaxisModal1" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal2" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal2" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal3" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal3" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal4" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal4" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal5" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal5" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal6" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal6" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal7" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal7" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal8" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal8" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal9" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal9" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
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
                              <a href="#myModal10" role="button" class="btn  btn-danger" data-toggle="modal">Select Date and Time Range</a>
                                <a href="#myyaxisModal10" role="button" class="btn  btn-danger" data-toggle="modal">Select Values</a>
                            </div>
                          </div>
                        </div>
                      </div>





            </div>


          <?php     for($i=1; $i<=10; $i++) { ?>


            <!-- The Modal -->
            <div class="modal" id="myModal<?php echo $i?>">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Date Time Picker</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div>
                      <input type='datetime' class="form-control" id="datetimepicker_<?php echo $i?>" name="datetime1[]" placeholder="Start Date and Time..." />
                      <input type='datetime' class="form-control mt-2" id="datetimepicker_1_<?php echo $i?>" name="datetime2[]" placeholder="End Date and Time..." />
                      <button type="button" class="btn btn-success dateSubmit" id="dateSubmit<?php echo $i?>">SUBMIT</button>
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

for(var i=1; i<=10; i++) {
  var newChart = 'chart'+i;
  newChart = new CanvasJS.Chart("chartContainer"+i, {
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    animationEnabled: true,
    zoomEnabled: true,
    title: {
      text: "Sensor "+i
    },
    axisY: {
      title: "Value",
      minimum: 0,
      maximum: 500,
      interval: 50
    },
  data: [{
      type: "line",
      dataPoints: []
    }]
  });


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



}



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

      for(var i=1; i<=10; i++) {
          $('#datetimepicker_'+i).datetimepicker({format: 'Y-m-d H:i'});
          $('#datetimepicker_1_'+i).datetimepicker({format: 'Y-m-d H:i'});
      }

      $(document).on('click','.dateSubmit', function(e) {
        e.preventDefault();

        var dateID = $(this).attr('id');
        dateID = dateID.charAt(dateID.length -1 );

        console.log(dateID);

        var startDate = $('#datetimepicker_'+dateID).val();
        var endDate = $('#datetimepicker_1_'+dateID).val();

        console.log(startDate);
        console.log(endDate);

        updateChart('SN'+dateID, 'chart'+dateID, startDate, endDate  );
        $('#myModal'+dateID).modal('toggle');

      });

      $(document).on('click','.yaxisSubmit', function(e) {
        e.preventDefault();

        var dateID = $(this).attr('id');
        dateID = dateID.charAt(dateID.length -1 );

        console.log(dateID);

        var from = $('#from_'+dateID).val();
        var to = $('#to_'+dateID).val();

        console.log(from);
        console.log(to);

        updateValueChart('SN'+dateID, 'chart'+dateID, from, to  );
        $('#myyaxisModal'+dateID).modal('toggle');

      });



      	function updateChart(tableName , chartName , startDate, endDate) {

            var chartID = chartName.charAt(chartName.length -1 );
            var newChart = chartName;
            newChart = new CanvasJS.Chart("chartContainer"+chartID, {
              theme: "light2", // "light1", "light2", "dark1", "dark2"
              animationEnabled: true,
              zoomEnabled: true,
              title: {
                text: "Sensor "+chartID
              },
              axisY: {
                title: "Value",
                minimum: 0,
                maximum: 500,
                interval: 50
              },
            data: [{
                type: "line",
                dataPoints: []
              }]
            });


            $.ajax({
            url: "./actions/getData.php",
            dataType: 'json',
            async: false,
            data: { table: tableName, startDate: startDate, endDate: endDate},
            success: function(data) {
              if(data == '0') {
                alert('No Data Found');
              }
              var newdate = '';
              newChart.options.data[0].dataPoints = [];
              $.each((data), function(key, value){
                newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                newdate = value[2];
              });

              newChart.render();
              newChart.axisX[0].set("title", newdate, true);
            }
          });



        }

        function updateValueChart(tableName , chartName , from, to) {

            console.log(typeof from);
            var chartID = chartName.charAt(chartName.length -1 );
            var newChart = chartName;
            newChart = new CanvasJS.Chart("chartContainer"+chartID, {
              theme: "light2", // "light1", "light2", "dark1", "dark2"
              animationEnabled: true,
              zoomEnabled: true,
              title: {
                text: "Sensor "+chartID
              },
              axisY: {
                title: "Value",
                minimum: parseInt(from),
                maximum: parseInt(to),
                interval: 50
              },
            data: [{
                type: "line",
                dataPoints: []
              }]
            });


            $.ajax({
            url: "./actions/getData.php",
            dataType: 'json',
            async: false,
            data: { table: tableName, from: from, to: to},
            success: function(data) {
              if(data == '0') {
                alert('No Data Found');
              }
              var newdate = '';
              // newChart.options.data[0].dataPoints = [];
              $.each((data), function(key, value){
                newChart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                newdate = value[2];
              });

              newChart.render();
              // newChart.axisX[0].set("title", newdate, true);

              console.log(data);
            }
          });



        }



      	}




	// setInterval(function(){updateChart()}, 1000);
</script>

</body>

</html>
