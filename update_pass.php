<?php
session_start();
$_SESSION['currentPath'] = "./";
require 'app/main.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM reset_pass WHERE code='$id'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query)==0){
        js_redirect("index.php");
    }
    $row = mysqli_fetch_array($query);
    $uid = $row["user_id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<body>
<!-- Navigation -->
<?php //require 'app/navigation.include.php'; ?>

<div class="container d-flex" style="height: 100vh;">
    <div class="row align-self-center w-100">
        <div class="col-sm-10 col-md-6 col-lg-6 mx-auto">
            <div class="mycard">
                <div id="mycard-header">
                    <div class="container">
                        <div class="text-center">
                            <img class="img-thumbnail" src="assets/imgs/dbs.png" style="height: 70px;">
                        </div>
                    </div>
                    <p class="text-dark text-center auto_color_txt font-size-xLarger">Update Password</p>
                </div>
                <div class="mycard-body col-md-11 mx-auto">
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $uid; ?>" name="uid">
                        <div class="input-group mb-2">
                            <input type="password" name="pass" class="form-control " placeholder="Enter new password" required>
                        </div>
                        <button name="reset-btn" type="submit" class="btn btn-block appBtnColor" id="login-animation" style="max-height: 38px;">
                            Update password
                        </button>
                    </form>
                </div>
                <hr>
                <div class="mycard-footer mt-4 pb-2 d-flex justify-content-center">
                    <a class="text-white auto_color_txt" href="./">I remember my password</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>


</body>

</html>
<?php
if(isset($_POST["reset-btn"])){
    require 'app/db.php';
    $pass = $_POST["pass"];
    $uid = $_POST["uid"];
    $sql = "UPDATE users SET password='$pass' WHERE id=$uid";

    if(mysqli_query($con, $sql)){
        js_redirect("index.php?success=passReset");
    }else{
        js_alert("Error while updating pass: "+mysqli_error($con));
    }

}
?>