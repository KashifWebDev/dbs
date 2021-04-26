<?php
require 'app/main.php';
session_start();
verify_is_admin();

$device_id = isset($_GET["id"]) ? $_GET["id"] : null;
$_SESSION['currentPath'] = "./";
?>
    <!DOCTYPE html>
    <html lang="en">

    <?php require 'app/head.include.php'; ?>

    <body onload="onLoadFunction()">
    <!-- Navigation -->
    <?php require 'app/nav.include.php'; ?>


    <style>
        [data-toggle="collapse"] .fa:before {
            content: "\f139";
        }

        [data-toggle="collapse"].collapsed .fa:before {
            content: "\f13a";
        }

    </style>
    <!-- Page Content -->
    <div class="container font-roboto">
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

    <!-- Bootstrap core JavaScript -->
    <?php require 'app/footer.include.php'; ?>

    </body>

    <script>
        function func1(){
            var name = document.getElementById("box111").value;
            var span = document.getElementById("ffff");
            name = name + ' - ';
            span.textContent = name;
            span.innerHTML = name;
            console.log(name);
        }
        function func2(){
            var name = document.getElementById("box2222").value;
            var span = document.getElementById("eeee");
            name = name + ' - ';
            span.textContent = name;
            span.innerHTML = name;
            console.log(name);
        }
        function onLoadFunction(){
            var name = document.getElementById("box111").value;
            var span = document.getElementById("ffff");
            name = name + ' - ';
            span.textContent = name;
            span.innerHTML = name;
            var name = document.getElementById("box2222").value;
            var span = document.getElementById("eeee");
            name = name + ' - ';
            span.textContent = name;
            span.innerHTML = name;

        }
    </script>

    </html>


<?php
if(isset($_POST['custom_sections'])){
    $device_settings_check = $_POST['device_settings_check'];
    $device_settings_title = $_POST['device_settings_title'];
    $torque_gauge_check = $_POST['torque_gauge_check'];
    $torque_title = $_POST['torque_title'];
    $graph_check = $_POST['graph_check'];
    $graph_title = $_POST['graph_title'];
    $installation_info_check = $_POST['installation_info_check'];
    $installation_info_title = $_POST['installation_info_title'];
    $alerts_check = $_POST['alerts_check'];
    $alerts_title = $_POST['alerts_title'];
    $maintenance_check = $_POST['maintenance_check'];
    $maintenance_title = $_POST['maintenance_title'];

    $sql = "UPDATE custom_sections SET device_settings_check='$device_settings_check', device_settings_title='$device_settings_title',
            torque_gauge_check='$torque_gauge_check', torque_title='$torque_title', graph_check='$graph_check', graph_title='$graph_title',
            installation_info_check='$installation_info_check', installation_info_title='$installation_info_title', alerts_check='$alerts_check',
            alerts_title='$alerts_title', maintenance_check='$maintenance_check', maintenance_title='$maintenance_title' WHERE device_id= $device_id";



    runQuery($sql, 'Sections Selection Updated!');
}

if(isset($_POST['device_status'])){
    print_r($_POST);
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $a4 = $_POST['a4'];
    $a5 = $_POST['a5'];
    $a6 = $_POST['a6'];
    $a7 = $_POST['a7'];
    $a8 = $_POST['a8'];

    $sql = "UPDATE custom_devicestatus SET a1='$a1', a2='$a2',
            a3='$a3', a4='$a4', a5='$a5', a6='$a6',
            a7='$a7', a8='$a8' WHERE device_id=$device_id";
    runQuery($sql, 'Device Status Updated!');
}

if(isset($_POST["torque_gauge"])){

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
}

if(isset($_POST["graph_settings"])){
    $graph_title = $_POST["graph_title"];
    $line_name = $_POST["line_name"];
    $line_color = $_POST["line_color"];
    $y_unit = $_POST["y_unit"];

    $sql = "UPDATE custom_graph SET
            graph_title='$graph_title', line_name='$line_name', line_color='$line_color', y_unit='$y_unit'
            WHERE device_id= $device_id";

    mysqli_query($con, "UPDATE custom_sections SET graph_title='$graph_title' ");

    runQuery($sql, 'Graph Settings updated');
}

