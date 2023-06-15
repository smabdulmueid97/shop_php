<?php
include '../include/dbconnection.php';

$user_id = $_GET["user_id"] ?? "";

$query = "delete from users where user_id = '$user_id'";

$run = mysqli_query($con, $query);

if ($run) {
    echo "<script> alert('Data has been Deleted Successfully..');
        window.location.href = 'users_read.php';
        </script>";

} else {
    echo "<script> alert('Data Deletion Failed..'); </script>";
}
