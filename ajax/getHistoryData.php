<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require '../app/db.php';
session_start();

$id = $_GET["device_id"];
$start = $_GET["start"];
$end = $_GET["end"];

$sql = "SELECT * FROM devices WHERE id=$id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);
$mac = $row["mac"];

$obj = array();

$sql1 = "SELECT * FROM (
            SELECT * FROM recorded_values
            WHERE  mac='$mac' AND  DATE(date_time) >= '$start' AND DATE(date_time) <= '$end'
            ORDER BY id DESC
        ) sub
        ORDER BY id ASC";

$sql1 = "SELECT * FROM recorded_values
            WHERE  mac='$mac' AND  DATE(date_time) >= '$start' AND DATE(date_time) <= '$end'";
//echo $sql1; die();
$res = mysqli_query($con, $sql1);
while($row = mysqli_fetch_array($res)) {
    $time = get_time($row["date_time"]);
    $date = get_date($row["date_time"]);

    $date_time = $date.' ('.$time.')';
    $element = array(
         $date_time,
        $row["tor1"],
        $row["analogue1"],
        $row["analogue2"],
        $row["analogue3"],
        $row["analogue4"],
        $row["analogue5"],
        $row["analogue6"]
    );
    array_push($obj,$element);
}

echo json_encode($obj);


function get_date($timestamp){
    $new_time = explode(" ",$timestamp);
    return $new_time[0];
}
function get_time($timestamp){
    $new_time = explode(" ",$timestamp);
    if(isset($_SESSION["time-24"]) && $_SESSION["time-24"]===true){
        $time = date("H:i", strtotime($new_time[1]));
//        $time = date("g:i a", strtotime($new_time[1]));
    }else{
        $time = date("g:i a", strtotime($new_time[1]));
    }
    return $time;
}
?>
