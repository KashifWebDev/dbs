<?php
require "../app/db.php";

if(isset($_POST["mac"])){
    $m = $_POST["mac"];
    $sql = "SELECT * FROM recorded_values where mac='$m' ORDER BY id DESC LIMIT 1;";
//    $sql = "SELECT * FROM user_and_devices where machine_mac='$m'";
    //echo "query: ".$sql."<br>";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res)){
        $row = mysqli_fetch_array($res);
        $id = $row["id"];
        $db_time = $row['date_time'];
//        echo "CurrentID: ".$id."     Full time: ".$db_time."<br><br>";
        $date_time = explode(" ", $row["date_time"]);
        $date_time = $date_time[1];

$output = "";
$alarm = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-success mt-1 ml-2 mr-1"></span>
                                <span>No Alarms</span>';



        date_default_timezone_set("America/New_York");
        $now = new DateTime();
        $cur_time=$now->format('H:i:s');

        $plustime = date("H:i:s", (strtotime($date_time) + 420));
//        echo 'Current: '.$cur_time.'<br>'.'Database: '.$date_time.'<br>'.'+10sec: '.$plustime;

        if($plustime>$cur_time){
//            echo "yes";
            $output = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-success mt-1 mr-1"></span>
                                    <span>Online</span>';
        }else{
            $output = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 mr-1"></span>
                                    <span>Offline</span>';
        }
    }else{
        $output = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 mr-1"></span>
                                    <span>Offline</span>';
    }

    $sql = "SELECT id FROM devices WHERE mac='$m'";
    $res = mysqli_query($con, $sql);
    $deviceID = mysqli_fetch_array($res);
    $device_id = $deviceID["id"];

    $sql = "SELECT * FROM alerts WHERE device_id=$device_id ORDER By id DESC";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);


    $sql = "SELECT * FROM recorded_values WHERE mac='$m' ORDER By id DESC";
    $res = mysqli_query($con, $sql);
    $recordedValues = mysqli_fetch_array($res);


    if(!($recordedValues["legends1"]>=$row["start1"]) || !($recordedValues["legends1"]<=$row["end1"])) {
        $alarm = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 ml-2 mr-1"></span>
                                <span>Digital 1</span>';
    }
    if(!($recordedValues["legends2"]>=$row["start2"]) || !($recordedValues["legends2"]<=$row["end2"])) {
        $alarm = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 ml-2 mr-1"></span>
                                <span>Digital 2</span>';
    }
    if(!($recordedValues["legends3"]>=$row["start3"]) || !($recordedValues["legends3"]<=$row["end3"])) {
        $alarm = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 ml-2 mr-1"></span>
                                <span>Digital 3</span>';
    }
    if(!($recordedValues["legends4"]>=$row["start4"]) || !($recordedValues["legends4"]<=$row["end4"])) {
        $alarm = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 ml-2 mr-1"></span>
                                <span>Digital 4</span>';
    }
    if(!($recordedValues["legends5"]>=$row["start5"]) || !($recordedValues["legends5"]<=$row["end5"])) {
        $alarm = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 ml-2 mr-1"></span>
                                <span>Digital 5</span>';
    }
    if(!($recordedValues["legends6"]>=$row["start6"]) || !($recordedValues["legends6"]<=$row["end6"])) {
        $alarm = '<span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 ml-2 mr-1"></span>
                                <span>Digital 6</span>';
    }


}
else{
    $output = '<span class="active_status_offline">MAC not found</span>';
}





$output .= $alarm;

echo $output;

?>