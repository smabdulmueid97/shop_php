<?php
include '../include/dbconnection.php';

$payment_id = $_GET["payment_id"] ?? "";

$query = "delete from payments where payment_id = '$payment_id'";

$run = mysqli_query($con, $query);

if ($run) {
    echo "<script> alert('Data has been Deleted Successfully..');
        window.location.href = 'payments_read.php';
        </script>";

} else {
    echo "<script> alert('Data Deletion Failed..'); </script>";
}
