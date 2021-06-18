<?php
session_start();
$dateTime = $date = date('Y-m-d H:i:s');

//$session = json_decode($_GET["session"]);
//$session = json_decode($_GET["session"]);
//$uname = $session->username;
//$uname = isset($session["username"]) ? $session["username"] : "user";
//$uname = $session["username"];


$uname = isset($_SESSION["username"]) ? $_SESSION["username"] : "user";
$uname = $_SESSION["username"];
$device_id = 48;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom_css/report.css?v=<?php echo rand(); ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom_css/main.css?v=<?php echo rand(); ?>" rel="stylesheet">

    <title>Report</title>
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-center">
        <img style="width: 350px !important;" src="assets/imgs/dbs.png" alt="">
    </div>
    <div class="d-flex justify-content-between align-items-end font-roboto mt-3">
        <p>
            <span class="font-weight-bold">Date: </span> <?php echo $dateTime; ?>
        </p>
        <h2 class="font-roboto">Device Report</h2>
        <p>
            <span class="font-weight-bold">User: </span> <span><?php echo $uname; ?></span>
        </p>
    </div>
    <hr>
    <?php
        if(isset($_POST["1"]) && $_POST["1"] == "on"){
    ?>
    <div>
        <h3 class="d-flex justify-content-center mb-3 font-roboto">Installation Information</h3>
        <?php
        require_once 'app/db.php';
        $sql = "SELECT * FROM custom_installation_info WHERE device_id=$device_id";
        $res = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_array($res);

        $sql = "SELECT * FROM devices WHERE id=$device_id";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
        $mac = $row["mac"];
        $sql = "SELECT * FROM installation_info WHERE mac='$mac'";
        $res = mysqli_query($con, $sql);
        $installationInfo = mysqli_fetch_array($res);
        ?>
        <table class="text-dark-grey bar_font_size auto_color_txt table table-striped">
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
                </tr>
            <?php }
            ?>
        </table>
    </div>
    <?php
        }
        if(isset($_POST["2"]) && $_POST["2"] == "on"){
    ?>
    <div>
        <h3 class="d-flex justify-content-center my-3 font-roboto">Maintenance History</h3>
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
            <hr>
            <br>
            <tbody>
            <?php
            require_once 'app/db.php';
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
    <?php
        }
    if(isset($_POST["3"]) && $_POST["3"] == "on"){
    ?>
    <div>
        <h3 class="d-flex justify-content-center my-3 font-roboto">Alerts</h3>
        <hr>
        <table class="text-dark-grey auto_color_txt">
            <?php

            $sql = "SELECT * FROM custom_alerts WHERE device_id=$device_id";
            $res = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($res);
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
        <?php
    }
    ?>
    <?php
    if(isset($_POST["4"]) && $_POST["4"] == "on"){
    ?>
    <div>
        <h3 class="d-flex justify-content-center my-3 font-roboto">Parameters Data</h3>
        <hr>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Data ID</th>
                <th scope="col">Torque</th>
                <th scope="col">Temperature 1</th>
                <th scope="col">Temperature 2</th>
                <th scope="col">Temperature 3</th>
                <th scope="col">Date & Time</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $start = $_POST["startDate"];
            $end = $_POST["endDate"];
            $sql = "select * from recorded_values where DATE(date_time) >= '$start' AND DATE(date_time) <= '$end'";
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["Torque"]; ?></td>
                <td><?php echo $row["temp1"]; ?></td>
                <td><?php echo $row["temp2"]; ?></td>
                <td><?php echo $row["temp3"]; ?></td>
                <td><?php echo date("d-M-Y h:i:sa", strtotime($row["date_time"])); ?></td>
            </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
        <?php
    }
    $a1 = isset($_POST["1"]) ? $_POST["1"] : "";
    $a2 = isset($_POST["2"]) ? $_POST["2"] : "";
    $a3 = isset($_POST["3"]) ? $_POST["3"] : "";
    $a4 = isset($_POST["4"]) ? $_POST["4"] : "";
    ?>
    <div class="d-flex justify-content-end">
        <a href="report1.php" target="_blank" class="btn btn-danger font-roboto my-5">Download PDF</a>
    </div>
</div>

</body>
</html>