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
        <img src="assets/imgs/dbs.png" alt="">
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
    <div>
        <h3 class="justify-content-center">Maintenance History</h3>
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
    <div>
        <h3 class="justify-content-center mt-3">Alerts</h3>
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
    <div class="d-flex justify-content-end">
        <a href="report1.php" class="btn btn-danger">Download PDF</a>
    </div>
</div>

</body>
</html>