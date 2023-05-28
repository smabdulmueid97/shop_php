<?php
include '../include/dbconnection.php';

$order_id = $_GET["order_id"] ?? "";

$query = "delete from orders where order_id = '$order_id'";

$run = mysqli_query($con, $query);

if ($run) {
    echo "<script> alert('Data has been Deleted Successfully..');
        window.location.href = 'orders_read.php';
        </script>";

} else {
    echo "<script> alert('Data Deletion Failed..'); </script>";
}
