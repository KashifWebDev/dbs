<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  require '../app/db.php';


  date_default_timezone_set("Asia/Karachi");
  $now = new DateTime();
  $cur_time=$now->format('Y-m-d H:i:s');

  $data = json_decode(file_get_contents("php://input"));

    $mac = $data->Machine_MAC == '' ? 0 : $data->Machine_MAC;
    $Alarm = $data->Alarm == '' ? 0 : $data->Alarm;
    $Cutoff = $data->Cutoff == '' ? 0 : $data->Cutoff;
    $Lift = $data->Lift == '' ? 0 : $data->Lift;
    $Water = $data->Water == '' ? 0 : $data->Water;
    $Oil = $data->Oil == '' ? 0 : $data->Oil;
    $Motion = $data->Motion == '' ? 0 : $data->Motion;
    $Temp1 = $data->Temp1 == '' ? 0 : $data->Temp1;
    $Temp2 = $data->Temp2 == '' ? 0 : $data->Temp2;
    $Torque = $data->Torque == '' ? 0 : $data->Torque;

    $sql = "INSERT INTO recorded_values (mac, alarm_cirlcleVal, cutOff_cirlcleVal, liftActive_cirlcleVal,
            waterInOil_cirlcleVal, lowOil_cirlcleVal, lossMotion_cirlcleVal,
             leftPosition_verticalBar, oilTemp_verticalBar, temp1, temp2, temp3, Torque, date_time)
            VALUES ('".$mac."', '".$Alarm."', '".$Cutoff."', '".$Lift."',
              '".$Water."', '".$Oil."', '".$Motion."',
              '".$Temp1."', '".$Temp2."', '".$Temp1."', '".$Temp2."', 0, '".$Torque."', '".$cur_time."')";
    // echo $sql; die(); exti();
    if(mysqli_query($con, $sql)){
            echo json_encode(
                  array(
                      'Response' => 'ACK'
                  )
                );
    } else{
            echo json_encode(
                  array(
                      'Response' => 'NACK',
                      'Msg' => mysqli_error($con)
                  )
                );
    }
    mysqli_close($con);

?>
