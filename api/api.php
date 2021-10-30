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



$sql = "SELECT * FROM devices WHERE mac='$mac'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);
$device_id = $row["id"];

$sql = "SELECT * FROM alerts WHERE device_id=$device_id ORDER By id DESC";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);


$sql = "SELECT * FROM custom_dashboards WHERE device_id=$device_id";
$res = mysqli_query($con, $sql);
$email = mysqli_fetch_array($res);

if(!$D1>=$row["start1"] || !$D1<=$row["end1"]){
    sendMail($email["email"], "Digital 1");
}
if(!$D1>=$row["start2"] || !$D1<=$row["end2"]){
    sendMail($email["email"], "Digital 2");
}
if(!$D1>=$row["start3"] || !$D1<=$row["end3"]){
    sendMail($email["email"], "Digital 3");
}
if(!$D1>=$row["start4"] || !$D1<=$row["end4"]){
    sendMail($email["email"], "Digital 4");
}
if(!$D1>=$row["start5"] || !$D1<=$row["end5"]){
    sendMail($email["email"], "Digital 5");
}
if(!$D1>=$row["start6"] || !$D1<=$row["end6"]){
    sendMail($email["email"], "Digital 6");
}


    $sql = "INSERT INTO recorded_values (mac, legends1, legends2, legends3, legends4, legends5, legends6, t1, t2, t3, t4, r1, r2, r3, r4, l1, l2, l3, l4, analogue1, analogue2, analogue3, analogue4, analogue5, analogue6,
            c1, c2, co1, co2, tor1, tor2, date_time)
            VALUES ('$mac', $D1, $D2, $D3, $D4, $D5, $D6, $T1, $T2, $T3, $T4, $R1, $R2, $R3, $R4, $L1, $L2, $L3, $L4, $A1, $A2, $A3, $A4, $A5, $A6,
            $C1, $C2, $Col1, $Col2, $Tor1, $Tor2, '$dateNow')";
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


    function sendMail($to, $parameter){
        $msg = '
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:40px 0 30px 0;background:#0070c1;">
              <img src="../assets/logo/dbs.png" alt="" width="300" style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">
                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Hello!</h1>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                      It is to inform you that the parameter <b>'.$parameter.'</b> exceeded from the configured value. <br><br>
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:#0070c1;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="left">
                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                      &reg; DBS, 2021<br/>
                    </p>
                  </td>
                  <td style="padding:0;width:50%;" align="right">
                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        mail($to, "Alert form DBS Dashboard for $parameter", $msg, $headers);
    }
?>
