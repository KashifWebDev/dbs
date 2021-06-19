<?php
session_start();
$_SESSION['currentPath'] = "./";
require 'app/main.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>
<script src="assets/custom_js/show_pass.js"></script>

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
                    <p class="text-dark text-center auto_color_txt font-size-xLarger">DBS IoT Dashboard</p>
                    <?php
                    if(isset($_GET["err"])){
                        switch ($_GET["err"]){
                            case 'SessionOut':
                                echo '
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Error!</strong> Please Login again to access dashboard!
                                                </div>
                                            ';
                                break;
                            case 'incorrect':
                                echo '
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Error!</strong> Incorrect User Credentials!
                                                </div>
                                            ';
                                break;
                            case 'Blocked':
                                echo '
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Error!</strong> Your account is Blocked!
                                                </div>
                                            ';
                                break;
                        }
                    }
                    if(isset($_GET["success"])){
                        switch ($_GET["success"]){
                            case 'loggedOut':
                                echo '
                                                <div class="alert alert-info">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Info: </strong> Logged Out Successfully!
                                                </div>
                                            ';
                                break;
                            case 'passReset':
                                echo '
                                                <div class="alert alert-info">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Info: </strong> Password updated successfully!
                                                </div>
                                            ';
                                break;
                            case 'signUpTrue':
                                echo '
                                                <div class="alert alert-info">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Info: </strong> Account Created Successfully!
                                                </div>
                                            ';
                                break;
                        }
                    }
                    ?>
                </div>
                <div class="mycard-body col-md-11 mx-auto">
                    <form action="" method="post">
                        <div class="input-group mb-2">
                            <span class="input-group-text text-secondary">
                                <i class="fas fa-at"></i>
                            </span>
                            <input type="email" name="email" class="form-control " placeholder="Email Address" required>
                        </div>

                        <!--<input type="password" name="pass" class="form-control " placeholder="Password" required>-->
                        <div class="input-group mb-3" id="show_hide_password">
                            <span class="input-group-text text-secondary input-group-addon">
                                <a id="show_pass_a"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </span>
                            <input type="password" name="pass" class="form-control " placeholder="Password" required>
                        </div>

                        <button name="login-btn" type="submit" class="btn btn-block appBtnColor" id="login-animation" style="max-height: 38px;">
                            Sign in
                        </button>
                    </form>
                </div>
                <hr>
                <div class="mycard-footer mt-4 pb-2 d-flex justify-content-center">
                    <a class="text-white auto_color_txt" href="reset_pass.php">Forgot Password</a>
                    <p class="mx-3">|</p>
                    <a class="text-white auto_color_txt" href="signup.php">Create New Account</a>
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
if(isset($_POST["login-btn"])){
    require 'app/db.php';
    $user_email = $_POST["email"];
    $user_password = $_POST["pass"];
    $sql = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password'";
    $res = mysqli_query($con, $sql);

    //print_r($user_details);
    if(mysqli_num_rows($res)){
        $row = mysqli_fetch_array($res);
        if($row['blocked']){
            header('Location: index.php?err=Blocked');
        }
        $_SESSION["status"]="alive@123";
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["is_admin"] = $row['is_admin'];
        if($row['is_admin']){
            js_redirect('admin_dashboard.php');
        }if(!$row['is_admin']){
            js_redirect('user_dashboard.php');
        }
    }else{
        header('Location: index.php?err=incorrect');
    }

}
?>