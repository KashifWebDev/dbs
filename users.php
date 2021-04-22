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
        <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#myModal">
            Create New User
        </button>

        <table id="example" class="table table-striped table-bordered bg-white shadow autoColorTable_theme" style="width:100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM users WHERE id > 1";
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($res)){
                $rand = rand();
                if($row["is_admin"]){
                    $userType = "Administrator";
                    $typeClass = "bg-danger";
                }else{
                    $userType = "User";
                    $typeClass = "bg-info";
                }
                if($row["blocked"]){
                    $action = 0;
                }else{
                    $action = 1;
                }
                ?>
                <tr>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><span class="p-2 text-white border-radius-10px   <?php echo $typeClass; ?>"><?php echo $userType; ?></span></td>
                    <td>
                        <a href="users.php?changeUser=<?php echo $row['is_admin']==1 ? 0 : 1; ?>&userID=<?php echo $row['id']; ?>" class="btn btn-success">
                            <?php
                                if(!$row["is_admin"]){
                                    echo 'Make Admin';
                                }else{
                                    echo 'Make User';
                                }
                            ?>
                        </a>
                        <a href="users.php?delUser=<?php echo $row['id']; ?>" class="btn btn-danger">
                            Delete
                        </a>
                        <a href="users.php?delUser=<?php echo $row['id']; ?>" class="btn btn-primary" data-toggle="modal" data-target="#update_<?php echo $rand; ?>">
                            Update
                        </a>
                        <a href="users.php?blockUser=<?php echo $row['id']; ?>&action=<?php echo $action; ?>" class="btn btn-warning">
                            <?php
                            if($row["blocked"]){
                                echo 'Unblock';
                            }else{
                                echo 'Block';
                            }
                            ?>
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
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
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


<!-- Add New User -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color: black;">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="./users.php" method="post">
                    <div class="form-group">
                        <label for="email" style="color: black;">Full Name:</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email" style="color: black;">Email address:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" id="email">
                    </div><div class="form-group">
                        <label for="sel1" style="color: black;">User Type:</label>
                        <select class="form-control" id="sel1" name="type">
                            <option value="0">Normal User</option>
                            <option value="1">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd" style="color: black;">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd">
                    </div>
                    <button type="submit" class="btn btn-primary" name="addUser">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>

        </div>
    </div>
</div>


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
