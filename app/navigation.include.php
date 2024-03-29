<?php
if (isset($_SESSION["darkTheme"]) && $_SESSION["darkTheme"] == 1){
    $navClass = "bg-dark";
    $txtColor = "text-light";
    $themeLinkText = "Light Theme";
    $themeLinkText = "Light Theme";
    $navLogo = "dark.jpg";
}else{
    $navClass = "bg-light shadow";
    $txtColor = "text-dark";
    $themeLinkText = "Dark Theme";
    $themeLinkText = "Dark Theme";
    $navLogo = "dbs.png";
}

$sql = "SELECT * FROM devices WHERE id=$device_id";
$res = mysqli_query($con, $sql);
$row = $device_row = mysqli_fetch_array($res);
$file = $row["manual"];
?>
<div class="py-3 <?php echo $navClass; ?> font-roboto">
    <div class="containerr">
        <div class="row">
            <div class="col d-flex justify-content-left ml-4">
                <img style="height: 40px;" src="assets/logo/<?php echo $device_row["primary_logo"]; ?>">
                <ul class="navbar-nav" style="flex-direction: row;">
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="admin_dashboard.php">Homepage</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="app/changeTheme.php"><?php echo $themeLinkText; ?></a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?> btn" href="user_settings.php?id=<?php echo $_SESSION['id']; ?>">
                            Account Information
                        </a>
                    </li>
<!--                    <li class="nav-item ml-3">-->
<!--                        <a class="nav-link navbar-link-color --><?php //echo $txtColor; ?><!-- btn"-->
<!--                           type="button" data-toggle="modal" data-target="#dashboard_settings_modal">-->
<!--                            Dashboard Settings-->
<!--                        </a>-->
<!--                    </li>-->
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="app/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col d-flex justify-content-end top_btn_margin">
                <button class="btn text-white font-weight-bold border-0" type="button" data-toggle="modal" data-target="#history"
                        style="background-color: #009cde; padding-top: 8px; height: fit-content;">
                    Data History
                </button> &nbsp;&nbsp;
                <button class="btn text-white font-weight-bold border-0" type="button" data-toggle="modal" data-target="#runReport"
                   style="background-color: #009cde; padding-top: 8px; height: fit-content;">
                    Download Report
                </button> &nbsp;&nbsp;
                <a class="btn text-white font-weight-bold border-0" href="<?php if($file) echo 'assets/manuals/'.$file; ?>"
                   style="background-color: #009cde; padding-top: 8px; height: fit-content;">
                    Download Manual
                </a>&nbsp;&nbsp;
                <?php
                if(!empty($device_row["secondary_logo"]) and $device_row["use_secondary_logo"]=="on"){
                    ?>
                    <img style="height: 40px;" src="assets/logo/<?php echo $device_row["secondary_logo"]; ?>">
                        <?php
                }
                ?>
                <?php
                    if(isset($device_details_page) && $device_details_page){
                ?>
                <?php
                    }
                if($_SESSION['is_admin']){
                    ?>
<!--                    <button class="btn btn-info" data-toggle="modal" data-target="#addNewDevice">Installation Info</button>-->
               <?php
                }

                    ?>
            </div>
<!--            <div class="col-md-2 d-flex justify-content-center">-->
<!--                <img style="height: 40px;" src="assets/imgs/client.png">-->
<!--            </div>-->
        </div>
    </div>
