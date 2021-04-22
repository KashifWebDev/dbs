<?php

require 'app/db.php';
//$_SESSION["darkTheme"] = 1;

function secure_parameter($parm){
    $parm = trim($parm);
    //$parm = mysqli_real_escape_string($parm);
    $parm = htmlentities($parm);
    $parm = strip_tags($parm);
    return $parm;
}

function check_session(){
    if(!isset($_SESSION['status'])){
        header("Location: ".$GLOBALS['project_path']."index.php?err=SessionOut");
        die();
    }
}


function js_redirect($url){
    echo '
        <script>
            window.location.href = "'.$url.'";
        </script>
    ';
}

function verify_is_admin(){
    if(!$_SESSION["is_admin"]){
        js_redirect('user_dashboard.php');
    }
}

function js_alert($msg){
    echo '
        <script>
            alert("'.$msg.'");
        </script>
    ';
}
?>