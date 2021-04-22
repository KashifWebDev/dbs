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
<div class="py-3 <?php echo $navClass; ?>">
    <div class="containerr">
        <div class="row">
            <div class="col-md-5 d-flex justify-content-center">
                <img style="height: 40px;" src="assets/imgs/dbs.png">
                <ul class="navbar-nav" style="flex-direction: row;">
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="admin_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="app/changeTheme.php"><?php echo $themeLinkText; ?></a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link navbar-link-color <?php echo $txtColor; ?>" href="app/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 d-flex justify-content-center top_btn_margin">
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