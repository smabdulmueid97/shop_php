<?php
include '../include/dbconnection.php';

$product_id = $_GET["product_id"] ?? "";

$query = "delete from products where product_id = '$product_id'";

$run = mysqli_query($con, $query);

if ($run) {
    echo "<script> alert('Data has been Deleted Successfully..');
        window.location.href = 'products_read.php';
        </script>";

} else {
    echo "<script> alert('Data Deletion Failed..'); </script>";
}