</div>

    <!-- Run Report Modal -->
    <div class="modal" id="runReport">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="report.php" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title darkColorInDarkTheme">Create Report</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" name="deviceID" value="<?php echo $_GET["id"]; ?>">
                        <div class="form-group col-md-6">
                            <label class="darkColorInDarkTheme">From Date</label>
                            <input type="date" name="startDate" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="darkColorInDarkTheme">To</label>
                            <input type="date" name="endDate" class="form-control">
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="1" checked>Installation Information
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="2" checked>Maintenance History
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="3" checked>Alerts
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="4" checked>Torque & Temperature History
                        </label>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="run">Run Report</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <!-- History Chart -->
    <div class="modal" id="history">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title darkColorInDarkTheme">Data History</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-5">
                            <label class="darkColorInDarkTheme">From Date</label>
                            <input type="date" id="startDate" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                            <label class="darkColorInDarkTheme">To</label>
                            <input type="date" id="endDate" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" class="btn btn-primary" id="SrchBtn">
                                <span id="btn2">
                                    <i class="fas fa-search"></i> Search
                                </span>
                                <span id="btn1">
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div id="searchChart"></div>
                </div>
                <script>


                        var searchChart = new CanvasJS.Chart("searchChart", {
                            animationEnabled: true,
                            backgroundColor: "<?php echo $_SESSION['darkTheme']==0 ? '#dedede' : '#2d353c'; ?>",
                            title:{
                                text: "History",
                                fontFamily:'Helvetica Neue, Helvetica, Arial, sans-serif',
                                fontWeight: "bold",
                                fontColor: "<?php echo $_SESSION['darkTheme']==0 ? 'black' : '#d2d2c9'; ?>",
                                fontSize: 24
                            },
                            legend:{
                                cursor: "pointer",
                                fontSize: 16,
                                itemclick: toggleDataSeriesSearch,
                                fontColor: "<?php echo $_SESSION['darkTheme']==0 ? 'black' : '#d2d2c9'; ?>"
                            },
                            axisX:{
                                labelFontColor: "<?php echo $_SESSION['darkTheme']==0 ? 'black' : '#d2d2c9'; ?>",
                                labelAngle: -90/90,
                                labelMaxWidth: 80
                            },
                            axisY: {
                                labelFontColor: "<?php echo $_SESSION['darkTheme']==0 ? 'black' : '#d2d2c9'; ?>",
                                //title: "<?php //echo $row['y_unit']; ?>//"
                            },
                            toolTip:{
                                shared: true
                            },
                            data: [
                                {
                                    name: "Analogue 1",
                                    type: "spline",
                                    color: "#009cde",
                                    showInLegend: true,
                                    dataPoints: [{}]
                                }
                                ,{  visible: false,
                                    name: "Analogue 2",
                                    type: "spline",
                                    showInLegend: true,
                                    dataPoints: [{}]
                                }
                                ,{  visible: false,
                                    name: "Analogue 3",
                                    type: "spline",
                                    showInLegend: true,
                                    dataPoints: [{}]
                                }
                                ,{  visible: false,
                                    name: "Analogue 4",
                                    type: "spline",
                                    showInLegend: true,
                                    dataPoints: [{}]
                                }
                                ,{  visible: false,
                                    name: "Analogue 5",
                                    type: "spline",
                                    showInLegend: true,
                                    dataPoints: [{}]
                                }
                                ,{  visible: false,
                                    name: "Analogue 6",
                                    type: "spline",
                                    showInLegend: true,
                                    dataPoints: [{}]
                                }
                                // ,{  visible: false,
                                //     name: "Temperature 1",
                                //     type: "spline",
                                //     showInLegend: true,
                                //     dataPoints: [{}]
                                // }
                                // ,{  visible: false,
                                //     name: "Temperature 2",
                                //     type: "spline",
                                //     showInLegend: true,
                                //     dataPoints: [{}]
                                // }
                                // ,{  visible: false,
                                //     name: "Temperature 3",
                                //     type: "spline",
                                //     showInLegend: true,
                                //     dataPoints: [{}]
                                // }
                            ]
                        });

                    function toggleDataSeriesSearch(e){
                        console.log("clicked");
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        }
                        else{
                            e.dataSeries.visible = true;
                        }
                        searchChart.render();
                    }
                    $("#btn1").hide();
                    $("#SrchBtn").click(function(){
                        // Get Data from DB
                        $.getJSON("ajax/getHistoryData.php", {
                            device_id: "<?php echo $_SESSION['device_details_id']; ?>",
                            start: $("#startDate").val(),
                            end: $("#endDate").val()
                        }, function(data) {
                            console.log(data);

                            searchChart.options.data[0].dataPoints = [];
                            searchChart.options.data[1].dataPoints = [];
                            searchChart.options.data[2].dataPoints = [];
                            searchChart.options.data[3].dataPoints = [];
                            searchChart.options.data[4].dataPoints = [];
                            searchChart.options.data[5].dataPoints = [];
                            // searchChart.options.data[6].dataPoints = [];
                            // searchChart.options.data[7].dataPoints = [];
                            // searchChart.options.data[8].dataPoints = [];

                            $.each(data, function(key, value) {
                                searchChart.options.data[0].dataPoints.push(
                                    {
                                        label: value[0],
                                        y: parseInt(value[1])
                                    }
                                );
                                searchChart.options.data[1].dataPoints.push(
                                    {
                                        label: value[0],
                                        y: parseInt(value[2])
                                    }
                                );
                                searchChart.options.data[2].dataPoints.push(
                                    {
                                        label: value[0],
                                        y: parseInt(value[3])
                                    }
                                );
                                searchChart.options.data[3].dataPoints.push(
                                    {
                                        label: value[0],
                                        y: parseInt(value[4])
                                    }
                                );
                                searchChart.options.data[4].dataPoints.push(
                                    {
                                        label: value[0],
                                        y: parseInt(value[5])
                                    }
                                );
                                searchChart.options.data[5].dataPoints.push(
                                    {
                                        label: value[0],
                                        y: parseInt(value[6])
                                    }
                                );
                                // searchChart.options.data[6].dataPoints.push(
                                //     {
                                //         label: value[0],
                                //         y: parseInt(value[7])
                                //     }
                                // );
                                // searchChart.options.data[7].dataPoints.push(
                                //     {
                                //         label: value[0],
                                //         y: parseInt(value[8])
                                //     }
                                // );
                                // searchChart.options.data[8].dataPoints.push(
                                //     {
                                //         label: value[0],
                                //         y: parseInt(value[9])
                                //     }
                                // );

                            });

                            searchChart.render();
                            $("#searchChart").css({'height': "400px" });

                            $("#btn1").show();
                            $("#btn2").hide();
                        });


                    });

                    function showHistoryGraph(){
                    }


                    function updateHistoryGraph(graphData){

                    }
                </script>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>



