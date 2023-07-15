<?php
include '../include/dbconnection.php';

$payment_id = $_GET["payment_id"] ?? "";

$query = "select * from payments where payment_id = '$payment_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!--null coalasce operator ??-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update payments</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Update payments</h1>

                <form action="" method="post">

                    <input type="hidden" name="epayment_id" value="<?php echo $data[0]; ?>">

        <input type="number" class="form-control" name="eorder_id" id="" placeholder="Enter Order Id" value="<?php echo $data[1]; ?>">
                    <br>

        <input type="number" class="form-control" name="euser_id" id="" placeholder="Enter User Id" value="<?php echo $data[2]; ?>">
                    <br>

        <input type="text" class="form-control" name="etransaction_id" id="" placeholder="Enter Transaction Id" value="<?php echo $data[3]; ?>">
                    <br>

        <input type="datetime" class="form-control" name="epayment_date" id="" placeholder="Enter Payment Date" value="<?php echo $data[4]; ?>">
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

    $payment_id = $_POST['epayment_id'];
    $order_id = $_POST['eorder_id'];
    $user_id = $_POST['euser_id'];
    $transaction_id = $_POST['etransaction_id'];
    $payment_date = $_POST['epayment_date'];

    $query = "UPDATE payments set

        order_id = '$order_id',
        user_id = '$user_id',
        transaction_id = '$transaction_id',
        payment_date = '$payment_date'
        WHERE payment_id = '$payment_id'";

    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script> alert('Data has been Updated Successfully..');
        window.location.href = 'payments_read.php';
        </script>";

    } else {
        echo "<script> alert('Data Updation Failed..'); </script>";
    }

}

?>
