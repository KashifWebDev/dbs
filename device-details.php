<?php
    require 'app/main.php';
    session_start();
    check_session();
    if (!isset($_SESSION["darkTheme"])){
        $_SESSION["darkTheme"] = 0;
    }

    $_SESSION['currentPath'] = "./";
    $_SESSION["device_details_id"] = $device_id = isset($_GET['id']) ? $_GET['id'] : 0;

    $sql = "SELECT * FROM custom_sections WHERE device_id=$device_id";
    $res = mysqli_query($con, $sql);
    $sectionRow = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>
<style>
    @font-face {
        font-family:"tempFont";
        src: url("assets/digital-7.regular.ttf") format("truetype");
    }
    #tempValue{
        font-family: tempFont;
        font-size: xxx-large;
    }
</style>
<script src="assets/line_chart/canvasjs.min.js"></script>
<body>
<?php
    $graph_col = 12;
    $graph_const_height = true;
    $showFirstRow=true;
//    if($sectionRow["device_settings_check"]!="on" && $sectionRow["torque_gauge_check"]!="on"){
//    $graph_const_height = true;
//    }
    if($sectionRow["graph_check"]!="on"){
        $showFirstRow=false;
    }
?>
  <!-- Navigation -->
  <?php $device_details_page = true; require 'app/navigation.include.php'; ?>

  <!-- Page Content -->
  <section style="height: 90vh; overflow: hidden;" class="scree-height">
      <div class="row <?php  if($graph_const_height) echo " graph_const_height"; if(!$showFirstRow) echo " d-flex justify-content-center"; ?>">
          <!-- First Box -->
          <?php
          if($sectionRow["device_settings_check"]=="on"){
              $graph_const_height = false;
              $graph_col = $graph_col-4;
              $sql = "SELECT * FROM custom_devicestatus WHERE device_id=$device_id";
              $res = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($res);
              ?>
              <div class="col-md-4">
                  <div class="custom_card w-100">
                      <div class="row no-gutters w-100 h-100">
                          <?php
                          if($row["a1"]=="on"){
                              ?>
                              <div class="col-md-5">
                                  <center>
                                      <div id="lift_chart" style="max-width: 150px;">Lift chart</div>
                                  </center>
                              </div>
                          <?php
                          }
                          ?>
                          <div class="col d-flex align-items-center justify-content-center">
                              <div class="row no-gutters">
                                  <?php $class= "col-6"; ?>
                                  <!--alarm-->
                                  <?php
                                  if($row["a3"]=="on"){
                                      ?>
                                      <div id="flagBox" class="<?php echo $class; ?>">
                                          <div class="d-flex align-content-center">
                                              <div class="circle_max_height circle_alert mr-2" id="alarm">
                                              </div>
                                              <p class="d-flex align-items-center justify-content-center font-weight-bold circles_font_size">
                                                  ALARM
                                              </p>
                                          </div>
                                      </div>
                                      <?php
                                  }
                                  ?>
                                  <!--CUTOFF-->
                                  <?php
                                  if($row["a5"]=="on"){
                                      ?>
                                      <div id="flagBox" class="<?php echo $class; ?>">
                                          <div class="d-flex align-content-center">
                                              <div class="circle_max_height circle_alert mr-2" id="cutoff">
                                              </div>
                                              <p class="d-flex align-items-center justify-content-center font-weight-bold circles_font_size">
                                                  CUTOFF
                                              </p>
                                          </div>
                                      </div>
                                      <?php
                                  }
                                  ?>
                                  <!--LIFT ACTIVE-->
                                  <?php
                                  if($row["a7"]=="on"){
                                      ?>
                                      <div id="flagBox" class="<?php echo $class; ?>">
                                          <div class="d-flex align-content-center">
                                              <div class="circle_max_height circle_alert mr-2" id="lift_active">
                                              </div>
                                              <p class="d-flex align-items-center justify-content-center font-weight-bold circles_font_size">
                                                  LIFT ACTIVE
                                              </p>
                                          </div>
                                      </div>
                                      <?php
                                  }
                                  ?>
                                  <!--WATER IN OIL-->
                                  <?php
                                  if($row["a2"]=="on"){
                                      ?>
                                      <div id="flagBox" class="<?php echo $class; ?>">
                                          <div class="d-flex align-content-center">
                                              <div class="circle_max_height circle_alert mr-2" id="water_in_oil">
                                              </div>
                                              <p class="d-flex align-items-center justify-content-center font-weight-bold circles_font_size">
                                                  WATER IN OIL
                                              </p>
                                          </div>
                                      </div>
                                      <?php
                                  }
                                  ?>
                                  <!--LOW OIL-->
                                  <?php
                                  if($row["a4"]=="on"){
                                      ?>
                                      <div id="flagBox" class="<?php echo $class; ?>">
                                          <div class="d-flex align-content-center">
                                              <div class="circle_max_height circle_alert mr-2" id="low_oil">
                                              </div>
                                              <p class="d-flex align-items-center justify-content-center font-weight-bold circles_font_size">
                                                  LOW OIL
                                              </p>
                                          </div>
                                      </div>
                                      <?php
                                  }
                                  ?>
                                  <!--LOSS MOTION--><?php
                                  if($row["a6"]=="on"){
                                      ?>
                                      <div id="flagBox" class="<?php echo $class; ?>">
                                          <div class="d-flex align-content-center">
                                              <div class="circle_max_height circle_alert mr-2" id="loss_motion">
                                              </div>
                                              <p class="d-flex align-items-center justify-content-center font-weight-bold circles_font_size">
                                                  LOSS MOTION
                                              </p>
                                          </div>
                                      </div>
                                      <?php
                                  }
                                  ?>
                                  <!--Temperature--><?php
                                  if($row["a8"]=="on"){
                                      ?>
                                      <div id="flagbox" class="col-12 d-flex flex-column align-items-center justify-content-center">
                                          <p class="mr-3 tempText m-0">Oil Temperature :</p>
                                          <p class="text-danger">
                                              <span id="tempValue" class="tempValueFormAPI">--</span>
                                              <span id="tempValue" class="ml-2">
                                              <?php
                                              if(isset($_SESSION["Celcius"]) && $_SESSION["Celcius"]===true){
                                                  echo "°C";
                                              }else{
                                                  echo "°F";
                                              }
                                              ?>
                                              </span>
                                          </p>
                                          </p>
                                      </div>
                                      <?php
                                  }
                                  ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <?php
          }
          ?>
          <!-- Second Box -->
          <?php
          if($sectionRow["torque_gauge_check"]=="on"){
              $graph_const_height = false;
              $graph_col = $graph_col-3;
              ?>
              <div class="col-md-3">
                  <div class="custom_card w-100 d-block">
                      <div class="col-md-12 d-flex justify-content-center w-100 h-100">
                          <canvas id="gauge-id"></canvas>
                      </div>

                      <script type="text/javascript" src="https://canvas-gauges.com/download/latest/radial/gauge.min.js"></script>
                      <script>
                          <?php
                          $sql = "SELECT * FROM custom_sections WHERE device_id=$device_id";
                          $res = mysqli_query($con, $sql);
                          $row = mysqli_fetch_array($res);
                          $torque_title = $row["torque_title"];

                          $sql = "SELECT * FROM user_and_devices WHERE id=$device_id";
                          $res = mysqli_query($con, $sql);
                          $row = mysqli_fetch_array($res);
                          $rng1 = $row["meter_range_1"];
                          $rng2 = $row["meter_range_2"];
                          $rng3 = $row["meter_range_3"];
                          $clr1 = $row["meter_color_1"];
                          $clr2 = $row["meter_color_2"];
                          $clr3 = $row["meter_color_3"];
                          ?>
                          window.onresize = function(){ location.reload(); }
                          var gauge = new RadialGauge({
                              renderTo: 'gauge-id', // identifier of HTML canvas element or element itself
                              width: 0,
                              height: 0,
                              fontNumbersSize: 15,
                              title: "<?php echo $torque_title; ?>",
                              units: '<?php if(isset($_SESSION["torque-FtLbs"]) && $_SESSION["torque-FtLbs"]===false) echo "Nm"; else echo "FT-LBS" ?>',
                              value: 0,
                              minValue: 0,
                              maxValue: <?php echo $rng3 ?>,
                              majorTicks: [
                                  <?php
                                  $values = explode(",", $row["meter_ranges"]);
                                  foreach($values as $value) {
//                                  echo "'$values', ";
                                      echo $value.',';
                                  }
                                  ?>
                              ],
                              minorTicks: 2,
                              strokeTicks: false,
                              highlights: [
                                  { from: 0, to: <?php echo $rng1 ?>, color: '<?php echo $clr1 ?>' },
                                  { from: <?php echo $rng1 ?>, to: <?php echo $rng2 ?>, color: '<?php echo $clr2 ?>' },
                                  { from: <?php echo $rng2 ?>, to: <?php echo $rng3 ?>, color: '<?php echo $clr3 ?>' }
                              ],
                              colorPlate: '#e5e7ea',
                              colorMajorTicks: '#494949',
                              colorMinorTicks: '494949',
                              colorTitle: '494949',
                              colorUnits: '494949',
                              colorNumbers: '494949',
                              colorNeedleStart: 'rgba(240, 128, 128, 1)',
                              colorNeedleEnd: 'rgba(255, 160, 122, .9)',
                              valueBox: true,
                              animationRule: 'bounce'
                          });
                          // draw initially
                          gauge.draw();
                          // animate
                          // setInterval(() => {
                          //     gauge.value = Math.random() * -30000 + 30000;
                          // }, 1000);

                      </script>
                  </div>
              </div>
          <?php
          }
          ?>
          <!-- Third Box -->
          <?php
          if($sectionRow["graph_check"]=="on"){
              $sql = "SELECT * FROM custom_graph WHERE device_id=$device_id";
              $res = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($res);
          ?>
              <div class="col-<?php echo $graph_col;?>" style="">
                  <script>
                      var chart = new CanvasJS.Chart();
                      window.onload = function () {
                          chart = new CanvasJS.Chart("chartContainer", {
                              animationEnabled: true,
                              backgroundColor: "<?php echo $_SESSION['darkTheme']==0 ? '#dedede' : '#2d353c'; ?>",
                              title:{
                                  text: "<?php echo $sectionRow['graph_title']; ?>",
                                  fontFamily:'Helvetica Neue, Helvetica, Arial, sans-serif',
                                  fontWeight: "bold",
                                  fontColor: "<?php echo $_SESSION['darkTheme']==0 ? 'black' : '#d2d2c9'; ?>",
                                  fontSize: 24
                              },
                              legend:{
                                  cursor: "pointer",
                                  fontSize: 16,
                                  itemclick: toggleDataSeries,
                                  fontColor: "<?php echo $_SESSION['darkTheme']==0 ? 'black' : '#d2d2c9'; ?>"
                              },
                              axisX:{
                                  labelFontColor: "<?php echo $_SESSION['darkTheme']==0 ? 'black' : '#d2d2c9'; ?>",
                                  labelAngle: -90/90,
                                  labelMaxWidth: 80
                              },
                              axisY: {
                                  labelFontColor: "<?php echo $_SESSION['darkTheme']==0 ? 'black' : '#d2d2c9'; ?>",
                                  title: "<?php echo $row['y_unit']; ?>",
                                  stripLines:[
                                      {
                                          <?php
                                          if(isset($row["line1_value"]) && $row["line1_value"]!=""){
                                          ?>
                                              // color:"#ffff00",
                                              value: <?php echo $row["line1_value"]; ?>,
                                              label: "<?php echo $row["line1"]; ?>"
                                          <?php
                                          }
                                          ?>
                                      },
                                      {
                                          <?php
                                          if(isset($row["line2_value"]) && $row["line2_value"]!=""){
                                          ?>
                                             // color:"#ffff00",
                                              value: <?php echo $row["line2_value"]; ?>,
                                              label: "<?php echo $row["line2"]; ?>"
                                          <?php
                                          }
                                          ?>
                                      }
                                  ]
                              },
                              toolTip:{
                                  shared: true
                              },
                              data: [
                                  {
                                      name: "<?php echo $row['line_name']; ?>",
                                      type: "spline",
                                      color: "<?php echo $row['line_color']; ?>",
                                      showInLegend: true,
                                      dataPoints: [{}]
                                  }
                                  ,{  visible: false,
                                              name: "Alarm",
                                              type: "spline",
                                              showInLegend: <?php if($row["legends1"] && $row["show_legends"]){ echo "true"; }else{echo "false"; } ?>,
                                              dataPoints: [{}]
                                          }
                                    ,{  visible: false,
                                              name: "CutOff",
                                              type: "spline",
                                              showInLegend: <?php if($row["legends2"] && $row["show_legends"]){ echo "true"; }else{echo "false"; } ?>,
                                              dataPoints: [{}]
                                          }
                                    ,{  visible: false,
                                              name: "Lift Lower",
                                              type: "spline",
                                              showInLegend: <?php if($row["legends3"] && $row["show_legends"]){ echo "true"; }else{echo "false"; } ?>,
                                              dataPoints: [{}]
                                          }
                                    ,{  visible: false,
                                              name: "Lift Raise",
                                              type: "spline",
                                              showInLegend: <?php if($row["legends4"] && $row["show_legends"]){ echo "true"; }else{echo "false"; } ?>,
                                              dataPoints: [{}]
                                          }
                                    ,{  visible: false,
                                              name: "Loss Motion",
                                              type: "spline",
                                              showInLegend: <?php if($row["legends5"] && $row["show_legends"]){ echo "true"; }else{echo "false"; } ?>,
                                              dataPoints: [{}]
                                          }
                              ]
                          });
                          chart.render();

                      }

                      function toggleDataSeries(e){
                          if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                              e.dataSeries.visible = false;
                          }
                          else{
                              e.dataSeries.visible = true;
                          }
                      }
                  </script>
                  <div style="width: 100%;height: 95%">
                      <div class="line_chart_margin_top" id="chartContainer" style="height: 100%; margin-top: 1%;width: 100%;box-shadow: 0px 0px 20px 0px #8d9aa7;"></div>
                  </div>
              </div>
          <?php
          }
          if($showFirstRow){
              ?>

      </div>
      <div class="row h-45 d-flex justify-content-center">
          <?php
          }
          ?>
      <!-- SECOND LINE  -->
          <!-- 4th box -->
          <?php
          $sql = "SELECT * FROM custom_installation_info WHERE device_id=$device_id";
          $res = mysqli_query($con, $sql);
          $row1 = mysqli_fetch_array($res);
          if($sectionRow["installation_info_check"]=="on"){
              ?>
              <div class="col-md-4 h-45 second_row_class <?php if($graph_const_height) echo " mt-50_per_for_graphmt-50_per_for_graph";?>">
                  <div class="custom_card w-100 d-flex flex-column bar_font_size">
                      <p class="text-center font-weight-bolder font-size-larger m-0">INSTALLATION INFORMATION</p>
                      <?php
                      $sql = "SELECT * FROM user_and_devices WHERE id=$device_id";
                      $res = mysqli_query($con, $sql);
                      $row = mysqli_fetch_array($res);
                      $mac = $row["mac"];
                      $sql = "SELECT * FROM installation_info WHERE mac='$mac'";
                      $res = mysqli_query($con, $sql);
                      $installationInfo = mysqli_fetch_array($res);
                      if(mysqli_num_rows($res)){
                      ?>
                      <table class="text-dark-grey bar_font_size auto_color_txt">
                          <?php
                          if($row1["drive_model_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["drive_model_title"] ?> :</td>
                                  <td><?php echo $installationInfo["driver_model"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["drive_rating_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["drive_rating_title"] ?> :</td>
                                  <td><?php echo $installationInfo["driver_rating"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["drive_speed_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["drive_speed_title"] ?> :</td>
                                  <td><?php echo $installationInfo["speed"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["drive_motor_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["drive_motor_title"] ?> :</td>
                                  <td><?php echo $installationInfo["electric_rate"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["drive_lift_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["drive_lift_title"] ?> :</td>
                                  <td><?php echo $installationInfo["electric_lift"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["driver_sn_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["driver_sn_title"] ?> :</td>
                                  <td><?php echo $installationInfo["driver_sn"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["driver_user_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["driver_user_title"] ?> :</td>
                                  <td><?php echo $installationInfo["end_user"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["driver_installation_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["driver_installation_title"] ?> :</td>
                                  <td><?php echo $installationInfo["installation"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["driver_process_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["driver_process_title"] ?> :</td>
                                  <td><?php echo $installationInfo["process"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["driver_size_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["driver_size_title"] ?> :</td>
                                  <td><?php echo $installationInfo["basin_size"]; ?></td>
                              </tr>
                              <?php }
                          if($row1["drive_service_check"]=="on"){
                              ?>
                              <tr>
                                  <td class="font-weight-bold"><?php echo $row1["drive_service_title"] ?> :</td>
                                  <td><?php echo $installationInfo["service_since"]; ?></td>
                                  <?php
                                  if($_SESSION['is_admin']){
                                      ?>
                                      <td>
                                          <button class="btn btn-info" data-toggle="modal" data-target="#addNewDevice">Edit</button>
                                      </td>
                                      <?php
                                  }
                                  ?>
                              </tr>
                              <?php }
                          ?>
                      </table>
                      <?php } ?>
                  </div>
              </div>
              <?php
          }
          ?>
          <!-- 5th box --><?php
          if($sectionRow["alerts_check"]=="on"){
              $sql = "SELECT * FROM custom_alerts WHERE device_id=$device_id";
              $res = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($res);
              ?>
              <div class="col-md-4 alert_details_margin_top h-45 second_row_class <?php if($graph_const_height) echo " mt-50_per_for_graphmt-50_per_for_graph";?>">
                  <div class="custom_card w-100 d-flex flex-column bar_font_size">
                      <p class="text-center font-weight-bolder font-size-larger m-0">ALERTS</p>
                      <table class="text-dark-grey auto_color_txt">
                          <?php
                          if($row["today_check"]=="on"){
                              ?>
                              <tr><td><i><?php echo $row["today_title"]; ?> :</i></td></tr>
                              <tr class="alert_info_bg_red">
                                  <td class="font-weight-bold">Oil Change Overdue (48 Days)</td>
                                  <td class="text-left">Main Gear</td>
                              </tr>
                              <?php
                          }
                          ?>
                          <?php
                          if($row["last_7_check"]=="on"){
                              ?>
                              <tr><td><i><?php echo $row["last_7_title"]; ?> :</i></td></tr>
                              <?php
                          }
                          ?>
                          <?php
                          if($row["last_mnth_check"]=="on"){
                              ?>
                              <tr><td><i><?php echo $row["last_mnth_title"]; ?> :</i></td></tr>
                              <tr>
                                  <td class="font-weight-bold">10/26/20, 09:26:</td>
                                  <td class="text-left">Lift Operation (Lower)</td>
                              </tr>
                              <?php
                          }
                          ?>
                          <?php
                          if($row["last_6mnth_check"]=="on"){
                              ?>
                              <tr><td><i><?php echo $row["last_6mnth_title"]; ?> :</i></td></tr>
                              <tr>
                                  <td class="font-weight-bold">08/26/20, 16:20:</td>
                                  <td class="text-left">Alarm</td>
                              </tr>
                              <?php
                          }
                          ?>
                          <!--                    <tr><td>&nbsp;</td></tr>-->
                          <!--                    <tr><td>&nbsp;</td></tr>-->
                      </table>
                  </div>
              </div>
              <?php
          }
          ?>
          <!-- 6th box --><?php
          if($sectionRow["maintenance_check"]=="on"){
              $sql = "SELECT * FROM custom_maintenance WHERE device_id=$device_id";
              $res = mysqli_query($con, $sql);
              $row1 = mysqli_fetch_array($res);
//              print_r($row1);
              ?>
              <div class="col-md-4 maintenance_record_margin_top h-45 second_row_class <?php if($graph_const_height) echo " mt-50_per_for_graphmt-50_per_for_graph";?>">
                  <div class="custom_card w-100 d-flex flex-column bar_font_size">
                      <?php
                      $sql = "SELECT * FROM maintenance_record ORDER BY id DESC LIMIT 1";
                      $res = mysqli_query($con, $sql);
                      $row = mysqli_fetch_array($res);
                      $format = 'd-M-Y';
                      $last_oil_main_gear = date ($format, strtotime($row["last_oil_change_main_gear"]));
                      $last_oil_pdu = date ($format, strtotime($row["last_oil_pdu"]));
                      $nxt_oil_lift_pdu = date ($format, strtotime($row["next_oil_change_lift_pu"]));
                      $nxt_sch_service = date ($format, strtotime($row["next_schedule_service"]));
                      $last_repair = $row["last_repair"];
                      $parts_repaired = $row["parts_prepaired"];
                      ?>
                      <p class="text-center font-weight-bolder font-size-larger m-0">MAINTENANCE RECORD</p>
                      <table class="text-dark-grey auto_color_txt">
                          <?php
                          if($row1["last_oil_change_main_check"]=="on"){
                              ?>
                              <tr class="alert_info_bg_red">
                                  <td class="font-weight-bold"><?php echo $row1["last_oil_change_main_title"]; ?> :</td>
                                  <td class="text-left"><?php echo $last_oil_main_gear; ?></td>
                              </tr>
                              <?php
                          }
                          if($row1["next_oil_change_main_check"]=="on"){
                              ?>
                              <tr class="">
                                  <td class="font-weight-bold"><?php echo $row1["next_oil_change_main_title"]; ?> :</td>
                                  <td class="text-left">TBD</td>
                              </tr>
                              <?php
                          }
                          if($row1["last_oil_lift_check"]=="on"){
                              ?>
                              <tr class="">
                                  <td class="font-weight-bold"><?php echo $row1["last_oil_lift_title"]; ?> :</td>
                                  <td class="text-left"><?php echo $last_oil_pdu; ?></td>
                              </tr>
                              <?php
                          }
                          if($row1["next_oil_lift_check"]=="on"){
                              ?>
                              <tr class="">
                                  <td class="font-weight-bold"><?php echo $row1["next_oil_lift_title"]; ?> :</td>
                                  <td class="text-left"><?php echo $nxt_oil_lift_pdu; ?></td>
                              </tr>
                              <?php
                          }
                          if($row1["next_service_check"]=="on"){
                              ?>
                              <tr class="">
                                  <td class="font-weight-bold"><?php echo $row1["next_service_title"]; ?> :</td>
                                  <td class="text-left"><?php echo $nxt_sch_service; ?></td>
                              </tr>
                              <?php
                          }
                          if($row1["dbs_warranty_check"]=="on"){
                              ?>
                              <tr class="">
                                  <td class="font-weight-bold"><?php echo $row1["dbs_warranty_title"]; ?> :</td>
                                  <td class="text-left">Exp 12/03/2020</td>
                              </tr>
                              <?php
                          }
                          if($row1["last_repair_check"]=="on"){
                              ?>
                              <tr class="">
                                  <td class="font-weight-bold"><?php echo $row1["last_repair_title"]; ?> :</td>
                                  <td class="text-left"><?php echo $last_repair; ?></td>
                              </tr>
                              <?php
                          }
                          if($row1["parts_repaired_check"]=="on"){
                              ?>
                              <tr class="">
                                  <td class="font-weight-bold"><?php echo $row1["parts_repaired_title"]; ?> :</td>
                                  <td class="text-left"><?php echo $parts_repaired; ?></td>
                              </tr>
                              <?php
                          }
                          ?>
                      </table>
                      <div class="mt-2 d-flex justify-content-end">
                          <button class="btn text-white font-weight-bold border-0" style="background-color: #009cde"
                                  data-toggle="modal" data-target="#addRecord">Edit</button>
                          <button class="btn text-white font-weight-bold border-0 mx-3" style="background-color: #009cde"
                                  data-toggle="modal" data-target="#previousRecord">History</button>
                      </div>
                      <!--                  <div class="mt-2 d-flex justify-content-around">-->
                      <!--                      <div class="btn btn-success" data-toggle="modal" data-target="#addRecord">Edit Maintenance</div>-->
                      <!--                      <div class="btn btn-primary" data-toggle="modal" data-target="#previousRecord">Maintenance History</div>-->
                      <!--                  </div>-->
                  </div>
              </div>
              <?php
          }

          if($showFirstRow){
              ?>
      </div>
              <?php
          }
          ?>
  </section>

  <!-- Add Record -->
  <div class="modal" id="addRecord">
      <div class="modal-dialog">
          <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                  <form action="" method="post">
                  <h4 class="modal-title text-dark">Add Maintenance Record</h4>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                      <div class="form-group">
                          <label for="email" class="text-dark">Last Oil Change (Lift PDU)</label>
                          <input type="date" class="form-control" name="last_oil_pdf">
                      </div>
                      <div class="form-group">
                          <label for="email" class="text-dark">Last Oil Change (main gear)</label>
                          <input type="date" class="form-control" name="last_oil_main_gear">
                      </div>
                      <div class="form-group" class="text-dark">
                          <label for="pwd">Next Oil Change (Lift PU)</label>
                          <input type="date" class="form-control" name="nxt_oil_lift_pdu">
                      </div>
                      <div class="form-group" class="text-dark">
                          <label for="pwd">Next Schedule Service</label>
                          <input type="date" class="form-control" name="nxt_sch_service">
                      </div>
                      <div class="form-group" class="text-dark">
                          <label for="pwd">Last Repair (INC #)</label>
                          <input type="text" class="form-control" value="N/A" name="last_repair">
                      </div>
                      <div class="form-group" class="text-dark">
                          <label for="pwd">Parts Repaired</label>
                          <input type="text" class="form-control" value="N/A" name="parts_prepaired">
                      </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success" name="add_record">Add</button>
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                  </form>
              </div>

          </div>
      </div>
  </div>
  <?php
  if(isset($_POST["add_record"])){
      require 'app/db.php';
      $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      $last_oil_pdu = $_POST["last_oil_pdf"];
      $nxt_oil_lift_pdu = $_POST["nxt_oil_lift_pdu"];
      $nxt_sch_service = $_POST["nxt_sch_service"];
      $last_repair = $_POST["last_repair"];
      $last_oil_main_gear = $_POST["last_oil_main_gear"];
      $parts_prepaired = $_POST["parts_prepaired"];
//      $sql = "INSERT INTO maintenance_record('next_oil_change_main_gear', 'next_oil_change_lift_pu', 'next_schedule_service', 'last_repair', 'last_oil_change_main_gear', 'parts_prepaired')
//            VALUES ('$nxt_oil_main_gear', '$nxt_oil_lift_pdu', '$nxt_sch_service', '$last_repair', '$last_oil_main_gear', '$parts_prepaired')";
      $sql = "INSERT INTO `maintenance_record`(`last_oil_pdu`, `next_oil_change_lift_pu`, `next_schedule_service`, `last_repair`, `last_oil_change_main_gear`, `parts_prepaired`) VALUES ('$last_oil_pdu', '$nxt_oil_lift_pdu', '$nxt_sch_service', '$last_repair', '$last_oil_main_gear', '$parts_prepaired')";
      if(mysqli_query($con, $sql)){
        header('Location: '.$actual_link);
        echo '<script>window.location.replace("'.$actual_link.'")</script>';
      }else{
          echo $sql;
          echo mysqli_error($con);
      }
  }
  ?>
  <!-- Previous Record -->
  <div class="modal" id="previousRecord">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title text-dark">Previous Record</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                  <table class="table table-striped">
                      <thead>
                      <tr>
                          <th>Last Oil Change(Main Gear)</th>
                          <th>Last Oil Change (lift PU)</th>
                          <th>Next Oil Change (lift PU)</th>
                          <th>Next Schedule Service</th>
                          <th>Last Repair(INC #)</th>
                          <th>Parts Repaired</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $sql = "SELECT * FROM maintenance_record ORDER BY id DESC LIMIT 10";
                      $res = mysqli_query($con, $sql);
                      while ($row = mysqli_fetch_array($res)){
                          ?>
                          <tr>
                              <td class="text-center"><?php echo $row["last_oil_change_main_gear"]; ?></td>
                              <td class="text-center"><?php echo $row["last_oil_pdu"]; ?></td>
                              <td class="text-center"><?php echo $row["next_oil_change_lift_pu"]; ?></td>
                              <td class="text-center"><?php echo $row["next_schedule_service"]; ?></td>
                              <td class="text-center"><?php echo $row["last_repair"]; ?></td>
                              <td class="text-center"><?php echo $row["parts_prepaired"]; ?></td>
                          </tr>
                      <?php
                      }
                      ?>
                      </tbody>
                  </table>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

          </div>
      </div>
  </div>



  <!-- Add device modal -->
  <div class="modal fade" id="addNewDevice" tabindex="-1" role="dialog" aria-labelledby="addNewDevice" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header border-bottom-0">
                  <h5 class="modal-title text-dark" id="exampleModalLabel">Installation Information</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                  <input name="driver_model" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['driver_model']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="driver_rating" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['driver_rating']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="output_speed" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['speed']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="electric_rake" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['electric_rate']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="electric_lift" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['electric_lift']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="driver_sn" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['driver_sn']; ?>">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <input name="end_user" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['end_user']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="Installation" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['installation']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="Process" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['process']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="size" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['basin_size']; ?>">
                              </div>
                              <div class="form-group">
                                  <input name="inService" type="text" class="form-control" id="email1" value="<?php echo $installationInfo['service_since']; ?>">
                              </div></div>
                      </div>
                  </div>
                  <div class="modal-footer border-top-0 d-flex justify-content-center">
                      <button type="submit" name="update_installation" class="btn btn-success w-100">Update</button>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <?php
  if(isset($_POST['update_installation'])){
      $driver_model = $_POST["driver_model"];
      $driver_rating = $_POST["driver_rating"];
      $output_speed = $_POST["output_speed"];
      $electric_rake = $_POST["electric_rake"];
      $electric_lift = $_POST["electric_lift"];
      $driver_sn = $_POST["driver_sn"];
      $end_user = $_POST["end_user"];
      $Installation = $_POST["Installation"];
      $Process = $_POST["Process"];
      $size = $_POST["size"];
      $inService = $_POST["inService"];


      $sql = "SELECT * FROM user_and_devices WHERE id=$device_id";
      $res = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($res);
      $mac = $row["mac"];

      $installation = "UPDATE `installation_info` SET `driver_model`='$driver_model',
                             `driver_rating`='$driver_rating',`speed`='$output_speed',`electric_rate`='$electric_rake',
                             `electric_lift`='$electric_lift',`driver_sn`='$driver_sn',`end_user`='$end_user',
                             `installation`='$Installation',`process`='$Process',`basin_size`='$size',
                             `service_since`='$inService' WHERE mac = '$mac'";

      if(mysqli_query($con, $installation)){
          $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          js_redirect($actual_link);
      }else{
          echo '<script>alert('.mysqli_error($con).');</script>';
      }
  }
  ?>

  <!-- Bootstrap core JavaScript -->

<script src="assets/custom_js/main.js?v=<?php echo rand(); ?>"></script>
<?php require 'app/footer.include.php'; ?>



</body>

</html>
<script>
    function update() {
        // console.log("update function here");
        setInterval(function() {
            $.getJSON("ajax/getDetails.php", {device_id: "<?php echo $_SESSION['device_details_id']; ?>"}, function(data) {
                console.log(data);
                updateFields(
                    data[0][0][0],
                    data[0][0][1],
                    data[0][0][2],
                    data[0][0][3],
                    data[0][0][4],
                    data[0][0][5],
                    data[0][0][6],
                    data[0][0][7]
                );
                updateGraph(data['graph']);

                // torqueChart.updateSeries(updateCircleChart(parseInt(data['torque'])));
                console.log('gauge Value: ' + parseInt(data['torque']));
                gauge.value = parseInt(data['torque']);
                setGaugeHeight();

            });
        }, 1500);
    }

    function setGaugeHeight(){
        var height = 0;
        var width = 0;
        var w = window.innerWidth;
        var h = window.innerHeight;
        console.log('CURRENT: '+w+'  '+h);
        if(h<=1235 && w<=2600) {console.log('800 800'); height = 800; width = 800;}
        // if(h<=1235) {console.log('540 540'); height = 540; width = 540;}
        if(h<=940 && w<=1930) {console.log('600 600'); height = 600; width = 600;}
        if(h<=760) {console.log('440 440'); height = 440; width = 440;}
        if(h<=760 && w<=1710) {console.log('400 400'); height = 400; width = 400;}
        if(h<=875 && w<=1480) {console.log('300 300'); height = 300; width = 300;}
        if(w<=1490) {console.log('400 400'); height = 400; width = 400;}
        gauge.width = width;
        gauge.height = height;
    }


    function updateCircleChart(newData) {
        // newVal = parseInt(newVal)
        console.log('Testing Val: ' + newData);
        var data = [];
        var arr = torqueChart.w.globals.series.slice()
        document.getElementById("torque_value").innerText = newData
        console.log('original Val: ' + newData)
        // console.log('Testing Val: ' + newData)
        newData = (newData * 100) / 30000
        arr.push(newData)
        data.push(arr[arr.length - 1]);
        console.log('Data: ' , data)
        console.log("===============\n")
        return data;
    }

    function updateGraph(graphData){
        console.log(graphData);
        chart.options.data[0].dataPoints = [];
        chart.options.data[1].dataPoints = [];
        chart.options.data[2].dataPoints = [];
        chart.options.data[3].dataPoints = [];
        chart.options.data[4].dataPoints = [];
        chart.options.data[5].dataPoints = [];
        // chart.options.data[1].dataPoints = [];
        $.each((graphData), function(key, value){
            chart.options.data[0].dataPoints.push(
                {
                    label: value.timeStamp,
                    y: parseInt(value.torque)
                }
            );
            chart.options.data[1].dataPoints.push(
                {
                    label: value.timeStamp,
                    y: parseInt(value.alarm)
                }
            );
            chart.options.data[2].dataPoints.push(
                {
                    label: value.timeStamp,
                    y: parseInt(value.cutoff)
                }
            );
            chart.options.data[3].dataPoints.push(
                {
                    label: value.timeStamp,
                    y: parseInt(value.liftLower)
                }
            );
            chart.options.data[4].dataPoints.push(
                {
                    label: value.timeStamp,
                    y: parseInt(value.liftActive)
                }
            );
            chart.options.data[5].dataPoints.push(
                {
                    label: value.timeStamp,
                    y: parseInt(value.lossMotion)
                }
            );
        });
        // console.log(graphData.timeStamp)
        chart.render();
    }
    update();
</script>

<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
<script type="text/javascript">
<?php
$sql = "SELECT * FROM custom_vertical_bar WHERE  device_id = $device_id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);
?>

    FusionCharts.ready(function() {
        var CSIGauge = new FusionCharts({
            type: 'vled',
            renderAt: 'lift_chart',
            id: 'cpu-linear-gauge-1',
            width: '100%',
            height: '100%',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "bgColor": "#dddee0",
                    "theme": "fusion",
                    "caption": "<?php echo $row["name"]; ?>",
                    "captionFontColor": "#000000",
                    "lowerLimit": "0",
                    "upperLimit": "<?php echo $row["maxRange"]; ?>",
                    "lowerLimitDisplay": "0",
                    "upperLimitDisplay": "<?php echo $row["maxRange"].$row["unit"]; ?>",
                    "numberSuffix": "<?php echo $row["unit"]; ?>",
                    "valueFontSize": "12",
                    "showhovereffect": "1",
                    "origW": "400",
                    "origH": "150",
                    "ledSize": "3",
                    "ledGap": "2",
                    "manageResize": "1",
                    "theme": "fusion"
                },
                //All annotations are grouped under this element
                "annotations": {
                    "showbelow": "1",
                    "groups": [{
                        //Each group needs a unique ID
                        "id": "indicator",
                        "items": [
                            {
                                "id": "bgRectAngle",
                                //Polygon item
                                "type": "rectangle",
                                "alpha": "90",
                                "radius": "1",
                                "fillColor": "#dddee0",
                                "x": "$gaugeCenterX - 20",
                                "tox": "$gaugeCenterX + 20",
                                "y": "$gaugeEndY + 25",
                                "toy": "$gaugeEndY + 55"
                            }
                        ]
                    }]

                },
                "colorRange": {
                    "color": [{
                        "minValue": "0",
                        "maxValue": "45",
                        "code": "#62B58F"
                    },
                        {
                            "minValue": "45",
                            "maxValue": "75",
                            "code": "#f8bd19"
                        },
                        {
                            "minValue": "75",
                            "maxValue": "100",
                            "code": "#F2726F"
                        }
                    ]
                },
                "value": "92"
            },
            "events": {
                "rendered": function(evtObj, argObj) {
                    evtObj.sender.intervalVar = setInterval(function() {
                        // var prcnt = parseInt(Math.floor(Math.random() * 101));
                        // FusionCharts.items["cpu-linear-gauge-1"].feedData("value=" + prcnt);
                        //Real TIme value
                        $.getJSON("ajax/getLiftValue.php", {id: "<?php echo $device_id; ?>"}, function(data) {
                            console.log("Bar live data: "+data);
                            FusionCharts.items["cpu-linear-gauge-1"].feedData("value=" + data[0]);
                        });
                    }, 5000);
                },
                "disposed": function(evtObj, argObj) {
                    clearInterval(evtObj.sender.intervalVar);
                }
            }
        })
            .render();
    });



</script>