<?php
include '../include/dbconnection.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Order Item</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>


    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Add New Order Item</h1>

                <form action="" method="post">

        <input type="number" class="form-control" name="eorder_id" id="" placeholder="Enter Order Id">
                    <br>
        <input type="number" class="form-control" name="eproduct_id" id="" placeholder="Enter Product Id  ">
                    <br>
        <input type="text" class="form-control" name="eproduct_name" id="" placeholder="Enter Product Name">
                    <br>
        <input type="text" class="form-control" name="eproduct_image" id="" placeholder="Enter Product Image">
                    <br>
        <input type="number" class="form-control" name="eproduct_price" id="" placeholder="Enter Product Price">
                    <br>
        <input type="number" class="form-control" name="eproduct_quantity" id="" placeholder="Enter Product Quantity">
                    <br>
        <input type="number" class="form-control" name="euser_id" id="" placeholder="Enter User Id">
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

    $order_cost = $_POST['eorder_id'];
    $order_status = $_POST['eproduct_id'];
    $user_id = $_POST['eproduct_name'];
    $user_phone = $_POST['eproduct_image'];
    $user_city = $_POST['eproduct_price'];
    $user_address = $_POST['eproduct_quantity'];
    $order_date = $_POST['euser_id'];
    $order_date = $_POST['eorder_date'];

    $query = "insert into order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date) values('$order_id','$product_id','$product_name','$product_image','$product_price','$product_quantity','$user_id','$order_date')";

    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script> alert('Data has been inserted Successfully..');
        window.location.href = 'order_items_read.php';
        </script>";

    } else {
        echo "<script> alert('Data insertion Failed..'); </script>";
    }

}

?>


