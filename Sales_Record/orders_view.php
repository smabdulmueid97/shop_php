<?php
include '../include/dbconnection.php';

$order_id = $_GET["order_id"] ?? "";

$query = "select * from orders where order_id = '$order_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!--null coalasce operator ??-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Order</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Update Order</h1>

                <form action="" method="post">

                    <input type="hidden" name="eorder_id" value="<?php echo $data[0]; ?>">

        <input type="decimal(6,2)" class="form-control" name="eorder_cost" id="" placeholder="Enter Order Cost" value="<?php echo $data[1]; ?>">
                    <br>

        <input type="text" class="form-control" name="eorder_status" id="" placeholder="Enter Order Status" value="<?php echo $data[2]; ?>">
                    <br>

        <input type="number" class="form-control" name="euser_id" id="" placeholder="Enter User Id" value="<?php echo $data[3]; ?>">
                    <br>

        <input type="number" class="form-control" name="euser_phone" id="" placeholder="Enter User Phone" value="<?php echo $data[4]; ?>">
                    <br>

        <input type="text" class="form-control" name="euser_city" id="" placeholder="Enter User City" value="<?php echo $data[5]; ?>">
                    <br>

        <input type="text" class="form-control" name="euser_address" id="" placeholder="Enter User Address" value="<?php echo $data[6]; ?>">
                    <br>

        <input type="datetime" class="form-control" name="eorder_date" id="" placeholder="Enter Order Date" value="<?php echo $data[7]; ?>">
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

    $order_id = $_POST['eorder_id'];
    $order_cost = $_POST['eorder_cost'];
    $order_status = $_POST['eorder_status'];
    $user_id = $_POST['euser_id'];
    $user_phone = $_POST['euser_phone'];
    $user_city = $_POST['euser_city'];
    $user_address = $_POST['euser_address'];
    $order_date = $_POST['eorder_date'];

    $query = "UPDATE orders set

        order_cost = '$order_cost',
        order_status = '$order_status',
        user_id = '$user_id',
        user_phone = '$user_phone',
        user_city = '$user_city',
        user_address = '$user_address',
        order_date = '$order_date'
        WHERE order_id = '$order_id'";

    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script> alert('Data has been Updated Successfully..');
        window.location.href = 'orders_read.php';
        </script>";

    } else {
        echo "<script> alert('Data Updation Failed..'); </script>";
    }

}

?>
