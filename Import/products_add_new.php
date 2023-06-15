<?php
include '../include/dbconnection.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New products</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>


    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Add New products</h1>

                <form action="" method="post">

        <input type="text" class="form-control" name="eproduct_name" id="" placeholder="Enter Product Name">
                    <br>
        <input type="text" class="form-control" name="eproduct_category" id="" placeholder="Enter Product Category">
                    <br>
        <input type="text" class="form-control" name="eproduct_description" id="" placeholder="Enter Product Description">
                    <br>
        <input type="text" class="form-control" name="eproduct_image" id="" placeholder="Enter Product Image 1">
                    <br>
        <input type="text" class="form-control" name="eproduct_image2" id="" placeholder="Enter Product Image 2">
                    <br>
        <input type="text" class="form-control" name="eproduct_image3" id="" placeholder="Enter Product Image 3">
                    <br>
        <input type="text" class="form-control" name="eproduct_image4" id="" placeholder="Enter Product Image 4">
                    <br>
        <input type="decimal(6,2)" class="form-control" name="eproduct_price" id="" placeholder="Enter Product Price">
                    <br>
        <input type="decimal(6,2)" class="form-control" name="eproduct_special_offer" id="" placeholder="Enter Product Quantity">
                    <br>
        <input type="text" class="form-control" name="eproduct_color" id="" placeholder="Enter Product Color">
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

    $query = "insert into products (product_name,product_category,product_description,product_image,product_image2,product_image3,product_image4,product_price,product_special_offer,product_color) values('$product_name','$product_category','$product_description','$product_image','$product_image2','$product_image3','$product_image4','$product_price','$product_special_offer','$product_color')";

    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script> alert('Data has been inserted Successfully..');
        window.location.href = 'products_read.php';
        </script>";

    } else {
        echo "<script> alert('Data insertion Failed..'); </script>";
    }

}

?>


