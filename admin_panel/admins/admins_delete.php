<?php
include '../include/dbconnection.php';

$admin_id = $_GET["admin_id"] ?? "";

$query = "delete from admins where admin_id = '$admin_id'";

$run = mysqli_query($con, $query);

if ($run) {
    echo "<script> alert('Data has been Deleted Successfully..');
        window.location.href = 'admins_read.php';
        </script>";

} else {
    echo "<script> alert('Data Deletion Failed..'); </script>";
}
