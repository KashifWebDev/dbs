<?php
require 'app/main.php';
session_start();
check_session();

$uid = $_GET["id"];

$_SESSION['currentPath'] = "./";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<body>
<!-- Navigation -->
<?php require 'app/nav.include.php'; ?>

<!-- Page Content -->
    <div class="container">
        <?php

        $sql1 = "SELECT * FROM users WHERE id= $uid";
        $res1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_array($res1);
        ?>
            <form action="" method="post">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" style="color: black;">Full Name:</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Username" id="email" value="<?php echo $row1['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: black;">Company Name:</label>
                            <input type="text" class="form-control" name="company_name" placeholder="Company Name" id="email" value="<?php echo $row1['company_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: black;">Company Name:</label>
                            <input type="text" class="form-control" name="job_position" placeholder="Job Position" id="email" value="<?php echo $row1['job_position']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: black;">Email address:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" value="<?php echo $row1['email']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" style="color: black;">Primary contact number:</label>
                            <input type="text" class="form-control" name="contact" placeholder="+1 584 458 485" id="email" value="<?php echo $row1['contact']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: black;">Secondary contact number:</label>
                            <input type="text" class="form-control" name="phone_2" placeholder="+1 584 458 485" id="email" value="<?php echo $row1['phone_2']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: black;">Secrete Question:</label>
                            <input type="text" class="form-control" name="secrete" placeholder="Secrete question" id="email" value="<?php echo $row1['secrete']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: black;">Answer:</label>
                            <input type="text" class="form-control" name="answer" placeholder="Answer to secrete question" id="email" value="<?php echo $row1['answer']; ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="w-75 mx-auto">
                        <button type="submit" class="btn appBtnColor w-100" name="update_userr">Update</button>
                    </div>
                </div>
            </form>
                <?php
                if(isset($_POST["update_userr"])){
                    $name = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $contact = $_POST["contact"];
                    $contact_2 = $_POST["phone_2"];
                    $company_name = $_POST["company_name"];
                    $job_position = $_POST["job_position"];
                    $secrete = $_POST["secrete"];
                    $answer = $_POST["answer"];
                    $user_id = $uid;
                    $sql = "UPDATE users SET username='$name', email='$email', password='$password', contact='$contact', phone_2='$contact_2',
                            company_name='$company_name', job_position='$job_position', secrete='$secrete', answer='$answer'
                            WHERE id=$user_id";
                    if(mysqli_query($con, $sql)){
                        js_redirect("user_settings.php?id=$uid");
                    }else{
                        echo '
                        <script>alert("'.mysqli_error($con).'")</script>
                    ';
                    }
                }
                ?>
    </div>

<script>
    function del_device_function(id){
        console.log(id);
        document.getElementById("del_device_btn").href="user_dashboard.php?del_device_id="+id;
    }
</script>
<?php
    if(isset($_GET['del_device_id'])){
        $id = (int) $_GET['del_device_id'];
        $row = "DELETE FROM user_and_devices WHERE id=$id";
//        echo '<script>alert('.$id.');</script>';
        if(mysqli_query($con, $row)){
            js_redirect('user_dashboard.php');
        }else{
            echo '<script>alert('.mysqli_error($con).');</script>';
        }
    }

?>

<!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>


<!-- Delete device modal -->
<div class="modal fade" id="deleteDevice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Remove Device</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-dark">Please confirm if you want to delete this device?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a id="del_device_btn" href="here">
                    <button type="button" class="btn btn-primary">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>



</body>

</html>
