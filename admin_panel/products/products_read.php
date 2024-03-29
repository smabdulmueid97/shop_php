<?php
include '../include/dbconnection.php';

$query = "select * from products";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $search_text = $_GET['SearchTxt'];

    if ($searchBy == "Product_Id") {
        $query = "SELECT * from products WHERE Product_Id = '$search_text'";
    } else if ($searchBy == "Product_Name") {
        $query = "SELECT * from products WHERE Product_Name = '$search_text'";
    } else if ($searchBy == "Product_Category") {
        $query = "SELECT * from products where Product_Category = '$search_text'";
    } else {
        echo "<script>alert('No Search Result Found.');</script>";
    }

}

$rows = mysqli_query($con, $query);
$Total_Rows = mysqli_num_rows($rows);
//echo $Total_Rows;
?>

<!-- <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>products</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body> -->
       <?php
include '../include/sidenav.php';
?>



    <div class="container">


        <div class="row mt-3">

            <div class="col-md-3">

            <a href="products_add_new.php" class="btn btn-outline-dark">Add New products</a>

            </div>

            <div class="col-md-8">

                <form action="" method="get" class="form-inline">

                    <select name="SearchList" order_id="" required class="form-control">
                        <option value="">Select Field</option>
                        <option value="Product_Id">Product Id</option>
                        <option value="Product_Name">Product Name</option>
                        <option value="Product_Category">Product Category</option>
                    </select>
                    <input type="text" placeholder="Search By " name="SearchTxt" required class="form-control">

                    <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                    <a href="products_read.php" class="btn btn-danger">Reset</a>


                </form>

            </div>

        </div>

        <div class="row mt-3">

            <div class="col-md-12">

    <?php

if ($Total_Rows != 0) {
    ?>

    <table class="table table-bordered table-striped table-hover table-dark">
        <thead>
        <tr>
            <th colspan="8" class="text-center">Products</th>
        </tr>
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Product Description</th>
            <th>Product Image 1</th>
            <th>Product Image 2</th>
            <th>Product Image 3</th>
            <th>Product Image 4</th>
            <th>Product Price</th>
            <th>Product Special Offer</th>
            <th>Product Color</th>

        </tr>
    </thead>
    <?php
echo "<tbody>";
    while ($data = mysqli_fetch_assoc($rows)) {
        echo "<tr>
            <td>" . $data["product_id"] . "</td>
            <td>" . $data["product_name"] . "</td>
            <td>" . $data["product_category"] . "</td>
            <td>" . $data["product_description"] . "</td>
            <td>" . $data["product_image"] . "</td>
            <td>" . $data["product_image2"] . "</td>
            <td>" . $data["product_image3"] . "</td>
            <td>" . $data["product_image4"] . "</td>
            <td>" . $data["product_price"] . "</td>
            <td>" . $data["product_special_offer"] . "</td>
            <td>" . $data["product_color"] . "</td>

            <td><a href='products_update.php?product_id=$data[product_id]' class='btn btn-info'>Edit</a></td>
            <td><a href='products_delete.php?product_id=$data[product_id]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
        </tr>";
    }
    echo "</tbody>";
} else {
    echo "No Rows Found";
}

?>
    </table>
        </div>
        </div>
    </div>

    <script>

    function Confirmation()
        {
            return confirm("Are You Sure To Delete Data");
        }

    </script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>