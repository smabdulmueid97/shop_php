<?php
include '../include/dbconnection.php';

$employee_id = $_GET["employee_id"] ?? "";

$query = "delete from users where employee_id = '$employee_id'";

$run = mysqli_query($con, $query);

if ($run) {
    echo "<script> alert('Data has been Deleted Successfully..');
        window.location.href = 'users_read.php';
        </script>";
} else {
    echo "<script> alert('Data Deletion Failed..'); </script>";
}
