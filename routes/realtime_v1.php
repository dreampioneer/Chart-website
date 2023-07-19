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
                                <div class="card-header">

                                    <div class="row align-items-center">
                                        <div class="col-12 p-3">

                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h3 class="mb-0 text-center">Sensor Reports</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">



                                  <div class="row">
                                      <div class="col-xl-12 order-xl-1">
                                          <div class="card">
                                              <div class="card-header">

                                              </div>

                                              <div class="card-body">

                                                <div class="row">

                                                  <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="card">
                                                      <div class="card-header card-header-warning card-header-icon">

                                                      </div>
                                                        <div class="card-body">
                                                          <div class="">
                                                            <label for="sel1">Sensor Type:</label>
                                                            <select class="form-control" id="sel1">
                                                              <option value="http://cies-western-eng.ca/sensor/routes/reports.php" >Fixed</option>
                                                              <option value="http://cies-western-eng.ca/sensor/routes/realtime.php" selected>Real Type</option>
                                                                                                                        </select>
                                                          </div>
                                                        </div>
                                                      <div class="card-footer">
                                                        <div class="stats">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="card">
                                                      <div class="card-header card-header-warning card-header-icon">

                                                      </div>
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
                                                          </div>

                                                        </div>
                                                      <div class="card-footer">
                                                        <div class="stats">
                                                        </div>
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

                            </div>
                          </div>
                        </div>
                      </div>





            </div>






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

var todayDate = new Date().toISOString().slice(0, 10);
console.log(todayDate);


for(var i=1; i<=9; i++) {
  var newChart = 'chart'+i;
  newChart = new CanvasJS.Chart("chartContainer"+i, {
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    animationEnabled: true,
    zoomEnabled: true,
    title: {
      text: "Sensor "+i
    },
    axisY: {
      title: "Value"
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
  data: { table: "SN"+i, startDate: todayDate},
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

      for(var i=1; i<=9; i++) {
          $('#datetimepicker_'+i).datetimepicker({format: 'Y-m-d H:i'});
          $('#datetimepicker_1_'+i).datetimepicker({format: 'Y-m-d H:i'});
      }


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
                title: "Value"
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

        setInterval(function(){

          for(var i=1; i<=9; i++) {
              updateChart('SN'+i, 'chart'+i, todayDate );
          }


        }, 5000);



      	}



</script>

</body>

</html>
