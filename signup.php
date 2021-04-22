<?php
session_start();
$_SESSION['currentPath'] = "./";
require 'app/main.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<body>
<!-- Navigation -->
<?php //require 'app/navigation.include.php'; ?>

<div class="container d-flex mt-5">
    <div class="row align-self-center w-100">
        <div class="col-sm-10 col-md-6 col-lg-6 mx-auto">
            <div class="mycard">
                <div id="mycard-header">
                    <div class="container">
                        <div class="text-center">
                            <img class="img-thumbnail" src="assets/imgs/dbs.png" style="height: 40px;">
                        </div>
                        <hr style="background-color: #a7a7a7" class="w-75">
                    </div>
                    <p class="display-4 text-white text-center font-size-35px auto_color_txt">Create Account</p>
                </div>
                <div class="mycard-body col-md-11 mx-auto">
                    <form action="" method="post">
                        <div class="input-group mb-2">
                            <span class="input-group-text text-secondary">
                                <i class="fas fa-at"></i>
                            </span>
                            <input type="text" name="username" class="form-control " placeholder="Full Name" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text text-secondary">
                                <i class="fas fa-at"></i>
                            </span>
                            <input type="email" name="email" class="form-control " placeholder="Email Address" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-secondary">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="pass" class="form-control " placeholder="Password" required>
                        </div>

                        <button name="login-btn" type="submit" class="btn btn-block btn-danger" id="login-animation" style="max-height: 38px;">
                            Sign Up
                        </button>
                    </form>
                </div>
                <div class="mycard-footer mt-4 pb-2">
                    <a class="float-right text-white auto_color_txt" href="index.php">Already Have Account?</a>
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
    $sql = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password'";
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$user_email', '$user_password')";
    if(mysqli_query($con, $sql)){
        header('Location: index.php?success=signUpTrue');
    }

}
?>