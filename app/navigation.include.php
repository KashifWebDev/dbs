<?php
if (isset($_SESSION["darkTheme"]) && $_SESSION["darkTheme"] == 1){
    $navClass = "bg-dark";
    $txtColor = "text-light";
    $themeLinkText = "Light Theme";
}else{
    $navClass = "bg-light shadow";
    $txtColor = "text-dark";
    $themeLinkText = "Dark Theme";
}

$sql = "SELECT * FROM user_and_devices WHERE id=$device_id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);
$file = $row["manual"];
?>
<div class="py-3 <?php echo $navClass; ?> font-roboto">
    <div class="containerr">
        <div class="row">
            <div class="col d-flex justify-content-left ml-4">
                <img style="height: 40px;" src="assets/imgs/dbs.png">
                <ul class="navbar-nav" style="flex-direction: row;">
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="admin_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="app/changeTheme.php"><?php echo $themeLinkText; ?></a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?> btn"
                           type="button" data-toggle="modal" data-target="#user_settings_modal">
                            User Settings
                        </a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?> btn"
                           type="button" data-toggle="modal" data-target="#dashboard_settings_modal">
                            Dashboard Settings
                        </a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="app/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-3 d-flex justify-content-center top_btn_margin">
                <a class="btn text-white font-weight-bold border-0" href="<?php if($file) echo 'assets/manuals/'.$file; ?>"
                   style="background-color: #009cde; padding-top: 8px; height: fit-content;">
                    Download Report
                </a> &nbsp;&nbsp;
                <a class="btn text-white font-weight-bold border-0"
                   style="background-color: #009cde; padding-top: 8px; height: fit-content;">
                    Download Manual
                </a>&nbsp;&nbsp;
                <?php
                    if(isset($device_details_page) && $device_details_page){
                ?>
                <?php
                    }
                if($_SESSION['is_admin']){
                    ?>
<!--                    <button class="btn btn-info" data-toggle="modal" data-target="#addNewDevice">Installation Info</button>-->
               <?php
                }

                    ?>
            </div>
<!--            <div class="col-md-2 d-flex justify-content-center">-->
<!--                <img style="height: 40px;" src="assets/imgs/client.png">-->
<!--            </div>-->
        </div>
    </div>
</div>


<!-- Modal user_settings_modal -->
<div class="modal fade" id="user_settings_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Users Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $sql1 = "SELECT * FROM user_and_devices WHERE id= $device_id";
                $res1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_array($res1);
                $uid= $row1["user_id"];
                $sql1 = "SELECT * FROM users WHERE id= $uid";
                $res1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_array($res1);
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email" style="color: black;">Full Name:</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" id="email" value="<?php echo $row1['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" style="color: black;">Email address:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" value="<?php echo $row1['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd" style="color: black;">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd" value="<?php echo $row1['password']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" style="color: black;">Contact Number:</label>
                        <input type="text" class="form-control" name="contact" placeholder="+1 584 458 485" id="email" value="<?php echo $row1['contact']; ?>">
                    </div>
                    <input type="hidden" value="<?php echo $row1['id']; ?>" name="user_id">
                    <button type="submit" class="btn btn-primary" name="update_userr">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST["update_userr"])){
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $contact = $_POST["contact"];
    $user_id = $_POST["user_id"];
    $sql = "UPDATE users SET username='$name', email='$email', password='$password', contact='$contact' WHERE id=$user_id";
    if(mysqli_query($con, $sql)){
//                    header('Location: users.php');
        echo '
                        <script>window.location.replace("device-details.php?id='.$device_id.'");</script>
                    ';
    }else{
        echo '
                        <script>alert("'.mysqli_error($con).'")</script>
                    ';
    }
}
?>
<!-- Modal dashboard_settings_modal -->
<div class="modal fade" id="dashboard_settings_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dashboard Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $sql1 = "SELECT * FROM dashboard_units WHERE device_id= $device_id";
                $res1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_array($res1);
                ?>
                <form method="POST" action="">
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Temperature</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="temperature_unit" value="f" checked>
                            <label class="form-check-label" >°F</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="temperature_unit"  value="c">
                            <label class="form-check-label" >°C</label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Torque</label>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="torque_unit"  value="ft-lbs">
                            <label class="form-check-label" >ft-lbs</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="torque_unit"  value="nm">
                            <label class="form-check-label" >Nm</label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Pressure</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pressure_unit"  value="bar">
                            <label class="form-check-label" >Bar</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="pressure_unit" value="psi">
                            <label class="form-check-label">psi</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="pressure_unit" id value="pa">
                            <label class="form-check-label">Pa</label>
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="inputEmail3" class="col-form-label col-3 mx-3 font-weight-bold">Distance</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="distance_unit" value="mm">
                            <label class="form-check-label">mm</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="radio" name="distance_unit" value="in">
                            <label class="form-check-label">in</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5 mx-auto">
                            <button type="submit" class="btn btn-primary w-100" name="update_units">Update</button>
                        </div>
                        <div class="col-5 mx-auto">
                            <button type="submit" class="btn btn-secondary w-100" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST["update_units"])){
    print_r($_POST); exit(); die();
    $temperature_unit = $_POST["temperature_unit"];
    $torque_unit = $_POST["torque_unit"];
    $pressure_unit = $_POST["pressure_unit"];
    $distance_unit = $_POST["distance_unit"];

    $sql = "UPDATE dashboard_units SET temp='$temperature_unit', torque='$torque_unit', pressure='$pressure_unit',
            distance='$distance_unit' WHERE id=$device_id";

    if(mysqli_query($con, $sql)){
//                    header('Location: users.php');
        echo '
                        <script>window.location.replace("device-details.php?id='.$device_id.'");</script>
                    ';
    }else{
        echo '
                        <script>alert("'.mysqli_error($con).'")</script>
                    ';
    }
}
?>