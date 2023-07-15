<?php
include '../include/dbconnection.php';

$query = "select * from order_items";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $search_text = $_GET['SearchTxt'];

    if ($searchBy == "Item_Id") {
        $query = "SELECT * from order_items WHERE item_id = '$search_text'";
    } else if ($searchBy == "Product_Id") {
        $query = "SELECT * from order_items WHERE product_id = '$search_text'";
    } else if ($searchBy == "Order_Id") {
        $query = "SELECT * from order_items where order_id = '$search_text'";
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
<title>Order Items</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body> -->

   <?php
include '../include/sidenav.php';
?>


    <div class="container">


        <div class="row mt-3">

            <div class="col-md-3">

            <a href="order_items_add_new.php" class="btn btn-outline-dark">Add New Order Items</a>

            </div>

            <div class="col-md-8">

                <form action="" method="get" class="form-inline">

                    <select name="SearchList" item_id="" required class="form-control">
                        <option value="">Select Field</option>
                        <option value="Item_Id">Item Id</option>
                        <option value="Product_Id">Product Id</option>
                        <option value="Order_Id">Order Id</option>
                    </select>
                    <input type="text" placeholder="Search By " name="SearchTxt" required class="form-control">

                    <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                    <a href="order_items_read.php" class="btn btn-danger">Reset</a>


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
            <th colspan="9" class="text-center">Order Items</th>
        </tr>
        <tr>
            <th>Item Id</th>
            <th>Order Id</th>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>User Id</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <?php
echo "<tbody>";
    while ($data = mysqli_fetch_assoc($rows)) {
        echo "<tr>
              <td>" . $data["item_id"] . "</td>
              <td>" . $data["order_id"] . "</td>
              <td>" . $data["product_id"] . "</td>
              <td>" . $data["product_name"] . "</td>
              <td>" . $data["product_image"] . "</td>
              <td>" . $data["product_price"] . "</td>
              <td>" . $data["product_quantity"] . "</td>
              <td>" . $data["user_id"] . "</td>
              <td>" . $data["order_date"] . "</td>
            <td><a href='order_items_update.php?item_id=$data[item_id]' class='btn btn-info'>Edit</a></td>
            <td><a href='order_items_delete.php?item_id=$data[item_id]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
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