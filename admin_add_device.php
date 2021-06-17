<?php
require 'app/main.php';
session_start();
verify_is_admin();

$_SESSION['currentPath'] = "./";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<body>
<!-- Navigation -->
<?php require 'app/nav.include.php'; ?>


<style>
    [data-toggle="collapse"] .fa:before {
        content: "\f139";
    }

    [data-toggle="collapse"].collapsed .fa:before {
        content: "\f13a";
    }

</style>
<!-- Page Content -->
<div class="container font-roboto">
    <div class="card">
        <div class="card-header text-dark font-roboto">
            Add new device
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body pt-0">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                    <i class="fa" aria-hidden="true"></i> 1. Device Details
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email1" class="text-dark">Device Name</label>
                                                <input name="name" type="text" class="form-control" id="email1" placeholder="Device Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password1" class="text-dark">Device Secondary Name</label>
                                                <input name="second_name" type="text" class="form-control" id="password1" placeholder="Second Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password1" class="text-dark">Device MAC</label>
                                                <input name="mac" type="text" class="form-control" id="password1" placeholder="11:22:33:44:55" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1" class="text-dark">Upload Device Manual</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="the_file" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1" class="text-dark">Primary Logo</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="p_logo">
                                                <img src="assets/imgs/dbs.png" alt="Primary Logo" class="showLogo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1" class="text-dark">Secondary Logo</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="s_logo" required>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input id="showLegendsDiv" type="checkbox" class="form-check-input" name="useSecondary">Use secondary logo
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" name="add_device" class="btn btn-primary w-100">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>

</body>

<script>
    function func1(){
        var name = document.getElementById("box111").value;
        var span = document.getElementById("ffff");
        name = name + ' - ';
        span.textContent = name;
        span.innerHTML = name;
        console.log(name);
    }
    function func2(){
        var name = document.getElementById("box2222").value;
        var span = document.getElementById("eeee");
        name = name + ' - ';
        span.textContent = name;
        span.innerHTML = name;
        console.log(name);
    }
</script>

</html>

<?php
if(isset($_POST['add_device'])){
    $name = $_POST['name'];
    $mac = $_POST['mac'];
    $second_name = $_POST['second_name'];

    $p_logo = "dbs.png";
    $s_logo = "none";
    $useSecondary = isset($_POST['useSecondary']) ? $_POST['useSecondary'] : '';

    //Upload p_logo
    if (isset( $_FILES["p_logo"] ) && !empty( $_FILES["p_logo"]["name"])){
        $currentDirectory = '';
        $uploadDirectory = "assets/logo/";
        $errors = []; // Store errors here
        $p_logo = $_FILES['p_logo']['name'];
        $fileSize = $_FILES['p_logo']['size'];
        $fileTmpName  = $_FILES['p_logo']['tmp_name'];
        $fileType = $_FILES['p_logo']['type'];
        $uploadPath = $currentDirectory . $uploadDirectory . basename($p_logo);
        if ($fileSize > 4000000) {
            $errors[] = "File exceeds maximum size (4MB)";
        }
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if ($didUpload) {
//                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred while uploading p_logo. Please contact the administrator.";
            }
        } else {
            echo "ERROR in uploading file";
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
            exit(); die();
        }
    }

    //Upload s_logo
    $currentDirectory = '';
    $uploadDirectory = "assets/logo/";
    $errors = []; // Store errors here
    $s_logo = $_FILES['s_logo']['name'];
    $fileSize = $_FILES['s_logo']['size'];
    $fileTmpName  = $_FILES['s_logo']['tmp_name'];
    $fileType = $_FILES['s_logo']['type'];
    $uploadPath = $currentDirectory . $uploadDirectory . basename($s_logo);
    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }
    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        if ($didUpload) {
//                echo "The file " . basename($fileName) . " has been uploaded";
        } else {
            echo "An error occurred while uploading s_logo. Please contact the administrator.";
        }
    } else {
        echo "ERROR in uploading file";
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
        exit(); die();
    }

    //Upload the_file
    $currentDirectory = '';
    $uploadDirectory = "assets/manuals/";
    $errors = []; // Store errors here
    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }
    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        if ($didUpload) {
//                echo "The file " . basename($fileName) . " has been uploaded";
        } else {
            echo "An error occurred while uploading the_file. Please contact the administrator.";
        }
    } else {
        echo "ERROR in uploading file";
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
        exit(); die();
    }


    $row = "INSERT INTO devices
            (mac, device_name, second_name, manual, primary_logo, secondary_logo, use_secondary_logo) VALUES
            ('$mac', '$name', '$second_name', '$fileName', '$p_logo', '$s_logo', '$useSecondary')";


    if(mysqli_query($con, $row)){

        $device_id = mysqli_insert_id($con);
        mysqli_query($con, "INSERT INTO custom_alerts (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO custom_devicestatus (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO custom_graph (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO custom_installation_info (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO custom_maintenance (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO custom_sections (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO dashboard_units (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO custom_dashboards (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO custom_conditions (device_id) VALUES ($device_id)");
        mysqli_query($con, "INSERT INTO custom_add_sections (device_id) VALUES ($device_id)");

        js_redirect('admin_dashboard.php');
    }else{
        echo '<script>alert("Error! '.mysqli_error($con).'");</script>';
    }
}
?>