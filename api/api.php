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

//$mac = $data->Machine_MAC == '' ? 0 : $data->Machine_MAC;
$mac = $data->Machine_MAC;
$D1 = $data->D1 == '' ? 0 : $data->D1;
$D2 = $data->D2 == '' ? 0 : $data->D2;
$D3 = $data->D3 == '' ? 0 : $data->D3;
$D4 = $data->D4 == '' ? 0 : $data->D4;
$D5 = $data->D5 == '' ? 0 : $data->D5;
$D6 = $data->D6 == '' ? 0 : $data->D6;
$T1 = $data->T1 == '' ? 0 : $data->T1;
$T2 = $data->T2 == '' ? 0 : $data->T2;
$T3 = $data->T3 == '' ? 0 : $data->T3;
$T4 = $data->T4 == '' ? 0 : $data->T4;
$R1 = $data->R1 == '' ? 0 : $data->R1;
$R2 = $data->R2 == '' ? 0 : $data->R2;
$R3 = $data->R3 == '' ? 0 : $data->R3;
$R4 = $data->R4 == '' ? 0 : $data->R4;
$L1 = $data->L1 == '' ? 0 : $data->L1;
$L2 = $data->L2 == '' ? 0 : $data->L2;
$L3 = $data->L3 == '' ? 0 : $data->L3;
$L4 = $data->L4 == '' ? 0 : $data->L4;
$A1 = $data->A1 == '' ? 0 : $data->A1;
$A2 = $data->A2 == '' ? 0 : $data->A2;
$A3 = $data->A3 == '' ? 0 : $data->A3;
$A4 = $data->A4 == '' ? 0 : $data->A4;
$A5 = $data->A5 == '' ? 0 : $data->A5;
$A6 = $data->A6 == '' ? 0 : $data->A6;
$C1 = $data->C1 == '' ? 0 : $data->C2;
$C2 = $data->C2 == '' ? 0 : $data->C2;
$Col1 = $data->Col1 == '' ? 0 : $data->Col1;
$Col2 = $data->Col2 == '' ? 0 : $data->Col2;
$Tor1 = $data->Tor1 == '' ? 0 : $data->Tor1;
$Tor2 = $data->Tor2 == '' ? 0 : $data->Tor2;

$dateNow = date('Y-m-d h:i:s', time());

    $sql = "INSERT INTO recorded_values (mac, legends1, legends2, legends3, legends4, legends5, legends6, t1, t2, t3, t4, r1, r2, r3, r4, l1, l2, l3, l4, analogue1, analogue2, analogue3, analogue4, analogue5, analogue6,
            c1, c2, co1, co2, tor1, tor2, date_time, raw)
            VALUES ('$mac', $D1, $D2, $D3, $D4, $D5, $D6, $T1, $T2, $T3, $T4, $R1, $R2, $R3, $R4, $L1, $L2, $L3, $L4, $A1, $A2, $A3, $A4, $A5, $A6,
            $C1, $C2, $Col1, $Col2, $Tor1, $Tor2, '$dateNow', '$data')";
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
