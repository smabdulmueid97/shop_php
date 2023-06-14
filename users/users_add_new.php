<?php
include '../include/dbconnection.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New User</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>


    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Add New User</h1>

                <form action="" method="post">

        <input type="text" class="form-control" name="euser_name" id="" placeholder="Enter User Name">
                    <br>
        <input type="email" class="form-control" name="euser_email" id="" placeholder="Enter User Email">
                    <br>
        <input type="password" class="form-control" name="euser_password" id="" placeholder="Enter User Password">
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

    $user_name = $_POST['euser_name'];
    $user_email = $_POST['euser_email'];
    $user_password = $_POST['euser_password'];

    $query = "insert into users (user_name,user_email,user_password) values('$user_name','$user_email','$user_password')";

    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script> alert('Data has been inserted Successfully..');
        window.location.href = 'users_read.php';
        </script>";

    } else {
        echo "<script> alert('Data insertion Failed..'); </script>";
    }

}

?>


