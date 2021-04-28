<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require '../app/db.php';

$id = $_GET["id"];
$sql = "SELECT * FROM user_and_devices WHERE id=$id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);
//print_r($row);
$mac = $row["mac"];

$sql1 = "SELECT * FROM recorded_values WHERE mac='$mac' ORDER BY id  DESC LIMIT 1";

$res1 = mysqli_query($con, $sql1);

$obj = array();
if (mysqli_num_rows($res1)) {
    $row = mysqli_fetch_array($res1);
        array_push($obj, $row["leftPosition_verticalBar"]);
}
echo json_encode($obj);
?>
