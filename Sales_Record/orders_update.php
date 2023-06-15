<?php
include '../include/dbconnection.php';

$sales_record_id = $_GET["sales_record_id"] ?? "";

$query = "SELECT * FROM sales_record WHERE sales_record_id = '$sales_record_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!-- null coalescing operator ?? -->

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Sales Record</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Update Sales Record</h1>

                <form action="" method="post">

                    <input type="hidden" name="esales_record_id" value="<?php echo $data[0]; ?>">

                    <input type="decimal(6,2)" class="form-control" name="esales_record_price" id="" placeholder="Enter Sales Record Price" value="<?php echo $data[1]; ?>">
                    <br>

                    <input type="date" class="form-control" name="esales_record_date" id="" placeholder="Enter Sales Record Date" value="<?php echo $data[3]; ?>">
                    <br>

                    <input type="time" class="form-control" name="esales_record_time" id="" placeholder="Enter Sales Record Time" value="<?php echo $data[4]; ?>">
                    <br>

                    <input type="number" class="form-control" name="eemployee_id" id="" placeholder="Enter Employee ID" value="<?php echo $data[5]; ?>">
                    <br>

                    <input type="number" class="form-control" name="ecustomer_id" id="" placeholder="Enter Customer ID" value="<?php echo $data[6]; ?>">
                    <br>

                    <input type="submit" value="Update" name="UpdateBtn" class="btn btn-primary btn-block">
                </form>

            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>


<?php

if (isset($_POST['UpdateBtn'])) {

    $sales_record_id = $_POST['esales_record_id'];
    $sales_record_price = $_POST['esales_record_price'];
    $sales_record_date = $_POST['esales_record_date'];
    $sales_record_time = $_POST['esales_record_time'];
    $employee_id = $_POST['eemployee_id'];
    $customer_id = $_POST['ecustomer_id'];

    $query = "UPDATE sales_record SET
        sales_record_price = '$sales_record_price',
        sales_record_date = '$sales_record_date',
        sales_record_time = '$sales_record_time',
        employee_id = '$employee_id',
        customer_id = '$customer_id'
        WHERE sales_record_id = '$sales_record_id'";

    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script> 
            alert('Data has been updated successfully.');
            window.location.href = 'sales_record_read.php';
        </script>";
    } else {
        echo "<script> 
            alert('Failed to update data.');
        </script>";
    }
}

?>