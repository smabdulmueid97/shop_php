<?php
include '../include/dbconnection.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Order</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>


    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Add New Order</h1>

                <form action="" method="post">

        <input type="decimal(6,2)" class="form-control" name="eorder_cost" id="" placeholder="Enter Order Cost">
                    <br>
        <input type="text" class="form-control" name="eorder_status" id="" placeholder="Enter Order Status">
                    <br>
        <input type="number" class="form-control" name="euser_id" id="" placeholder="Enter User Id">
                    <br>
        <input type="number" class="form-control" name="euser_phone" id="" placeholder="Enter User Phone">
                    <br>
        <input type="text" class="form-control" name="euser_city" id="" placeholder="Enter User City">
                    <br>
        <input type="text" class="form-control" name="euser_address" id="" placeholder="Enter User Address">
                    <br>
        <input type="datetime" class="form-control" name="eorder_date" id="" placeholder="Enter Order Date">
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

    $order_cost = $_POST['eorder_cost'];
    $order_status = $_POST['eorder_status'];
    $user_id = $_POST['euser_id'];
    $user_phone = $_POST['euser_phone'];
    $user_city = $_POST['euser_city'];
    $user_address = $_POST['euser_address'];
    $order_date = $_POST['eorder_date'];

    $query = "insert into orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date) values('$order_cost','$order_status','$user_id','$user_phone','$user_city','$user_address','$order_date')";

    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script> alert('Data has been inserted Successfully..');
        window.location.href = 'orders_read.php';
        </script>";

    } else {
        echo "<script> alert('Data insertion Failed..'); </script>";
    }

}

?>


