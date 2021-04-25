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

    <body>
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
                                                            <input type="text" class="form-control" value="<?php echo $mainRow["graph_title"]; ?>" name="graph_title">
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
                                print_r($mainRow);
                                ?>
                                <div id="collapseTwo" class="collapse">
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="row set_font_roboto">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?php  echo $mainRow["1"]; ?>"
                                                               name="a1">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Position Lift Bar
                                                        </label>
                                                    </div><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?php  echo $mainRow["3"]; ?>"
                                                               name="a3">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Alarm Flag
                                                        </label>
                                                    </div><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?php  echo $mainRow["5"]; ?>"
                                                               name="a5">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            CutOff Flag
                                                        </label>
                                                    </div><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?php  echo $mainRow["7"]; ?>"
                                                               name="a7">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Lift Active Flag
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?php  echo $mainRow["2"]; ?>"
                                                               name="a2">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Water in Oil Flag
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?php  echo $mainRow["4"]; ?>"
                                                               name="a4">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Low Oil Flag
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?php  echo $mainRow["6"]; ?>"
                                                               name="a6">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            LOSS MOTION
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?php  echo $mainRow["8"]; ?>"
                                                               name="a8">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Display Temperature
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
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
                                <div id="collapseThree" class="collapse">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="email1" class="text-dark">Enter Meter values <mark><i>in given format</i></mark></label>
                                            <input name="ranges" type="text" class="form-control" id="email1" placeholder="0,2500,5000,7500,10000,12500,15000,175000,20000,22500,25000,27500,30000" required>
                                        </div>
                                        <p>Set Color Levels</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">0 - </span>
                                                    </div>
                                                    <input onkeyup="func1()" id="box1" type="text" class="form-control" placeholder="Range" name="rng1">
                                                    <input type="text" class="form-control" placeholder="Color" name="clr1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id=""><span id="r2">0</span> - </span>
                                                    </div>
                                                    <input onkeyup="func2()" id="box2" type="text" class="form-control" placeholder="Range" name="rng2">
                                                    <input type="text" class="form-control" placeholder="Color" name="clr2">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id=""><span id="r3">0</span> - </span>
                                                    </div>
                                                    <input id="box3" type="text" class="form-control" placeholder="Range" name="rng3">
                                                    <input type="text" class="form-control" placeholder="Color" name="clr3">
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
                                <div id="collapseFour" class="collapse">
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Graph Title</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Graph Line Name</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Line Color</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="#fffff">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Y axis Unit</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="FT-LBS">
                                                    </div>
                                                </div>
                                                <div class="col-6 mx-auto">
                                                    <button class="btn btn-primary w-100">
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
                                <div id="collapseFive" class="collapse">
                                    <div class="card-body">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Drive Model">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Driver Continuous Rating">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Output Speed">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Electric Motor Rake">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Electric Motor Lift">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="In Service Since">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Driver SN">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="End User">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Installation">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Process">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Basin Size (diameter)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6 mx-auto">
                                                        <button class="btn btn-primary w-100">Update</button>
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
                                <div id="collapseSix" class="collapse">
                                    <div class="card-body">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Today">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Last Month">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Last 7 Days">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Last Six Months">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6 mx-auto">
                                                        <button class="btn btn-primary w-100">Update</button>
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
                                <div id="collapseSeven" class="collapse">
                                    <div class="card-body">
                                        <formd action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked name="abc">
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Last Oil Change (main gear)">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Driver Continuous Rating">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Next Schedule Service">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Last Repair(INC #)">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Next Oil Change (main gear):">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Next Oil Change (lift PU)">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="DBS Warranty">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="Parts Repaired">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6 mx-auto">
                                                        <button class="btn btn-primary w-100">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </formd>
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
            $("#r2").text($("#box1").val());
        }
        function func2(){
            $("#r3").text($("#box2").val());
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
            alerts_title='$alerts_title', maintenance_check='$maintenance_check', maintenance_title='$maintenance_title' WHERE device_id='$device_id'";
    runQuery($sql, 'Sections Selection Updated!');
}

if(isset($_POST['device_status'])){
    print_R($_POST);
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $a4 = $_POST['a4'];
    $a5 = $_POST['a5'];
    $a6 = $_POST['a6'];
    $a7 = $_POST['a7'];
    $a8 = $_POST['a8'];

    $sql = "UPDATE custom_devicestatus SET 1='$a1', 2='$a2',
            3='$a3', 4='$a4', 5='$a5', 6='$a6',
            7='$a7', 8='$a8' WHERE device_id='$device_id'";
    runQuery($sql, 'Device Status status Updated!');
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