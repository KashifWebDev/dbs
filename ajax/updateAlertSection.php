<?php
require "../app/db.php";

if(isset($_POST["mac"])){
    $m = $_POST["mac"];
    $deviceID = $_POST["deviceID"];




                        $sql = "SELECT * FROM alerts WHERE device_id=$deviceID ORDER By id DESC";
                        $res = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($res);


                        $sql = "SELECT * FROM recorded_values WHERE mac='$m' ORDER By id DESC";
                        $res = mysqli_query($con, $sql);
                        $recordedValues = mysqli_fetch_array($res);




                        if(!($recordedValues["legends1"]>=$row["start1"]) || !($recordedValues["legends1"]<=$row["end1"])){
                        echo '
                        <tr class="alert_info_bg_redddd">
                            <td><span class="font-weight-bold">Digital 1 alarm</span>  </td>
                            <td class="text-left">'.$recordedValues["date_time"].'</td>
                        </tr> ';
                         }
                        if(!($recordedValues["legends2"]>=$row["start2"]) || !($recordedValues["legends2"]<=$row["end2"])){
                            echo '
                        <tr class="alert_info_bg_redddd">
                            <td><span class="font-weight-bold">Digital 2 alarm</span>  </td>
                            <td class="text-left">'.$recordedValues["date_time"].'</td>
                        </tr> ';
                         }
                        if(!($recordedValues["legends3"]>=$row["start3"]) || !($recordedValues["legends3"]<=$row["end3"])){
                            echo '
                        <tr class="alert_info_bg_redddd">
                            <td><span class="font-weight-bold">Digital 3 alarm</span>  </td>
                            <td class="text-left">'.$recordedValues["date_time"].'</td>
                        </tr> ';
                        }
                        if(!($recordedValues["legends4"]>=$row["start4"]) || !($recordedValues["legends4"]<=$row["end4"])){
                            echo '
                        <tr class="alert_info_bg_redddd">
                            <td><span class="font-weight-bold">Digital 4 alarm</span>  </td>
                            <td class="text-left">'.$recordedValues["date_time"].'</td>
                        </tr> ';
                         }

                        if(!($recordedValues["legends5"]>=$row["start5"]) || !($recordedValues["legends5"]<=$row["end5"])){
                        echo '
                        <tr class="alert_info_bg_redddd">
                            <td><span class="font-weight-bold">Digital 5 alarm</span>  </td>
                            <td class="text-left">'.$recordedValues["date_time"].'</td>
                        </tr> ';
                         }
                        if(!($recordedValues["legends6"]>=$row["start6"]) || !($recordedValues["legends6"]<=$row["end6"])){
                        echo '
                        <tr class="alert_info_bg_redddd">
                            <td><span class="font-weight-bold">Digital 6 alarm</span>  </td>
                            <td class="text-left">'.$recordedValues["date_time"].'</td>
                        </tr> ';
                        }
}
?>