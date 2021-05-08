<?php
require 'app/main.php';
session_start();
$_SESSION['currentPath'] = "./";

$device_id = isset($_GET["id"]) ? $_GET["id"] : null;
function runQuery($sql, $msg){
    require 'app/db.php';
//            $actual_link = $_SERVER['REQUEST_URI'];
    if(mysqli_query($con, $sql)){
//                js_alert($msg);
//                js_redirect($actual_link);
        return true;
    }else{
        echo '<script>alert("Error! \n SQL: '.$sql.'\n'.mysqli_error($con).'");</script>';
        die(); exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<style>
    [data-toggle="collapse"] .fa:before {
        content: "\f139";
    }

    [data-toggle="collapse"].collapsed .fa:before {
        content: "\f13a";
    }

</style>

<body>
<!-- Navigation -->
<?php require 'app/db.php'; require 'app/nav.include.php'; ?>


<!-- Page Content -->
<div class="container">
    <h3 class="font-roboto my-3 "><i class="fas fa-cogs"></i> Customize Dashboard</h3>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="nav flex-column nav-pills pillsCustomBorder shadow bg-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">1. Dashboard Setup Info</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">2. Units</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">3. Graphs</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">4. UI Components</a>
                <a class="nav-link" id="v-pills-conditioning-tab" data-toggle="pill" href="#v-pills-conditioning" role="tab" aria-controls="v-pills-conditioning" aria-selected="false">5. Data Conditioning</a>
                <a class="nav-link" id="v-pills-final-tab" data-toggle="pill" href="#v-pills-final" role="tab" aria-controls="v-pills-final" aria-selected="false">6. Finalization</a>
            </div>
        </div>
        <div class="col-md-9">
            <form action="" method="POST">
                <div class="tab-content" id="v-pills-tabContent">
                    <!--Dashboard Information Tab-->
                    <div class="tab-pane fade show active bg-white shadow p-3" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="form-group">
                            <label>Select Device</label>
                            <select class="form-control" id="sel1" name="device_id">
                                <option>-- Select device to link --</option>
                                <?php
                                $sql = "SELECT * FROM custom_dashboards WHERE device_id = $device_id";
                                $res = mysqli_query($con, $sql);
                                $row1 = mysqli_fetch_array($res);

                                $sql = "SELECT * FROM user_and_devices";
                                $res = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_array($res)){
                                    $selected = "";
                                    if($row["id"] == $row1["device_id"]){
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option value="<?php echo $row["id"]; ?>" <?php echo $selected; ?>><?php echo $row["device_name"].' ('.$row["mac"].')'; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select User</label>
                            <select class="form-control" id="sel1" name="user_id">
                                <option>-- Select user to link --</option>
                                <?php
                                require 'app/db.php';
                                $sql = "SELECT * FROM users WHERE is_admin=0";
                                $res = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_array($res)){
                                    $selected = "";
                                    if($row["id"] == $row1["user_id"]){
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option value="<?php echo $row["id"]; ?>" <?php echo $selected; ?>><?php echo $row["username"].' ('.$row["email"].')'; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dashboard Name</label>
                            <input type="text" class="form-control" value="<?php echo $row1["dashboardName"]; ?>" placeholder="New Dashboard" name="dashboardName">
                        </div>
                        <div class="form-group">
                            <label>Site Operator's Email Address</label>
                            <input type="email" class="form-control" value="<?php echo $row1["email"]; ?>" placeholder="User Email" name="userEmail">
                        </div>
                    </div>

                    <!--Dashboard Units Tab-->
                    <div class="tab-pane fade bg-white shadow p-3" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <?php
                            $sql1 = "SELECT * FROM dashboard_units WHERE device_id= $device_id";
                            $res1 = mysqli_query($con, $sql1);
                            $row1 = mysqli_fetch_array($res1)
                        ?>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Temperature</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="temperature_unit" value="f" <?php if($row1["temp"]=="f") echo "checked"; ?>>
                                <label class="form-check-label" >°F</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="temperature_unit" value="c" <?php if($row1["temp"]=="c") echo "checked"; ?>>
                                <label class="form-check-label" >°C</label>
                            </div>
                        </div>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Torque</label>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="torque_unit" value="ft-lbs" <?php if($row1["torque"]=="ft-lbs") echo "checked"; ?>>
                                <label class="form-check-label" >ft-lbs</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="torque_unit" value="nm" <?php if($row1["torque"]=="nm") echo "checked"; ?>>
                                <label class="form-check-label" >Nm</label>
                            </div>
                        </div>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Pressure</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pressure_unit" value="bar" <?php if($row1["pressure"]=="bar") echo "checked"; ?>>
                                <label class="form-check-label" >Bar</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="pressure_unit" value="psi" <?php if($row1["pressure"]=="psi") echo "checked"; ?>>
                                <label class="form-check-label">psi</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="pressure_unit" value="pa" <?php if($row1["pressure"]=="pa") echo "checked"; ?>>
                                <label class="form-check-label">Pa</label>
                            </div>
                        </div>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Distance</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="distance_unit"  value="mm" <?php if($row1["distance"]=="mm") echo "checked"; ?>>
                                <label class="form-check-label">mm</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="distance_unit"  value="in" <?php if($row1["distance"]=="in") echo "checked"; ?>>
                                <label class="form-check-label">in</label>
                            </div>
                        </div>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Time</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="time_format"  value="12" <?php if($row1["time_format"]=="12") echo "checked"; ?>>
                                <label class="form-check-label">12 Hours</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="time_format" value="24" <?php if($row1["time_format"]=="24") echo "checked"; ?>>
                                <label class="form-check-label">24 Hours</label>
                            </div>
                        </div>
                    </div>

                    <!--Graph Legends Tab-->
                    <div class="tab-pane fade bg-white shadow p-3" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h2 id="navHeading" class="font-roboto">Horizontal Lines</h2>
                        <hr>
                        <?php
                            $sql = "SELECT * FROM custom_graph WHERE device_id = $device_id";
                            $res = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($res);
                        ?>
                            <div id="row1" class="form-group row">
                                <label for="inputPassword" class="mx-2 ml-3 col-form-label">Line Name</label>
                                <div>
                                    <input type="text" class="form-control" id="graphinput1" placeholder="Alarm" name="graphLineName1" value="<?php echo $row["line1"]; ?>">
                                </div>
                                <label for="inputPassword" class="mx-2 col-form-label">Line Value:</label>
                                <div>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="graphinput2" placeholder="27000" name="graphValue1" value="<?php echo $row["line1_value"]; ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">ft-lbs</span>
                                        </div>
                                    </div>
                                </div>
                                <i class="fas fa-trash-alt text-danger font-size-xLarger ml-4 mt-2" id="delRow1"></i>
                            </div>
                            <div id="row2" class="form-group row">
                                <label for="inputPassword" class="mx-2 ml-3 col-form-label">Line Name</label>
                                <div>
                                    <input type="text" class="form-control" id="graphinput3" placeholder="Cutoff" name="graphLineName2" value="<?php echo $row["line2"]; ?>">
                                </div>
                                <label for="inputPassword" class="mx-2 col-form-label">Line Value:</label>
                                <div>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="graphinput4" placeholder="35000" name="graphValue2" value="<?php echo $row["line2_value"]; ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">ft-lbs</span>
                                        </div>
                                    </div>
                                </div>
                                <i class="fas fa-trash-alt text-danger font-size-xLarger ml-4 mt-2" id="delRow2"></i>
                            </div>

                            <button class="btn btn-primary ml-1" type="button" id="addRow">
                                <i class="fas fa-plus"></i>
                            </button>

                        <h2 id="navHeading" class="font-roboto">Plot Settings</h2>
                        <hr>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input id="showLegendsDiv" type="checkbox" class="form-check-input" name="allLegendsCheck" <?php if($row["show_legends"]=="on"){echo "checked";} ?>>Plot Legends and Markers
                            </label>
                        </div>
                        <div id="legendsCheck" class="mt-3">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="legend1" <?php if($row["legends1"]=="on"){echo "checked";} ?>>Alarm
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="legend2" <?php if($row["legends2"]=="on"){echo "checked";} ?>>CutOff
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="legend3" <?php if($row["legends3"]=="on"){echo "checked";} ?>>Lift Lower
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="legend4" <?php if($row["legends4"]=="on"){echo "checked";} ?>>Lift Raise
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="legend5" <?php if($row["legends5"]=="on"){echo "checked";} ?>>Loss Motion
                                </label>
                            </div>
                        </div>

                            <script type="text/javascript">
                                if($('input#showLegendsDiv').is(':checked')){
                                    $("#legendsCheck").show();
                                }else{
                                    $("#legendsCheck").hide();
                                }
                                $("#addRow").hide();
                                $("#showLegendsDiv").click(function(){
                                    if($('input#showLegendsDiv').is(':checked')){
                                        $("#legendsCheck").show();
                                    }else{
                                        $("#legendsCheck").hide();
                                    }
                                });
                                $("#delRow1").click(function(){
                                    $("#row1").hide();
                                    $("#addRow").show();
                                    $("#graphinput1").val("");
                                    $("#graphinput2").val("");
                                });
                                $("#delRow2").click(function(){
                                    $("#row2").hide();
                                    $("#addRow").show();
                                    $("#graphinput3").val("");
                                    $("#graphinput4").val("");
                                });
                                $("#addRow").click(function(){
                                    if($("#row1").is(":visible")){
                                        $("#row2").show();
                                    } else{
                                        $("#row1").show();
                                    }
                                    if($("#delRow2").is(":visible") && $("#addRow").is(":visible")){
                                        $("#addRow").hide();
                                    }
                                });
                            </script>
                    </div>

                    <!--Ui Components Tab-->
                    <div class="tab-pane fade bg-white shadow p-3" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="font-roboto">
                            <div id="accordion">
                                <!--Select Sections Card-->
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                            <i class="fa" aria-hidden="true"></i> Select Sections
                                        </a>
                                    </div>
                                    <?php
                                    $defaultSettingsId = $device_id;
                                    $sql = "SELECT * FROM custom_sections WHERE device_id=$defaultSettingsId";
                                    $res = mysqli_query($con, $sql);
                                    $mainRow = mysqli_fetch_array($res);
                                    $graphTitle = $mainRow["graph_title"];
                                    ?>
                                    <div id="collapseOne" class="collapse show">
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"
                                                                        <?php if($mainRow["device_settings_check"]=="on") echo "checked"; ?>
                                                                           name="device_settings_check">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="<?php echo $mainRow["device_settings_title"]; ?>" name="device_settings_title">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" <?php if($mainRow["torque_gauge_check"]=="on") echo "checked" ?>
                                                                           name="torque_gauge_check">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="<?php echo $mainRow["torque_title"]; ?>" name="torque_title">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"  <?php if($mainRow["graph_check"]=="on") echo "checked" ?>
                                                                           name="graph_check">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="<?php echo $graphTitle; ?>" name="graph_title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"   <?php if($mainRow["installation_info_check"]=="on") echo "checked" ?>
                                                                           name="installation_info_check">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="<?php echo $mainRow["installation_info_title"]; ?>" name="installation_info_title">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"   <?php if($mainRow["alerts_check"]=="on") echo "checked" ?>
                                                                           name="alerts_check">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="<?php echo $mainRow["alerts_title"]; ?>" name="alerts_title">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" <?php if($mainRow["maintenance_check"]=="on") echo "checked" ?>
                                                                           name="maintenance_check">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" value="<?php echo $mainRow["maintenance_title"]; ?>" name="maintenance_title">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!--Device Flag Settings-->
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                            <i class="fa" aria-hidden="true"></i>  Device Status
                                        </a>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM custom_devicestatus WHERE device_id=$defaultSettingsId";
                                    $res = mysqli_query($con, $sql);
                                    $mainRow = mysqli_fetch_array($res);
                                    ?>
                                    <div id="collapseTwo" class="collapse">
                                        <div class="card-body">
                                                <div class="row set_font_roboto">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="a1" <?php if($mainRow["a1"]=="on") echo "checked"; ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                Position Lift Bar
                                                            </label>
                                                        </div><div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="a3" <?php if($mainRow["a3"]=="on") echo "checked"; ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                Alarm Flag
                                                            </label>
                                                        </div><div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="a5" <?php if($mainRow["a5"]=="on") echo "checked"; ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                CutOff Flag
                                                            </label>
                                                        </div><div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="a7" <?php if($mainRow["a7"]=="on") echo "checked"; ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                Lift Active Flag
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="a2" <?php if($mainRow["a2"]=="on") echo "checked"; ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                Water in Oil Flag
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="a4" <?php if($mainRow["a4"]=="on") echo "checked"; ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                Low Oil Flag
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="a6" <?php if($mainRow["a6"]=="on") echo "checked"; ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                LOSS MOTION
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="a8" <?php if($mainRow["a8"]=="on") echo "checked"; ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                Display Temperature
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <h3 class="font-roboto">Lift Position</h3>
                                            <hr>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!--Torque Gauge Customization Card-->
                                <div class="card">
                                    <?php
                                    $sql = "SELECT * FROM user_and_devices WHERE id=$defaultSettingsId";
                                    $res = mysqli_query($con, $sql);
                                    $mainRow = mysqli_fetch_array($res);
                                    ?>
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                            <i class="fa" aria-hidden="true"></i>  Torque Gauge Configurations
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse">
                                        <div class="card-body">
                                                <div class="form-group">
                                                    <label for="email1" class="text-dark">Enter Meter values <mark><i>in given format</i></mark></label>
                                                    <input name="ranges" type="text" class="form-control" id="email1" value="<?php echo $mainRow["meter_ranges"]; ?>" placeholder="0,2500,5000,7500,10000,12500,15000,175000,20000,22500,25000,27500,30000">
                                                </div>
                                                <p>Set Color Levels</p>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="">0 - </span>
                                                            </div>
                                                            <input onkeyup="func1()" value="<?php echo $mainRow["meter_range_1"]; ?>" id="box111" type="text" class="form-control" placeholder="Range" name="rng1">
                                                            <input type="text" class="form-control" value="<?php echo $mainRow["meter_color_1"]; ?>" placeholder="Color" name="clr1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <p class="input-group-text" id="ffff"><span id="r2">0</span> - </p>
                                                            </div>
                                                            <input onkeyup="func2()" value="<?php echo $mainRow["meter_range_2"]; ?>" id="box2222" type="text" class="form-control" placeholder="Range" name="rng2"">
                                                            <input type="text" value="<?php echo $mainRow["meter_color_2"]; ?>" class="form-control" placeholder="Color" name="clr2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <p class="input-group-text" id="eeee"><span id="r3">0</span> - </p>
                                                            </div>
                                                            <input id="box3" value="<?php echo $mainRow["meter_range_3"]; ?>" type="text" class="form-control" placeholder="Range" name="rng3">
                                                            <input type="text" value="<?php echo $mainRow["meter_color_3"]; ?>" class="form-control" placeholder="Color" name="clr3">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!--Graph Settings-->
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                                            <i class="fa" aria-hidden="true"></i>  Graph Settings
                                        </a>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM custom_graph WHERE device_id=$defaultSettingsId";
                                    $res = mysqli_query($con, $sql);
                                    $mainRow = mysqli_fetch_array($res);
                                    ?>
                                    <div id="collapseFour" class="collapse">
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Graph Title</label>
                                                            <input type="text" value="<?php echo $graphTitle ?>" class="form-control" name="graph_title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Graph Line Name</label>
                                                            <input type="text" value="<?php echo $mainRow["line_name"]; ?>" class="form-control" name="line_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Line Color</label>
                                                            <input type="text" class="form-control" name="line_color" value="<?php echo $mainRow["line_color"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Y axis Unit</label>
                                                            <input type="text" class="form-control" name="y_unit" value="<?php echo $mainRow["y_unit"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!--Installation Info-->
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
                                            <i class="fa" aria-hidden="true"></i>  Installation Information
                                        </a>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM custom_installation_info WHERE device_id=$defaultSettingsId";
                                    $res = mysqli_query($con, $sql);
                                    $mainRow = mysqli_fetch_array($res);
                                    ?>
                                    <div id="collapseFive" class="collapse">
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="drive_model_check" <?php if($mainRow["drive_model_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="drive_model_title" value="<?php echo $mainRow["drive_model_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"  name="drive_rating_check" <?php if($mainRow["drive_rating_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="drive_rating_title" value="<?php echo $mainRow["drive_rating_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="drive_speed_check"  <?php if($mainRow["drive_speed_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="drive_speed_title" value="<?php echo $mainRow["drive_speed_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="drive_motor_check"  <?php if($mainRow["drive_motor_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="drive_motor_title" value="<?php echo $mainRow["drive_motor_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="drive_lift_check"  <?php if($mainRow["drive_lift_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="drive_lift_title" value="<?php echo $mainRow["drive_lift_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="drive_service_check"  <?php if($mainRow["drive_service_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="drive_service_title" value="<?php echo $mainRow["drive_service_title"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="driver_sn_check"  <?php if($mainRow["driver_sn_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="driver_sn_title" value="<?php echo $mainRow["driver_sn_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="driver_user_check"  <?php if($mainRow["driver_user_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="driver_user_title" value="<?php echo $mainRow["driver_user_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="driver_installation_check"  <?php if($mainRow["driver_installation_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="driver_installation_title" value="<?php echo $mainRow["driver_installation_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"  name="driver_process_check" <?php if($mainRow["driver_process_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="driver_process_title" value="<?php echo $mainRow["driver_process_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox"  name="driver_size_check" <?php if($mainRow["driver_size_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="driver_size_title" value="<?php echo $mainRow["driver_size_title"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!--Alerts-->
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
                                            <i class="fa" aria-hidden="true"></i>  Alerts
                                        </a>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM custom_alerts WHERE device_id=$defaultSettingsId";
                                    $res = mysqli_query($con, $sql);
                                    $mainRow = mysqli_fetch_array($res);
                                    ?>
                                    <div id="collapseSix" class="collapse">
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="today_check" <?php if($mainRow["today_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="today_title" value="<?php echo $mainRow["today_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="last_mnth_check" <?php if($mainRow["last_mnth_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="last_mnth_title" value="<?php echo $mainRow["last_mnth_title"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="last_7_check" <?php if($mainRow["last_7_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="last_7_title" value="<?php echo $mainRow["last_7_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="last_6mnth_check" <?php if($mainRow["last_6mnth_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="last_6mnth_title" value="<?php echo $mainRow["last_6mnth_title"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!--Maintenance Record-->
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseSeven">
                                            <i class="fa" aria-hidden="true"></i>  Maintenance Record
                                        </a>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM custom_maintenance WHERE device_id=$defaultSettingsId";
                                    $res = mysqli_query($con, $sql);
                                    $mainRow = mysqli_fetch_array($res);
                                    ?>
                                    <div id="collapseSeven" class="collapse">
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="last_oil_change_main_check" <?php if($mainRow["last_oil_change_main_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="last_oil_change_main_title" value="<?php echo $mainRow["last_oil_change_main_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="next_oil_change_main_check" <?php if($mainRow["next_oil_change_main_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="next_oil_change_main_title" value="<?php echo $mainRow["next_oil_change_main_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="last_oil_lift_check" <?php if($mainRow["last_oil_lift_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="last_oil_lift_title" value="<?php echo $mainRow["last_oil_lift_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="last_repair_check" <?php if($mainRow["last_repair_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="last_repair_title" value="<?php echo $mainRow["last_repair_title"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="next_service_check" <?php if($mainRow["next_service_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="next_service_title" value="<?php echo $mainRow["next_service_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="next_oil_lift_check" <?php if($mainRow["next_oil_lift_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="next_oil_lift_title" value="<?php echo $mainRow["next_oil_lift_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="dbs_warranty_check" <?php if($mainRow["dbs_warranty_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="dbs_warranty_title" value="<?php echo $mainRow["dbs_warranty_title"]; ?>">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" name="parts_repaired_check" <?php if($mainRow["parts_repaired_check"]=="on") echo "checked"; ?>>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="parts_repaired_title" value="<?php echo $mainRow["parts_repaired_title"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- END of accordian -->
                        </div>
                    </div>

                    <!--Conditioning Tab-->
                    <div class="tab-pane fade bg-white shadow p-3" id="v-pills-conditioning" role="tabpanel" aria-labelledby="v-pills-conditioning-tab">
                        <?php
                        $sql = "SELECT * FROM custom_conditions WHERE device_id=$device_id";
                        $res = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($res);
                        ?>
                        <div class="row ml-3">
                            <div class="conditionHeading"><h3>Temperature: </h3></div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-success font-weight-bold">ON</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8805;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="1" name="tempGreater" value="<?php echo $row["tempGreater"]; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-danger font-weight-bold">OFF</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8804;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0" name="tempLoss" value="<?php echo $row["tempLoss"]; ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-3">
                            <div class="conditionHeading"><h3>Alarm: </h3></div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-success font-weight-bold">ON</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8805;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="1" name="alarmGreater" value="<?php echo $row["alarmGreater"]; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-danger font-weight-bold">OFF</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8804;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0" name="alarmLess" value="<?php echo $row["alarmLess"]; ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-3">
                            <div class="conditionHeading"><h3>Water in Oil: </h3></div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-success font-weight-bold">ON</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8805;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="1" name="waterInOilGreater" value="<?php echo $row["waterInOilGreater"]; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-danger font-weight-bold">OFF</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8804;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0" name="waterInOilLess" value="<?php echo $row["waterInOilLess"]; ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-3">
                            <div class="conditionHeading"><h3>Loss Motion: </h3></div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-success font-weight-bold">ON</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8805;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="1" name="lossMotionGreater" value="<?php echo $row["lossMotionGreater"]; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-danger font-weight-bold">OFF</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8804;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0" name="lossMotionLess" value="<?php echo $row["lossMotionLess"]; ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row ml-3">
                            <div class="conditionHeading"><h3>Lift Position: </h3></div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-success font-weight-bold">ON</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8805;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="1" name="liftPositionGreater" value="<?php echo $row["liftPositionGreater"]; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group mb-3">
                                    <label for="" class="mt-1 mr-3"><span class="text-danger font-weight-bold">OFF</span> Condition</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">&#8804;</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0" name="liftPositionLower" value="<?php echo $row["liftPositionLower"]; ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <!--Finalization-->
                    <div class="tab-pane fade bg-white shadow p-3" id="v-pills-final" role="tabpanel" aria-labelledby="v-pills-final-tab">
                        <p class="font-italic mt-2">
                            Dashboard configured! You can move back to any step and edit configurations.
                        </p>
                        <div class="row">
                            <button type="submit" class="btn btn-primary col-6 mx-auto w-100 mt-4" name="newDashboard" id="createBtn">
                                <span id="btn1">
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                </span>
                                <span id="btn2">
                                    <i class="fas fa-save"></i> Save Changes
                                </span>
                            </button>
                        </div>
                        <div class="text-center mt-5" id="loadingText">
                            <div class="spinner-border text-primary" role="status">
                            </div>
                            <span class="font-size-xLarger font-roboto ml-2">Creating New Dashboard for you, Please wait...</span>
                        </div>
                        <script>
                            $("#btn1").hide();
                            $("#loadingText").hide();
                            $("#createBtn").click(function(){
                                $("#btn1").show();
                                $("#btn2").hide();
                                $("#loadingText").show();
                            });
                        </script>
                    </div>
                </div>
            </form>
    </div>
</div>
    <?php
    if(isset($_POST["newDashboard"])){
        //First Box Values
        $device_id = $_POST["device_id"];
        $user_id = $_POST["user_id"];
        $dashboardName = $_POST["dashboardName"];
        $userEmail = $_POST["userEmail"];
        //UPDATING data into custom_dashboards Row

        $sql = "UPDATE custom_dashboards SET user_id=$user_id, dashboardName='$dashboardName', email='$userEmail' WHERE device_id=$device_id";
        $sql1 = "UPDATE user_and_devices  SET user_id=$user_id WHERE id=$device_id";

        mysqli_query($con, $sql1);

        if(!mysqli_query($con, $sql)){
            echo "Error while inserting in custom_dashboards ! <br> SQL: $sql <br> ".mysqli_error($con);
        }

        //UNITS
        $temperature_unit = $_POST["temperature_unit"];
        $torque_unit = $_POST["torque_unit"];
        $pressure_unit = $_POST["pressure_unit"];
        $distance_unit = $_POST["distance_unit"];
        $time_format = $_POST["time_format"];


        $sql = "UPDATE dashboard_units SET temp='$temperature_unit', torque='$torque_unit', pressure='$pressure_unit', distance='$distance_unit',
                time_format='$time_format' WHERE device_id=$device_id";
        mysqli_query($con, $sql);

        // Custom Conditions
        $tempGreater = $_POST["tempGreater"];
        $tempLoss = $_POST["tempLoss"];
        $alarmGreater = $_POST["alarmGreater"];
        $alarmLess = $_POST["alarmLess"];
        $waterInOilGreater = $_POST["waterInOilGreater"];
        $waterInOilLess = $_POST["waterInOilLess"];
        $lossMotionGreater = $_POST["lossMotionGreater"];
        $lossMotionLess = $_POST["lossMotionLess"];
        $liftPositionGreater = $_POST["liftPositionGreater"];
        $liftPositionLower = $_POST["liftPositionLower"];

        $sql = "UPDATE custom_conditions SET tempGreater=$tempGreater , tempLoss=$tempLoss, alarmGreater=$alarmGreater, alarmLess=$alarmLess,
                waterInOilGreater=$waterInOilGreater, waterInOilLess=$waterInOilLess, lossMotionGreater=$lossMotionGreater, lossMotionLess= $lossMotionLess,
                liftPositionGreater=$liftPositionGreater, liftPositionLower=$liftPositionLower
                WHERE device_id = $device_id";

        mysqli_query($con, $sql);

        //Third Box Values
        $graphLineName1 = $_POST["graphLineName1"];
        $graphValue1 = $_POST["graphValue1"];
        $graphLineName2 = $_POST["graphLineName2"];
        $graphValue2 = $_POST["graphValue2"];
        $allLegendsCheck = isset($_POST["allLegendsCheck"]) ? $_POST["allLegendsCheck"] : '';
        $legend1 = isset($_POST["legend1"]) ? $_POST["legend1"] : '';
        $legend2 = isset($_POST["legend2"]) ? $_POST["legend2"] : '';
        $legend3 = isset($_POST["legend3"]) ? $_POST["legend3"] : '';
        $legend4 = isset($_POST["legend4"]) ? $_POST["legend4"] : '';
        $legend5 = isset($_POST["legend5"]) ? $_POST["legend5"] : '';

        $sql = "UPDATE custom_graph SET line1='$graphValue1', line1_value='$graphValue1', line2='$graphLineName2', line2_value='$graphValue2',
                 show_legends='$allLegendsCheck', legends1='$legend1', legends2='$legend2', legends3='$legend3', legends4='$legend4',
                 legends5='$legend5' WHERE device_id = $device_id";
        mysqli_query($con, $sql);



       // if(isset($_POST['custom_sections'])){
            $device_settings_check = isset($_POST['device_settings_check']) ? $_POST['device_settings_check'] : '';
            $device_settings_title = $_POST['device_settings_title'];
            $torque_gauge_check = $_POST['torque_gauge_check'];
            $torque_title = $_POST['torque_title'];
            $graph_check = isset($_POST['graph_check']) ? $_POST['graph_check'] : '';
            $graph_title = $_POST['graph_title'];
            $installation_info_check = isset($_POST['installation_info_check']) ? $_POST['installation_info_check'] : "";
            $installation_info_title = $_POST['installation_info_title'];
            $alerts_check = $_POST['alerts_check'];
            $alerts_title = $_POST['alerts_title'];
            $maintenance_check = isset($_POST['maintenance_check']) ? $_POST['maintenance_check'] : "";
            $maintenance_title = $_POST['maintenance_title'];
            $sql = "UPDATE custom_sections SET device_settings_check='$device_settings_check', device_settings_title='$device_settings_title',
            torque_gauge_check='$torque_gauge_check', torque_title='$torque_title', graph_check='$graph_check', graph_title='$graph_title',
            installation_info_check='$installation_info_check', installation_info_title='$installation_info_title', alerts_check='$alerts_check',
            alerts_title='$alerts_title', maintenance_check='$maintenance_check', maintenance_title='$maintenance_title' WHERE device_id= $device_id";

            runQuery($sql, 'Sections Selection Updated!');

        //if(isset($_POST['device_status'])){
            $a1 = isset($_POST['a1']) ? $_POST['a1'] : "";
            $a2 = isset($_POST['a2']) ? $_POST['a2'] : "";
            $a3 = isset($_POST['a3']) ? $_POST['a3'] : "";
            $a4 = isset($_POST['a4']) ? $_POST['a4'] : "";
            $a5 = isset($_POST['a5']) ? $_POST['a5'] : "";
            $a6 = isset($_POST['a6']) ? $_POST['a6'] : "";
            $a7 = isset($_POST['a7']) ? $_POST['a7'] : "";
            $a8 = isset($_POST['a8']) ? $_POST['a8'] : "";

            $sql = "UPDATE custom_devicestatus SET a1='$a1', a2='$a2',
            a3='$a3', a4='$a4', a5='$a5', a6='$a6',
            a7='$a7', a8='$a8' WHERE device_id=$device_id";
            runQuery($sql, 'Device Status Updated!');


        //if(isset($_POST["torque_gauge"])){

            $ranges = $_POST["ranges"];
            $rng1 = $_POST["rng1"];
            $clr1 = $_POST["clr1"];
            $rng2 = $_POST["rng2"];
            $clr2 = $_POST["clr2"];
            $rng3 = $_POST["rng3"];
            $clr3 = $_POST["clr3"];

            $sql = "UPDATE user_and_devices SET
            meter_ranges='$ranges', meter_range_1='$rng1', meter_range_2='$rng2', meter_range_3='$rng3', 
             meter_color_1='$clr1', meter_color_2='$clr2', meter_color_3='$clr3' WHERE id= $device_id";

            runQuery($sql, 'Torque Settings updated');


        //if(isset($_POST["graph_settings"])){
            $graph_title = $_POST["graph_title"];
            $line_name = $_POST["line_name"];
            $line_color = $_POST["line_color"];
            $y_unit = $_POST["y_unit"];


            $sql = "UPDATE custom_graph SET
            graph_title='$graph_title', line_name='$line_name', line_color='$line_color', y_unit='$y_unit'
            WHERE device_id= $device_id";

            mysqli_query($con, "UPDATE custom_sections SET graph_title='$graph_title' ");

            runQuery($sql, 'Graph Settings updated');

        //if(isset($_POST["installation_info"])){
            $drive_model_check = isset($_POST["drive_model_check"]) ? $_POST["drive_model_check"] : "";
            $drive_model_title = $_POST["drive_model_title"];
            $drive_rating_check = isset($_POST["drive_rating_check"]) ? $_POST["drive_rating_check"] : "";
            $drive_rating_title = $_POST["drive_rating_title"];
            $drive_speed_check = isset($_POST["drive_speed_check"]) ? $_POST["drive_speed_check"] : "";
            $drive_speed_title = $_POST["drive_speed_title"];
            $drive_motor_check = isset($_POST["drive_motor_check"]) ? $_POST["drive_motor_check"] : "";
            $drive_motor_title = $_POST["drive_motor_title"];
            $drive_lift_check = isset($_POST["drive_lift_check"]) ? $_POST["drive_lift_check"] : "";
            $drive_lift_title = $_POST["drive_lift_title"];
            $drive_service_check = isset($_POST["drive_service_check"]) ? $_POST["drive_service_check"] : "";
            $drive_service_title = $_POST["drive_service_title"];
            $driver_sn_check = isset($_POST["driver_sn_check"]) ? $_POST["driver_sn_check"] : "";
            $driver_sn_title = $_POST["driver_sn_title"];
            $driver_user_check = isset($_POST["driver_user_check"]) ? $_POST["driver_user_check"] : "";
            $driver_user_title = $_POST["driver_user_title"];
            $driver_installation_check = isset($_POST["driver_installation_check"]) ? $_POST["driver_installation_check"] : "";
            $driver_installation_title = $_POST["driver_installation_title"];
            $driver_process_check = isset($_POST["driver_process_check"]) ? $_POST["driver_process_check"] : "";
            $driver_process_title = $_POST["driver_process_title"];
            $driver_size_check = isset($_POST["driver_size_check"]) ? $_POST["driver_size_check"] : "";
            $driver_size_title = $_POST["driver_size_title"];

            $sql = "UPDATE custom_installation_info SET drive_model_check='$drive_model_check', drive_model_title='$drive_model_title',
            drive_rating_check='$drive_rating_check', drive_rating_title='$drive_rating_title', drive_speed_check='$drive_speed_check',
            drive_speed_title='$drive_speed_title', drive_motor_check='$drive_motor_check', drive_motor_title='$drive_motor_title',
            drive_lift_check='$drive_lift_check', drive_lift_title='$drive_lift_title', drive_service_check='$drive_service_check',
            drive_service_title='$drive_service_title', driver_sn_check='$driver_sn_check', driver_sn_title='$driver_sn_title',
            driver_user_check='$driver_user_check', driver_user_title='$driver_user_title', driver_installation_check='$driver_installation_check',
            driver_installation_title='$driver_installation_title', driver_process_check='$driver_process_check', driver_process_title='$driver_process_title'
            WHERE device_id=$device_id";
            runQuery($sql, 'Installation Info Settings Updated!');


        //if(isset($_POST["alerts_settings"])){
            $today_check = isset($_POST["today_check"]) ? $_POST["today_check"] : "";
            $today_title = $_POST["today_title"];
            $last_7_check = isset($_POST["last_7_check"]) ? $_POST["last_7_check"] : "";
            $last_7_title = $_POST["last_7_title"];
            $last_mnth_check = isset($_POST["last_mnth_check"]) ? $_POST["last_mnth_check"] : "";
            $last_mnth_title = $_POST["last_mnth_title"];
            $last_6mnth_check = isset($_POST["last_6mnth_check"]) ? $_POST["last_6mnth_check"] : "";
            $last_6mnth_title = $_POST["last_6mnth_title"];

            $sql = "UPDATE custom_alerts SET today_check='$today_check', today_title='$today_title',last_7_check='$last_7_check',
            last_7_title='$last_7_title', last_mnth_check='$last_mnth_check', last_mnth_title='$last_mnth_title',
            last_6mnth_check='$last_6mnth_check', last_6mnth_title='$last_6mnth_title'
            WHERE device_id=$device_id";
            runQuery($sql, 'Alerts settings Updated!');

        //if(isset($_POST["maintenance_update"])){
            $last_oil_change_main_check = isset($_POST["last_oil_change_main_check"]) ? $_POST["last_oil_change_main_check"] : "";
            $last_oil_change_main_title = $_POST["last_oil_change_main_title"];
            $next_oil_change_main_check = isset($_POST["next_oil_change_main_check"]) ? $_POST["next_oil_change_main_check"] : "";
            $next_oil_change_main_title = $_POST["next_oil_change_main_title"];
            $last_oil_lift_check = isset($_POST["last_oil_lift_check"]) ? $_POST["last_oil_lift_check"] : "";
            $last_oil_lift_title = $_POST["last_oil_lift_title"];
            $next_oil_lift_check = isset($_POST["next_oil_lift_check"]) ? $_POST["next_oil_lift_check"] : "";
            $next_oil_lift_title = $_POST["next_oil_lift_title"];
            $next_service_check = isset($_POST["next_service_check"]) ? $_POST["next_service_check"] : "";
            $next_service_title = $_POST["next_service_title"];
            $dbs_warranty_check = isset($_POST["dbs_warranty_check"]) ? $_POST["dbs_warranty_check"] : "";
            $dbs_warranty_title = $_POST["dbs_warranty_title"];
            $last_repair_check = isset($_POST["last_repair_check"]) ? $_POST["last_repair_check"] : "";
            $last_repair_title = $_POST["last_repair_title"];
            $parts_repaired_check = isset($_POST["parts_repaired_check"]) ? $_POST["parts_repaired_check"] : "";
            $parts_repaired_title = $_POST["parts_repaired_title"];

            $sql = "UPDATE custom_maintenance SET last_oil_change_main_check='$last_oil_change_main_check', last_oil_change_main_title='$last_oil_change_main_title',
            next_oil_change_main_check='$next_oil_change_main_check',
            next_oil_change_main_title='$next_oil_change_main_title', last_oil_lift_check='$last_oil_lift_check',
            last_oil_lift_title='$last_oil_lift_title',
            next_oil_lift_check='$next_oil_lift_check', next_oil_lift_title='$next_oil_lift_title', next_service_check='$next_service_check',
            next_service_title='$next_service_title', dbs_warranty_check='$dbs_warranty_check', dbs_warranty_title='$dbs_warranty_title',
            last_repair_check='$last_repair_check', last_repair_title = '$last_repair_title', parts_repaired_check='$parts_repaired_check', 
            parts_repaired_title = '$parts_repaired_title'
            WHERE device_id=$device_id";

            if(runQuery($sql, 'Maintenance Settings Updated!')){
                js_redirect("customize-dashboard.php?msg=New Dashboard Added");
//                echo "Dashboard Done! ";
            }





    }// End of isset(POST)
    ?>


<!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>


</body>

</html>
