<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require '../app/db.php';

$id = $_GET["device_id"];
$sql = "SELECT * FROM user_and_devices WHERE id=$id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);
//print_r($row);
$mac = $row["mac"];

//$mac = $_GET["mac"];

//$sql1 = "SELECT * FROM recorded_values ORDER BY id  DESC LIMIT 1";
$sql1 = "SELECT * FROM recorded_values WHERE mac='$mac' ORDER BY id  DESC LIMIT 1";
//echo $sql1;

$res1 = mysqli_query($con, $sql1);
//print_r($record);

//$sql = "SELECT * FROM devices WHERE ID=$id";
//$result = mysqli_query($con, $sql);

$obj = array([], 'graph' => [], 'torque' => []);
if (mysqli_num_rows($res1)) {
    $row = mysqli_fetch_array($res1);
        $data = array(
            $row["alarm_cirlcleVal"],
            $row["cutOff_cirlcleVal"],
            $row["liftActive_cirlcleVal"],
            $row["waterInOil_cirlcleVal"],
            $row["lowOil_cirlcleVal"],
            $row["lossMotion_cirlcleVal"],
            $row["leftPosition_verticalBar"],
            $row["oilTemp_verticalBar"]
        );

        array_push($obj[0], $data);
        array_push($obj['torque'], $row['Torque']);

    $sql1 = "SELECT * FROM recorded_values WHERE mac='$mac' ORDER BY id  DESC LIMIT 10 ";
    $sql1 = "SELECT * FROM (
                SELECT * FROM recorded_values WHERE mac='$mac' ORDER BY id DESC LIMIT 10
            ) sub
            ORDER BY id ASC";
    $res = mysqli_query($con, $sql1);
    while($row = mysqli_fetch_array($res)) {
        $time = get_time($row["date_time"]);
        $date = get_date($row["date_time"]);
//        $time = $row["time_now"];
//        $date = $row["date_now"];
        $date_time = $date.' ('.$time.')';
        $element = array(
            "timeStamp" => $date_time,
            "temp1" => $row["temp1"],
            "torque" => $row["Torque"]
        );
        array_push($obj['graph'],$element);
    }
}
echo json_encode($obj);

function get_date($timestamp){
    $new_time = explode(" ",$timestamp);
    return $new_time[0];
}
function get_time($timestamp){
    $new_time = explode(" ",$timestamp);
    return date("g:i a", strtotime($new_time[1]));
}
?>
