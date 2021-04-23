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

<!-- Page Content -->
<div class="container">
    <div class="card">
        <div class="card-header text-dark">
            Add New Dashboard
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email1" class="text-dark">Device Name</label>
                                <input name="name" type="text" class="form-control" id="email1" placeholder="Device Name" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="password1" class="text-dark">Device MAC</label>
                                <input name="mac" type="text" class="form-control" id="password1" placeholder="11:22:33:44:55" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleFormControlFile1" class="text-dark">Upload Device Manual</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="the_file" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input name="driver_model" type="text" class="form-control" id="email1" placeholder="Driver Model">
                            </div>
                            <div class="form-group">
                                <input name="driver_rating" type="text" class="form-control" id="email1" placeholder="Driver Continuous Rating">
                            </div>
                            <div class="form-group">
                                <input name="output_speed" type="text" class="form-control" id="email1" placeholder="Output Speed">
                            </div>
                            <div class="form-group">
                                <input name="electric_rake" type="text" class="form-control" id="email1" placeholder="Electric Motor Rake">
                            </div>
                            <div class="form-group">
                                <input name="electric_lift" type="text" class="form-control" id="email1" placeholder="Electric Motor Lift">
                            </div>
                            <div class="form-group">
                                <input name="driver_sn" type="text" class="form-control" id="email1" placeholder="Driver SN">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input name="end_user" type="text" class="form-control" id="email1" placeholder="End User">
                            </div>
                            <div class="form-group">
                                <input name="Installation" type="text" class="form-control" id="email1" placeholder="Installation">
                            </div>
                            <div class="form-group">
                                <input name="Process" type="text" class="form-control" id="email1" placeholder="Process">
                            </div>
                            <div class="form-group">
                                <input name="size" type="text" class="form-control" id="email1" placeholder="Basin Size(diameter)">
                            </div>
                            <div class="form-group">
                                <input name="inService" type="text" class="form-control" id="email1" placeholder="In Service Since">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="sel1" name="user_id" required>
                                    <option>-- Select user to link --</option>
                                    <?php
                                    require 'app/db.php';
                                    $sql = "SELECT * FROM users WHERE is_admin=0";
                                    $res = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array($res)){
                                        ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["username"].' ('.$row["email"].')'; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="email1" class="text-dark">Enter Meter values <mark><i>in given format</i></mark></label>
                        <input name="ranges" type="text" class="form-control" id="email1" placeholder="0,2500,5000,7500,10000,12500,15000,175000,20000,22500,25000,27500,30000" required>
                    </div>
                    <p>Set Color Levels</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">0 - </span>
                                </div>
                                <input onkeyup="func1()" id="box1" type="text" class="form-control" placeholder="Range" name="rng1">
                                <input type="text" class="form-control" placeholder="Color" name="clr1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><span id="r2">0</span> - </span>
                                </div>
                                <input onkeyup="func2()" id="box2" type="text" class="form-control" placeholder="Range" name="rng2">
                                <input type="text" class="form-control" placeholder="Color" name="clr2">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><span id="r3">0</span> - </span>
                                </div>
                                <input id="box3" type="text" class="form-control" placeholder="Range" name="rng3">
                                <input type="text" class="form-control" placeholder="Color" name="clr3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" name="add_device" class="btn btn-success w-100">Add</button>
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
        $("#r2").text($("#box1").val());
    }
    function func2(){
        $("#r3").text($("#box2").val());
    }
</script>

</html>


<?php
if(isset($_POST['add_device'])){
    $name = $_POST['name'];
    $mac = $_POST['mac'];
    $user_id = $_POST["user_id"];

    $driver_model = $_POST["driver_model"];
    $driver_rating = $_POST["driver_rating"];
    $output_speed = $_POST["output_speed"];
    $electric_rake = $_POST["electric_rake"];
    $electric_lift = $_POST["electric_lift"];
    $driver_sn = $_POST["driver_sn"];
    $end_user = $_POST["end_user"];
    $Installation = $_POST["Installation"];
    $Process = $_POST["Process"];
    $size = $_POST["size"];
    $inService = $_POST["inService"];

    $manual = $_POST["manual"];
    $ranges = $_POST["ranges"];

    $rng1 = $_POST["rng1"];
    $clr1 = $_POST["clr1"];
    $rng2 = $_POST["rng2"];
    $clr2 = $_POST["clr2"];
    $rng3 = $_POST["rng3"];
    $clr3 = $_POST["clr3"];

    $currentDirectory = '';
    $uploadDirectory = "assets/manuals/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png', 'doc', 'docx', 'pdf', 'txt', 'xlx', 'xlxs']; // These will be the only file extensions allowed

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];

    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);



    if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
//                echo "The file " . basename($fileName) . " has been uploaded";
        } else {
            echo "An error occurred. Please contact the administrator.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }




    $row = "INSERT INTO user_and_devices
            (user_id, mac, device_name, meter_ranges, meter_range_1, meter_range_2, meter_range_3, 
             meter_color_1, meter_color_2, meter_color_3, manual) VALUES
            ($user_id, '$mac', '$name', '$ranges', '$rng1', '$rng2', '$rng3', '$clr1', '$clr2', '$clr3', '$fileName')";

    echo $row;

    $installation = "INSERT INTO `installation_info`(`mac`, `driver_model`, `driver_rating`, `speed`,
                                `electric_rate`, `electric_lift`, `driver_sn`, `end_user`,
                                `installation`, `process`, `basin_size`, `service_since`) VALUES 
                        ('$mac', '$driver_model', '$driver_rating', '$output_speed', '$electric_rake',
                         '$electric_lift', '$driver_sn', '$end_user', '$Installation',
                         '$Process', '$size', '$inService')";

    if(mysqli_query($con, $row)){
        js_redirect('admin_dashboard.php');
    }else{
        echo '<script>alert("Error! '.mysqli_error($con).'");</script>';
    }
}
?>