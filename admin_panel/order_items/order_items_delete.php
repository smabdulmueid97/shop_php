<?php
include '../include/dbconnection.php';

$item_id = $_GET["item_id"] ?? "";

$query = "delete from order_items where item_id = '$item_id'";

$run = mysqli_query($con, $query);

if ($run) {
    echo "<script> alert('Data has been Deleted Successfully..');
        window.location.href = 'order_items_read.php';
        </script>";

} else {
    echo "<script> alert('Data Deletion Failed..'); </script>";
}
