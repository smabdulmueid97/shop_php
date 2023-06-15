<?php
include '../include/dbconnection.php';

$import_tea_id = $_GET["import_tea_id"] ?? "";

$query = "delete from products where import_tea_id = '$import_tea_id'";

$run = mysqli_query($con, $query);

if ($run) {
    echo "<script> alert('Data has been Deleted Successfully..');
        window.location.href = 'products_read.php';
        </script>";
} else {
    echo "<script> alert('Data Deletion Failed..'); </script>";
}
