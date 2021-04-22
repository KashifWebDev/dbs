<?php
//echo $_SESSION["darkTheme"];
session_start();
if ($_SESSION["darkTheme"] == 0){
    $_SESSION["darkTheme"] = 1;
}else{
    $_SESSION["darkTheme"] = 0;
}
header('Location: '.$_SERVER['HTTP_REFERER']);
?>