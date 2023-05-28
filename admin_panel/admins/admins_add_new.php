<?php
include '../include/dbconnection.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Admin</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>


    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Add New Admin</h1>

                <form action="" method="post">

        <input type="text" class="form-control" name="eadmin_name" id="" placeholder="Enter Admin Name">
                    <br>
        <input type="text" class="form-control" name="eadmin_email" id="" placeholder="Enter Admin Email">
                    <br>
        <input type="password" class="form-control" name="eadmin_password" id="" placeholder="Enter Admin Password">
                    <br>


        <input type="submit" value="Insert" name="InsertBtn" class="btn btn-primary btn-block">
        </form>

            </div>

        </div>

    </div>





    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

if (isset($_POST['InsertBtn'])) {

    $admin_name = $_POST['eadmin_name'];
    $admin_email = $_POST['eadmin_email'];
    $admin_password = $_POST['eadmin_password'];

    $query = "insert into admins (admin_name,admin_email,admin_password) values('$admin_name','$admin_email','$admin_password')";

    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script> alert('Data has been inserted Successfully..');
        window.location.href = 'admins_read.php';
        </script>";

    } else {
        echo "<script> alert('Data insertion Failed..'); </script>";
    }

}

?>


