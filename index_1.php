<?php
    session_start();
    $_SESSION['currentPath'] = "./";
    require 'app/main.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<body>
  <!-- Navigation -->
  <?php require 'app/navigation.include.php'; ?>

  <!-- Page Content -->
  <section style="height: 90vh;">
      <div class="row h-45">
          <!-- First Box -->
          <div class="col-md-6">
              <div class="custom_card w-100">
                  <div class="row">
                      <div class="col-md-8 mt-3">
                          <div class="row no-gutters">
                              <div class="col-4 col-sm-4 col-md-6 col-lg-6 col-xl-4">
                                  <div class="circle_alert" id="alarm">
                                      <p id="fix_topp">ALARM</p>
                                  </div>
                              </div>
                              <div class="col-4 col-sm-4 col-md-6 col-lg-6 col-xl-4">
                                  <div class="circle_alert" id="cutoff">
                                      <p id="fix_topp">CUTOFF</p>
                                  </div>
                              </div>
                              <div class="col-4 col-sm-4 col-md-6 mt-md-4 col-lg-6 col-xl-4 mt-lg-0 mt-xl-0 responsive-circle-margin-top">
                                  <div class="circle_alert" id="lift_active">
                                      <p>LIFT ACTIVE</p>
                                  </div>
                              </div>
                              <div class="col-4 col-sm-4 col-md-6 col-lg-6 col-xl-4 mt-4">
                                  <div class="circle_alert" id="water_in_oil">
                                      <p>WATER IN OIL</p>
                                  </div>
                              </div>
                              <div class="col-4 col-sm-4 col-md-6 col-lg-6 col-xl-4 mt-4">
                                  <div class="circle_alert" id="low_oil">
                                      <p id="fix_topp">LOW OIL</p>
                                  </div>
                              </div>
                              <div class="col-4 col-sm-4 col-md-6 col-lg-6 col-xl-4 mt-4">
                                  <div class="circle_alert" id="loss_motion">
                                      <p>LOSS MOTION</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-12 text-center col-md-12 col-xl-4 my-3" style="margin-left: -35px;">
                          <!--vertical Guages-->
                          <div class="row no-gutters">
                              <div class="col-6">
                                  <div class="outer-wrapper">
                                      <div class="column-wrapper">
                                          <div class="column" id="vertical_bg_color_1"></div>
                                      </div>
                                      <div class="percentage vertical_bar_1" id="vertical_bar_1">--</div>
                                      <div class="value" style="margin-left: -20px;">Left Position</div>
                                  </div>
                              </div>
                              <div class="col-6">
                                  <div class="outer-wrapper">
                                      <div class="column-wrapper">
                                          <div class="column" id="vertical_bg_color_2"></div>
                                      </div>
                                      <div class="percentage" id="vertical_bar_2">--</div>
                                      <div class="value">Oil Temperature</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Second Box -->
          <div class="col-md-3">
              <div class="custom_card w-100">
                  <!-- Cicle Guage -->
                  <script type="text/javascript" src="assets/circle_gauge/apexcharts.js"></script>
                  <!--                    <script type="text/javascript" src="assets/circle_gauge/apexcharts_custom.js"></script>-->
                  <div id="chart1" style="width: 300px; margin: 0 auto;">
                  </div>
                  <script>
                      var options1 = {
                          chart: {
                              height: 280,
                              type: "radialBar",
                          },
                          series: [67, 84, 97, 61],
                          plotOptions: {
                              radialBar: {
                                  dataLabels: {
                                      value: {
                                          color: "#fff",
                                          fontSize: "17px",
                                          show: true
                                      },
                                      total: {
                                          color: "#fff",
                                          show: true,
                                          label: 'TOTAL'
                                      }
                                  }
                              }
                          },
                          labels: ['CUT OFF', 'ALARM', 'WATER', 'OIL']
                      };
                      // console.log(options1);
                      var circular_chart = new ApexCharts(document.querySelector("#chart1"), options1);
                      circular_chart.render();
                  </script>
              </div>
          </div>
          <!-- Third Box -->
          <div class="col-md-3">
              <div class="custom_card w-100">
                  <table>
                      <th><u>Installation Info: </u></th>
                      <tr>
                          <td class="font-weight-bold">Driver Model:</td>
                          <td>S25-AE-l52F</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Driver Continuous Rating:</td>
                          <td>14,000 ft-lbs</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Output Speed:</td>
                          <td>0.06</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Electric Motor Rake:</td>
                          <td>1 HP</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Electric Motor Lift:</td>
                          <td>1 HP</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Driver SN:</td>
                          <td>123G768</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">End User:</td>
                          <td>Paper Mill of south</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Installation:</td>
                          <td>Rome, GA, USA</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Process:</td>
                          <td>Mud Thickening</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Basin Size(diameter):</td>
                          <td>30ft</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">In Service Since:</td>
                          <td>12/03/2003</td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>
      <br>
      <!-- SECOND LINE  -->
      <div class="row h-45">
          <!-- 4th box -->
          <div class="col-md-6">
              <script src="assets/line_chart/canvasjs.min.js"></script>
              <script> var chart = new CanvasJS.Chart(); </script>
              <script src="assets/line_chart/chart_settings.js?v=<?php echo rand(); ?>"></script>
              <div class="line_chart_margin_top" id="chartContainer" style="height: 97%; margin-top: 1%;"></div>
          </div>
          <!-- 5th box -->
          <div class="col-md-3 alert_details_margin_top">
              <div class="custom_card w-100">
                  <table>
                      <th><u>Alerts: </u></th>
                      <tr><td><i>Today:</i></td></tr>
                      <tr class="alert_info_bg_red">
                          <td class="font-weight-bold">Oil Change Overdue (48 Days)</td>
                          <td class="text-center">Main Gear</td>
                      </tr>
                      <!--                    <tr><td>&nbsp;</td></tr>-->
                      <tr><td><i>Last 7 days:</i></td></tr>
                      <!--                    <tr><td>&nbsp;</td></tr>-->
                      <tr><td><i>Last Month:</i></td></tr>
                      <tr>
                          <td class="font-weight-bold">10/26/20, 09:26:</td>
                          <td class="text-center">Lift Operation (Lower)</td>
                      </tr>
                      <!--                    <tr><td>&nbsp;</td></tr>-->
                      <tr><td><i>Last 6 Months:</i></td></tr>
                      <tr>
                          <td class="font-weight-bold">08/26/20, 16:20:</td>
                          <td class="text-center">Alarm</td>
                      </tr>
                  </table>
              </div>
          </div>
          <!-- 6th box -->
          <div class="col-md-3 maintenance_record_margin_top">
              <div class="custom_card w-100">
                  <table>
                      <th><u>Maintenance Record: </u></th>
                      <tr class="alert_info_bg_red">
                          <td class="font-weight-bold">Last Oil Change (main gear)</td>
                          <td class="text-center">10/06/2020</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Next Oil Change (main gear)</td>
                          <td class="text-center">TBD</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Last Oil Change (lift PU)</td>
                          <td class="text-center">10/06/2020</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Next Oil Change (lift PU)</td>
                          <td class="text-center">04/06/2020</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Next Schedule Service</td>
                          <td class="text-center">04/06/2020</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">DBS Warrenty</td>
                          <td class="text-center">Exp 12/03/2020</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Last Repair(INC #)</td>
                          <td class="text-center">N/A</td>
                      </tr>
                      <tr>
                          <td class="font-weight-bold">Parts Repaired</td>
                          <td class="text-center">N/A</td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>
  </section>

  <!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>


</body>

</html>