if(isset($_POST["installation_info"])){
    $drive_model_check = $_POST["drive_model_check"];
    $drive_model_title = $_POST["drive_model_title"];
    $drive_rating_check = $_POST["drive_rating_check"];
    $drive_rating_title = $_POST["drive_rating_title"];
    $drive_speed_check = $_POST["drive_speed_check"];
    $drive_speed_title = $_POST["drive_speed_title"];
    $drive_motor_check = $_POST["drive_motor_check"];
    $drive_motor_title = $_POST["drive_motor_title"];
    $drive_lift_check = $_POST["drive_lift_check"];
    $drive_lift_title = $_POST["drive_lift_title"];
    $drive_service_check = $_POST["drive_service_check"];
    $drive_service_title = $_POST["drive_service_title"];
    $driver_sn_check = $_POST["driver_sn_check"];
    $driver_sn_title = $_POST["driver_sn_title"];
    $driver_user_check = $_POST["driver_user_check"];
    $driver_user_title = $_POST["driver_user_title"];
    $driver_installation_check = $_POST["driver_installation_check"];
    $driver_installation_title = $_POST["driver_installation_title"];
    $driver_process_check = $_POST["driver_process_check"];
    $driver_process_title = $_POST["driver_process_title"];
    $driver_size_check = $_POST["driver_size_check"];
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
}

if(isset($_POST["alerts_settings"])){
    $today_check = $_POST["today_check"];
    $today_title = $_POST["today_title"];
    $last_7_check = $_POST["last_7_check"];
    $last_7_title = $_POST["last_7_title"];
    $last_mnth_check = $_POST["last_mnth_check"];
    $last_mnth_title = $_POST["last_mnth_title"];
    $last_6mnth_check = $_POST["last_6mnth_check"];
    $last_6mnth_title = $_POST["last_6mnth_title"];

    $sql = "UPDATE custom_alerts SET today_check='$today_check', today_title='$today_title',last_7_check='$last_7_check',
            last_7_title='$last_7_title', last_mnth_check='$last_mnth_check', last_mnth_title='$last_mnth_title',
            last_6mnth_check='$last_6mnth_check', last_6mnth_title='$last_6mnth_title'
            WHERE device_id=$device_id";
    runQuery($sql, 'Alerts settings Updated!');
}

if(isset($_POST["maintenance_update"])){
    $last_oil_change_main_check = $_POST["last_oil_change_main_check"];
    $last_oil_change_main_title = $_POST["last_oil_change_main_title"];
    $next_oil_change_main_check = $_POST["next_oil_change_main_check"];
    $next_oil_change_main_title = $_POST["next_oil_change_main_title"];
    $last_oil_lift_check = $_POST["last_oil_lift_check"];
    $last_oil_lift_title = $_POST["last_oil_lift_title"];
    $next_oil_lift_check = $_POST["next_oil_lift_check"];
    $next_oil_lift_title = $_POST["next_oil_lift_title"];
    $next_service_check = $_POST["next_service_check"];
    $next_service_title = $_POST["next_service_title"];
    $dbs_warranty_check = $_POST["dbs_warranty_check"];
    $dbs_warranty_title = $_POST["dbs_warranty_title"];
    $last_repair_check = $_POST["last_repair_check"];
    $last_repair_title = $_POST["last_repair_title"];
    $parts_repaired_check = $_POST["parts_repaired_check"];
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
    runQuery($sql, 'Maintenance Settings Updated!');
}

function runQuery($sql, $msg){
    require 'app/db.php';
    $actual_link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $actual_link = $_SERVER['REQUEST_URI'];
    if(mysqli_query($con, $sql)){
        js_alert($msg);
        js_redirect($actual_link);
    }else{
        echo '<script>alert("Error! '.mysqli_error($con).'");</script>';
    }
}
?>