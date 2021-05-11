<?php
require 'app/main.php';
session_start();
check_session();

$sql = "SELECT user_and_devices.user_id, devices.id as dID
        FROM user_and_devices,devices
        WHERE user_id = ".$_SESSION["id"];
$res = mysqli_query($con, $sql);
if(mysqli_num_rows($res)==1){
    $row = mysqli_fetch_array($res);
    header('Location: device-details.php?id='.$row['dID']);

}

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
        <div class="row">
            <?php
                $uid = $_SESSION["id"];
                $sql = "SELECT devices.id as deviceID, devices.device_name, devices.mac as mac, user_and_devices.user_id
                        FROM devices, user_and_devices
                        WHERE user_id = $uid GROUP BY mac";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res)){
                    while($row = mysqli_fetch_array($res)){
                        require 'devices-card.php';
                    }
                }
                else{
                    ?>
                    <p class="display-4 text-center">No Devices Found!</p>
                    <?php
                }
            ?>
         </div>
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
