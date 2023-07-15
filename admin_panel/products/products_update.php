<?php
include '../include/dbconnection.php';

$product_id = $_GET["product_id"] ?? "";

$query = "select * from products where product_id = '$product_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!--null coalasce operator ??-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update products</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Update products</h1>

                <form action="" method="post">

                    <input type="hidden" name="eproduct_id" value="<?php echo $data[0]; ?>">

        <input type="text" class="form-control" name="eproduct_name" id="" placeholder="Enter Product Name" value="<?php echo $data[1]; ?>">
                    <br>

        <input type="text" class="form-control" name="eproduct_category" id="" placeholder="Enter Product Category" value="<?php echo $data[2]; ?>">
                    <br>

        <input type="text" class="form-control" name="eproduct_description" id="" placeholder="Enter Product Description" value="<?php echo $data[3]; ?>">
                    <br>

        <input type="text" class="form-control" name="eproduct_image" id="" placeholder="Enter Product Image 1" value="<?php echo $data[4]; ?>">
                    <br>

        <input type="text" class="form-control" name="eproduct_image2" id="" placeholder="Enter Product Image 2" value="<?php echo $data[5]; ?>">
                    <br>

        <input type="text" class="form-control" name="eproduct_image3" id="" placeholder="Enter Product Image 3" value="<?php echo $data[6]; ?>">
                    <br>

        <input type="text" class="form-control" name="eproduct_image4" id="" placeholder="Enter Product Image 4" value="<?php echo $data[7]; ?>">
                    <br>
         <input type="decimal(6,2)" class="form-control" name="eproduct_price" id="" placeholder="Enter Product Price" value="<?php echo $data[8]; ?>">
                    <br>
         <input type="decimal(6,2)" class="form-control" name="eproduct_special_offer" id="" placeholder="Enter Product Special Offer" value="<?php echo $data[9]; ?>">
                    <br>
         <input type="text" class="form-control" name="eproduct_color" id="" placeholder="Enter Product Color" value="<?php echo $data[10]; ?>">
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

    $product_id = $_POST['eproduct_id'];
    $product_name = $_POST['eproduct_name'];
    $product_category = $_POST['eproduct_category'];
    $product_description = $_POST['eproduct_description'];
    $product_image = $_POST['eproduct_image'];
    $product_image2 = $_POST['eproduct_image2'];
    $product_image3 = $_POST['eproduct_image3'];
    $product_image4 = $_POST['eproduct_image4'];
    $product_price = $_POST['eproduct_price'];
    $product_special_offer = $_POST['eproduct_special_offer'];
    $product_color = $_POST['eproduct_color'];

    $query = "UPDATE products set

        product_name = '$product_name',
        product_category = '$product_category',
        product_description = '$product_description',
        product_image = '$product_image',
        product_image2 = '$product_image2',
        product_image3 = '$product_image3',
        product_image4 = '$product_image4',
        product_price = '$product_price',
        product_special_offer = '$product_special_offer',
        product_color = '$product_color'

        WHERE product_id = '$product_id'";

    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script> alert('Data has been Updated Successfully..');
        window.location.href = 'products_read.php';
        </script>";

    } else {
        echo "<script> alert('Data Updation Failed..'); </script>";
    }

}

?>
