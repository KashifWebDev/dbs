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
                    <p class="text-dark text-center auto_color_txt font-size-xLarger">Create a new account</p>
                    <?php
                    if(isset($_GET["err"])){
                        echo '
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error! </strong> The password you entered did not match!
                        </div>
                        ';
                    }
                    ?>
                </div>
                <div class="mycard-body col-md-11 mx-auto">
                    <form action="" method="post">
                        <div class="input-group mb-2">
                            <span class="input-group-text text-secondary">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="username" class="form-control " placeholder="Full Name" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text text-secondary">
                                <i class="fas fa-at"></i>
                            </span>
                            <input type="email" name="email" class="form-control " placeholder="Email Address" required>
                        </div>
                        <div class="input-group mb-2" id="show_hide_password">
                            <span class="input-group-text input-group-addon">
                                <a id="show_pass_a"><i class="fa fa-eye-slash text-secondary" aria-hidden="true"></i></a>
                            </span>
                            <input type="password" name="pass" class="form-control " placeholder="Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-secondary">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="pass1" class="form-control " placeholder="Confirm password" required>
                        </div>

                        <button name="login-btn" type="submit" class="btn btn-block appBtnColor" id="login-animation" style="max-height: 38px;">
                            Sign Up
                        </button>
                    </form>
                </div>
                <div class="mycard-footer mt-4 pb-2">
                    <a class="float-right text-white auto_color_txt" href="index.php">I already have an account</a>
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
    $username = $_POST["username"];
    $user_email = $_POST["email"];
    $user_password = $_POST["pass"];
    $user_password1 = $_POST["pass1"];
//    echo $user_password.'  --  '.$user_password1;
    if($user_password != $user_password1){
        js_redirect("signup.php?err=notMatch");
    }
    $sql = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password'";
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$user_email', '$user_password')";
    if(mysqli_query($con, $sql)){
        js_redirect('index.php?success=signUpTrue');
    }else{
        echo  mysqli_error($con);
    }

}
?>