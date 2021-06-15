<?php
require 'app/main.php';
session_start();
$_SESSION['currentPath'] = "./";
verify_is_admin();
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></link>
<?php
if (isset($_SESSION["darkTheme"]) && $_SESSION["darkTheme"] == 1){
    ?>
    <style>
        table.dataTable tbody tr {
            background-color: #6b6b6b !important;
        }
        .dataTables_length, #example_filter, .dataTables_info, #example_previous, #example_next{
            color: white !important;
        }
    </style>
    <?php
}
?>
<body>
<!-- Navigation -->
<?php require 'app/nav.include.php'; ?>

<?php
if(isset($_GET["userID"]) and isset($_GET["changeUser"])){
    $uid = $_GET["userID"];
    $role = $_GET["changeUser"];
    $sql = "UPDATE users set is_admin = $role WHERE id = $uid";
    mysqli_query($con, $sql);
    echo '<script>windows.location.replace("users.php")</script>';

}
if(isset($_GET["delUser"])){
    $uid = $_GET["delUser"];
    $sql = "DELETE FROM users WHERE  id = $uid";
    mysqli_query($con, $sql);
    echo '<script>windows.location.replace("users.php")</script>';
}
if(isset($_GET["blockUser"])){
    $action = $_GET["action"];
    $uid = $_GET["blockUser"];
    $sql = "UPDATE users set blocked = $action WHERE id = $uid";
    if(mysqli_query($con, $sql)){
        echo '<script>window.location.replace("users.php")</script>';
    }else{
        echo mysqli_error($con);
    }
}
?>

<!-- Page Content -->
<div class="container mt-4">
    <?php
    if(isset($_GET["msg"])){
        ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Dashboard Settings Updated!
        </div>
    <?php
    }
    ?>

    <table id="example" class="table table-striped table-bordered bg-white shadow autoColorTable_theme" style="width:100%">
        <thead>
        <tr>
            <th>Device Name</th>
            <th>Second Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM devices";
        $res = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td><?php echo $row["device_name"]; ?></td>
                <td><?php echo $row["second_name"]; ?></td>
                <td>
                    <a href="admin_create_DashboardEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>



            <!-- Edit User -->
            <div class="modal" id="update_<?php echo $rand; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: black;">Update User Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email" style="color: black;">Full Name:</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter Username" id="email" value="<?php echo $row['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email" style="color: black;">Email address:</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" value="<?php echo $row['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pwd" style="color: black;">Password:</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd" value="<?php echo $row['password']; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="update_user">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="user_id">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        }
        if(isset($_POST["update_user"])){
            $name = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $user_id = $_POST["user_id"];
            $sql = "UPDATE users SET username='$name', email='$email', password='$password' WHERE id=$user_id";
            if(mysqli_query($con, $sql)){
//                    header('Location: users.php');
                echo '
                        <script>window.location.replace("users.php");</script>
                    ';
            }
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th>Device Name</th>
            <th>Second Name</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
</div>

<!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>



<?php
if(isset($_POST["addUser"])){
    $name = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $type = (int) $_POST["type"];
    $sql = "INSERT INTO users (username, email, password, is_admin) VALUES ('$name', '$email', '$pass', $type)";
    if(mysqli_query($con, $sql)){
        echo '<script>windows.location.replace("users.php")</script>';
        header('Location: users.php');
    }else{
        echo '<script>alert("'.mysqli_error($con).'")</script>';
    }
}
?>

</body>

</html>
