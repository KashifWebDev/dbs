<?php
require 'app/main.php';
session_start();
$_SESSION['currentPath'] = "./";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<body>
<!-- Navigation -->
<?php require 'app/nav.include.php'; ?>

<!-- Page Content -->
<div class="container">
    <h3 class="font-roboto my-3">Create New Dashboard</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="nav flex-column nav-pills pillsCustomBorder shadow bg-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard Information</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Units</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Graphs</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">UI Components</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <!--Dashboard Information Tab-->
                <div class="tab-pane fade show active bg-white shadow p-3" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="form-group">
                        <label>Select Device</label>
                        <select class="form-control" id="sel1" name="device_id" required>
                            <option>-- Select device to link --</option>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM user_and_devices";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($res)){
                                ?>
                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["device_name"].' ('.$row["mac"].')'; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dashboard Name</label>
                        <input type="text" class="form-control" placeholder="New Dashboard" name="dashboardName">
                    </div>
                    <div class="form-group">
                        <label>Site Operator's Email Address</label>
                        <input type="email" class="form-control" placeholder="User Email" name="userEmail">
                    </div>
                </div>

                <!--Dashboard Units Tab-->
                <div class="tab-pane fade bg-white shadow p-3" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 font-weight-bold">Temperature</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="temperature_unit" value="f" checked>
                            <label class="form-check-label" >°F</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="temperature_unit" value="c">
                            <label class="form-check-label" >°C</label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3  font-weight-bold">Torque</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="torque_unit" value="ft-lbs" checked>
                            <label class="form-check-label" >ft-lbs</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="torque_unit" value="nm">
                            <label class="form-check-label" >Nm</label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3  font-weight-bold">Pressure</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pressure_unit" value="bar">
                            <label class="form-check-label" >Bar</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="pressure_unit" value="psi" checked>
                            <label class="form-check-label">psi</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="pressure_unit" value="pa">
                            <label class="form-check-label">Pa</label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3  font-weight-bold">Distance</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="distance_unit"  value="mm">
                            <label class="form-check-label">mm</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="distance_unit"  value="in" checked>
                            <label class="form-check-label">in</label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3  font-weight-bold">Time</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="time_format"  value="12" checked>
                            <label class="form-check-label">12 Hours</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="time_format" value="24">
                            <label class="form-check-label">24 Hours</label>
                        </div>
                    </div>
                </div>

                <!--Horizontal Lines Tab-->
                <div class="tab-pane fade bg-white shadow p-3" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <h2 id="navHeading" class="font-roboto">Horizontal Lines</h2>
                    <hr>
                        <div id="row1" class="form-group row">
                            <label for="inputPassword" class="mx-2 ml-3 col-form-label">Line Name</label>
                            <div>
                                <input type="text" class="form-control" id="inputPassword" placeholder="Alarm" name="graphLineName1">
                            </div>
                            <label for="inputPassword" class="mx-2 col-form-label">Line Value:</label>
                            <div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="27000" name="graphLineName2">
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
                                <input type="text" class="form-control" id="inputPassword" placeholder="Alarm" name="graphLineName1">
                            </div>
                            <label for="inputPassword" class="mx-2 col-form-label">Line Value:</label>
                            <div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="27000" name="graphLineName2">
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
                            <input id="showLegendsDiv" type="checkbox" class="form-check-input" value="">Plot Legends and Markers
                        </label>
                    </div>
                    <div id="legendsCheck" class="mt-3">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">Alarm
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="" >CutOff
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="" >Lift Lower
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="" >Lift Raise
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="" >Loss Motion
                            </label>
                        </div>
                    </div>

                        <script type="text/javascript">
                            $("#legendsCheck").hide();
                            $("#addRow").hide();
                            $("#showLegendsDiv").click(function(){
                                $("#legendsCheck").toggle();
                            });
                            $("#delRow1").click(function(){
                                $("#row1").hide();
                                $("#addRow").show();
                            });
                            $("#delRow2").click(function(){
                                $("#row2").hide();
                                $("#addRow").show();
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
                        <div class="card">
                            <div class="card-header text-dark font-roboto">
                                Customize Dashboard
                            </div>
                            <div class="card-body">
                                <div class="modal-body pt-0">
                                    <div id="accordion">
                                        <!--Select Sections Card-->
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                                    <i class="fa" aria-hidden="true"></i> Select Sections
                                                </a>
                                            </div>
                                            <?php
                                            $sql = "SELECT * FROM custom_sections WHERE device_id=$device_id";
                                            $res = mysqli_query($con, $sql);
                                            $mainRow = mysqli_fetch_array($res);
                                            $graphTitle = $mainRow["graph_title"];
                                            ?>
                                            <div id="collapseOne" class="collapse show">
                                                <div class="card-body">
                                                    <form action="" method="POST">
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
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-6 mx-auto">
                                                                    <button class="btn btn-primary w-100" type="submit" name="custom_sections">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                            $sql = "SELECT * FROM custom_devicestatus WHERE device_id=$device_id";
                                            $res = mysqli_query($con, $sql);
                                            $mainRow = mysqli_fetch_array($res);
                                            ?>
                                            <div id="collapseTwo" class="collapse">
                                                <div class="card-body">
                                                    <form action="" method="POST">
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
                                                        <input type="hidden" name="abcda" value="asdafafsdfd">
                                                        <div class="row">
                                                            <div class="col-md-6 mx-auto">
                                                                <button class="btn btn-primary w-100" type="submit" name="device_status">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!--Torque Gauge Customization Card-->
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                                    <i class="fa" aria-hidden="true"></i>  Torque Gauge Configurations
                                                </a>
                                            </div>
                                            <?php
                                            $sql = "SELECT * FROM user_and_devices WHERE id=$device_id";
                                            $res = mysqli_query($con, $sql);
                                            $mainRow = mysqli_fetch_array($res);
                                            ?>
                                            <div id="collapseThree" class="collapse">
                                                <div class="card-body">
                                                    <form action="" method="POST">
                                                        <div class="form-group">
                                                            <label for="email1" class="text-dark">Enter Meter values <mark><i>in given format</i></mark></label>
                                                            <input name="ranges" type="text" class="form-control" id="email1" value="<?php echo $mainRow["meter_ranges"]; ?>" placeholder="0,2500,5000,7500,10000,12500,15000,175000,20000,22500,25000,27500,30000" required>
                                                        </div>
                                                        <p>Set Color Levels</p>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="">0 - </span>
                                                                    </div>
                                                                    <input onkeyup="func1()" id="box111" type="text" class="form-control" placeholder="Range" name="rng1"  value="<?php echo $mainRow["meter_range_1"]; ?>">
                                                                    <input type="text" class="form-control" placeholder="Color" name="clr1" value="<?php echo $mainRow["meter_color_1"]; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <p class="input-group-text" id="ffff"><span id="r2">0</span> - </p>
                                                                    </div>
                                                                    <input onkeyup="func2()" id="box2222" type="text" class="form-control" placeholder="Range" name="rng2" value="<?php echo $mainRow["meter_range_2"]; ?>">
                                                                    <input type="text" class="form-control" placeholder="Color" name="clr2" value="<?php echo $mainRow["meter_color_2"]; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <p class="input-group-text" id="eeee"><span id="r3">0</span> - </p>
                                                                    </div>
                                                                    <input id="box3" type="text" class="form-control" placeholder="Range" name="rng3" value="<?php echo $mainRow["meter_range_3"]; ?>">
                                                                    <input type="text" class="form-control" placeholder="Color" name="clr3" value="<?php echo $mainRow["meter_color_3"]; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mx-auto">
                                                                <button type="submit" class="btn btn-primary w-100 mt-3" name="torque_gauge">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                            $sql = "SELECT * FROM custom_graph WHERE device_id=$device_id";
                                            $res = mysqli_query($con, $sql);
                                            $mainRow = mysqli_fetch_array($res);
                                            ?>
                                            <div id="collapseFour" class="collapse">
                                                <div class="card-body">
                                                    <form method="POST" action="">
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
                                                            <div class="col-6 mx-auto">
                                                                <button class="btn btn-primary w-100" name="graph_settings">
                                                                    Update
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                            $sql = "SELECT * FROM custom_installation_info WHERE device_id=$device_id";
                                            $res = mysqli_query($con, $sql);
                                            $mainRow = mysqli_fetch_array($res);
                                            ?>
                                            <div id="collapseFive" class="collapse">
                                                <div class="card-body">
                                                    <form action="" method="POST">
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
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-6 mx-auto">
                                                                    <button class="btn btn-primary w-100" name="installation_info">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                            $sql = "SELECT * FROM custom_alerts WHERE device_id=$device_id";
                                            $res = mysqli_query($con, $sql);
                                            $mainRow = mysqli_fetch_array($res);
                                            ?>
                                            <div id="collapseSix" class="collapse">
                                                <div class="card-body">
                                                    <form action="" method="POST">
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
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-6 mx-auto">
                                                                    <button class="btn btn-primary w-100" name="alerts_settings">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                            $sql = "SELECT * FROM custom_maintenance WHERE device_id=$device_id";
                                            $res = mysqli_query($con, $sql);
                                            $mainRow = mysqli_fetch_array($res);
                                            ?>
                                            <div id="collapseSeven" class="collapse">
                                                <div class="card-body">
                                                    <form action="" method="POST">
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
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-6 mx-auto">
                                                                    <button class="btn btn-primary w-100" name="maintenance_update">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
</div>

<!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>


</body>

</html>
