<?php
include '../include/dbconnection.php';

$item_id = $_GET["item_id"] ?? "";

$query = "select * from order_items where item_id = '$item_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);
?>

<!--null coalasce operator ??-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Order Items</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Update Order Items</h1>

                <form action="" method="post">

                    <input type="hidden" name="eitem_id" value="<?php echo $data[0]; ?>">

        <input type="number" class="form-control" name="eorder_id" id="" placeholder="Enter Order Id" value="<?php echo $data[1]; ?>">
                    <br>

        <input type="number" class="form-control" name="eproduct_id" id="" placeholder="Enter Product Id" value="<?php echo $data[2]; ?>">
                    <br>

        <input type="text" class="form-control" name="eproduct_name" id="" placeholder="Enter Product Name" value="<?php echo $data[3]; ?>">
                    <br>

        <input type="text" class="form-control" name="eproduct_image" id="" placeholder="Enter Product Image" value="<?php echo $data[4]; ?>">
                    <br>

        <input type="decimal(6,2)" class="form-control" name="eproduct_price" id="" placeholder="Enter Product Price" value="<?php echo $data[5]; ?>">
                    <br>

        <input type="number" class="form-control" name="eproduct_quantity" id="" placeholder="Enter Product Quantity" value="<?php echo $data[6]; ?>">
                    <br>

        <input type="number" class="form-control" name="euser_id" id="" placeholder="Enter User Id" value="<?php echo $data[7]; ?>">
                    <br>
         <input type="datetime" class="form-control" name="eorder_date" id="" placeholder="Enter Order Date" value="<?php echo $data[8]; ?>">
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

    $item_id = $_POST['eitem_id'];
    $order_id = $_POST['eorder_id'];
    $product_id = $_POST['eproduct_id'];
    $product_name = $_POST['eproduct_name'];
    $product_image = $_POST['eproduct_image'];
    $product_price = $_POST['eproduct_price'];
    $product_quantity = $_POST['eproduct_quantity'];
    $user_id = $_POST['euser_id'];
    $order_date = $_POST['eorder_date'];

    $query = "UPDATE order_items set
        order_id = '$order_id',
        product_id = '$product_id',
        product_name = '$product_name',
        product_image = '$product_image',
        product_price = '$product_price',
        product_quantity = '$product_quantity',
        user_id = '$user_id',
        order_date = '$order_date'
        where item_id = '$item_id'";

    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script> alert('Data has been Updated Successfully..');
        window.location.href = 'order_items_read.php';
        </script>";

    } else {
        echo "<script> alert('Data Updation Failed..'); </script>";
    }

}

?>
