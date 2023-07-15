<?php
include '../include/dbconnection.php';

$user_id = $_GET["user_id"] ?? "";

$query = "select * from users where user_id = '$user_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!--null coalasce operator ??-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Users</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Update Users</h1>

                <form action="" method="post">

                    <input type="hidden" name="euser_id" value="<?php echo $data[0]; ?>">

        <input type="text" class="form-control" name="euser_name" id="" placeholder="Enter User Name" value="<?php echo $data[1]; ?>">
                    <br>

        <input type="text" class="form-control" name="euser_email" id="" placeholder="Enter User Email" value="<?php echo $data[2]; ?>">
                    <br>

        <input type="text" class="form-control" name="euser_password" id="" placeholder="Enter User Password" value="<?php echo $data[3]; ?>">
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

    $user_id = $_POST['euser_id'];
    $user_name = $_POST['euser_name'];
    $user_email = $_POST['euser_email'];
    $user_password = $_POST['euser_password'];

    $query = "UPDATE users set

        user_id = '$user_id',
        user_name = '$user_name',
        user_email = '$user_email',
        user_password = '$user_password'
        WHERE user_id = '$user_id'";

    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script> alert('Data has been Updated Successfully..');
        window.location.href = 'users_read.php';
        </script>";

    } else {
        echo "<script> alert('Data Updation Failed..'); </script>";
    }

}

?>
