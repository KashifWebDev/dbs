<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_dbs";


$servername = "server127.web-hosting.com";
$username = "turkvjwp_fingerprinttest";
$password = "fingerprinttest";
$dbname = "turkvjwp_dbs";




$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){ ?>

    <div class="container error_con">
        <div class="alert alert-danger">
            <div style="text-align: center;">
                <b>*****!! DATABASE CONNECTION FAILED !!*****</b><hr>
                <strong>Error!</strong> There's a problem connecting with database. <a href="#">Report to Fix. </a>Sorry for inconvenient.
            </div>
        </div>
    </div>
    <?php
}
?>