<?php
if(isset($_POST["update_userr"])){
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $contact = $_POST["contact"];
    $user_id = $_POST["user_id"];
    $sql = "UPDATE users SET username='$name', email='$email', password='$password', contact='$contact' WHERE id=$user_id";
    if(mysqli_query($con, $sql)){
//                    header('Location: users.php');
        echo '
                        <script>window.location.replace("device-details.php?id='.$device_id.'");</script>
                    ';
    }else{
        echo '
                        <script>alert("'.mysqli_error($con).'")</script>
                    ';
    }
}
?>
<!-- Modal dashboard_settings_modal -->
<div class="modal fade" id="dashboard_settings_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title darkColorInDarkTheme" id="exampleModalLabel">Dashboard Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $sql1 = "SELECT * FROM dashboard_units WHERE device_id= $device_id";
                $res1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_array($res1);
                ?>
                <form method="POST" action="">
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold darkColorInDarkTheme">Temperature</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio"  name="temperature_unit" value="f" <?php if($row1["temp"]=="f") echo "checked"; ?>> °F
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="temperature_unit" value="c" <?php if($row1["temp"]=="c") echo "checked"; ?>> °C
                            </label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold darkColorInDarkTheme">Torque</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="torque_unit" value="ft-lbs" <?php if($row1["torque"]=="ft-lbs") echo "checked"; ?>> ft-lbs
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="torque_unit" value="nm" <?php if($row1["torque"]=="nm") echo "checked"; ?>> Nm
                            </label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold darkColorInDarkTheme">Pressure</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="pressure_unit" value="bar" <?php if($row1["pressure"]=="bar") echo "checked"; ?>> Bar
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="pressure_unit" value="psi" <?php if($row1["pressure"]=="psi") echo "checked"; ?>> psi
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="pressure_unit" value="pa" <?php if($row1["pressure"]=="pa") echo "checked"; ?>> Pa
                            </label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold darkColorInDarkTheme">Distance</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="distance_unit"  value="mm" <?php if($row1["distance"]=="mm") echo "checked"; ?>> mm
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="distance_unit"  value="in" <?php if($row1["distance"]=="in") echo "checked"; ?>> in
                            </label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold darkColorInDarkTheme">Time</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="time_format"  value="12" <?php if($row1["time_format"]=="12") echo "checked"; ?>> 12 Hours
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="time_format" value="24" <?php if($row1["time_format"]=="24") echo "checked"; ?>> 24 Hours
                            </label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 ml-3 font-weight-bold darkColorInDarkTheme">Time Zone</label>
                        <div class="form-group col-md-6">
                            <select name="timezone" class="form-control" id="exampleFormControlSelect1">
                                <?php
                                require 'app/timezonesList.php';
                                foreach($timezones as $key => $val) {
                                    ?>
                                    <option value="<?php echo $key; ?>" <?php if($row1["time_zone"]==$key) echo "Selected"; ?>><?php echo $val; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5 mx-auto">
                            <button type="submit" class="btn btn-primary w-100" name="update_units">Update</button>
                        </div>
                        <div class="col-5 mx-auto">
                            <button type="submit" class="btn btn-secondary w-100" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST["update_units"])){
//    print_r($_POST); exit(); die();
    $temperature_unit = $_POST["temperature_unit"];
    $torque_unit = $_POST["torque_unit"];
    $pressure_unit = $_POST["pressure_unit"];
    $distance_unit = $_POST["distance_unit"];
    $time = $_POST["time_format"];
    $timezone = $_POST["timezone"];

    session_start();
    //FOr temp
    if($temperature_unit=="c"){ $_SESSION["Celcius"] = true; }
    if($temperature_unit=="f"){ $_SESSION["Celcius"] = false; }
    //For Time
    if($time=="12"){ $_SESSION["time-24"] = false; }
    if($time=="24"){ $_SESSION["time-24"] = true; }
    //For Torque
    if($torque_unit=="ft-lbs"){ $_SESSION["torque-FtLbs"] = true; }
    if($torque_unit=="nm"){ $_SESSION["torque-FtLbs"] = false; }

    $sql = "UPDATE dashboard_units SET temp='$temperature_unit', torque='$torque_unit', pressure='$pressure_unit',
            distance='$distance_unit', time_format=$time, time_zone='$timezone' WHERE device_id=$device_id";


    if(mysqli_query($con, $sql)){
//                    header('Location: users.php');
        echo '
                        <script>window.location.replace("device-details.php?id='.$device_id.'");</script>
                    ';
    }else{
        echo '
                        <script>alert("'.mysqli_error($con).'")</script>
                    ';
    }
}
?>