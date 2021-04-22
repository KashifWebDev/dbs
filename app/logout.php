<?php
    $_SESSION["status"]="";
    $_SESSION["status"] = empty($_SESSION["status"]);
    session_unset();
    session_destroy();
    header("location: ../index.php?success=loggedOut");
?>