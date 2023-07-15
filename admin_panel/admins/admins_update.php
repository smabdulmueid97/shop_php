<?php
include '../include/dbconnection.php';

$admin_id = $_GET["admin_id"] ?? "";

$query = "select * from admins where admin_id = '$admin_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!--null coalasce operator ??-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update admins</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Update Admins</h1>

                <form action="" method="post">

                    <input type="hidden" name="eadmin_id" value="<?php echo $data[0]; ?>">

        <input type="text" class="form-control" name="eadmin_name" id="" placeholder="Enter admin Name" value="<?php echo $data[1]; ?>">
                    <br>

        <input type="text" class="form-control" name="eadmin_email" id="" placeholder="Enter Admin Email" value="<?php echo $data[2]; ?>">
                    <br>

        <input type="text" class="form-control" name="eadmin_password" id="" placeholder="Enter Admin Password" value="<?php echo $data[3]; ?>">
                    <br>

        <input type="submit" value="Update" name="UpdateBtn" class="btn btn-primary btn-block">
        </form>

            </div>
        </div>
    </div>

      <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php

if (isset($_POST['UpdateBtn'])) {

    $admin_id = $_POST['eadmin_id'];
    $admin_name = $_POST['eadmin_name'];
    $admin_email = $_POST['eadmin_email'];
    $admin_password = $_POST['eadmin_password'];

    $query = "UPDATE admins set

        admin_id = '$admin_id',
        admin_name = '$admin_name',
        admin_email = '$admin_email',
        admin_password = '$admin_password'
        WHERE admin_id = '$admin_id'";

    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script> alert('Data has been Updated Successfully..');
        window.location.href = 'admins_read.php';
        </script>";

    } else {
        echo "<script> alert('Data Updation Failed..'); </script>";
    }

}

?>
