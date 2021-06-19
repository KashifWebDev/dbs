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
                    <p class="text-dark text-center auto_color_txt font-size-xLarger">Reset Password</p>
                    <?php
                    if(isset($_GET["success"])){
                        echo '
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div id="message">
                                <strong>Success: </strong> Password reset link sent to your registered email address.
                            </div>
                        </div>
                        ';
                    }
                    if(isset($_GET["err"])){
                        echo '
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!: </strong> The email you entered was not registered!
                        </div>
                        ';
                    }
                    ?>
                </div>
                <div class="mycard-body col-md-11 mx-auto">
                    <form action="" method="post">
                        <div class="input-group mb-2">
                            <input type="email" name="email" class="form-control " placeholder="you@email.com" required>
                        </div>
                        <button name="reset-btn" type="submit" class="btn btn-block appBtnColor" id="login-animation" style="max-height: 38px;">
                            Reset password
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
    $user_email = $_POST["email"];
    $sql = "SELECT * FROM users WHERE email = '$user_email'";
    $res = mysqli_query($con, $sql);

    //print_r($user_details);
    if(mysqli_num_rows($res)){
        $row = mysqli_fetch_array($res);
        $uID = $row["id"];
        $code = generateRandomString();
        $sql = "INSERT INTO reset_pass (user_id, code) VALUES ($uID, '$code')";

        $to = "somebody@example.com";
        $subject = "My subject";
        $txt = "Please <a href='https://embeddediiot.com/dbs/update_pass.php?id=$code'>CLICK HERE</a> to reset your password";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: no-reply@dbsServer.com" . "\r\n".
            'X-Mailer: PHP/' . phpversion();

        mail($to,$subject,$txt,$headers);
        if(mysqli_query($con, $sql)){
            js_redirect('reset_pass.php?success=sent');
        }else{
//            js_redirect('reset_pass.php?err=err');
            js_console(mysqli_error($con));
            echo "CHeck console!!"; exit(); die();
        }
    }else{
        js_redirect('reset_pass.php?err=notFound');
    }

}
?>