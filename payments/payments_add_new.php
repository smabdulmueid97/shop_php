<?php
include '../include/dbconnection.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Payments</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>


    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Add New Payments</h1>

                <form action="" method="post">

        <input type="number" class="form-control" name="payment_id" id="" placeholder="Enter Payment Id">
                    <br>
        <input type="number" class="form-control" name="order_id" id="" placeholder="Enter Order Id">
                    <br>
        <input type="number" class="form-control" name="user_id" id="" placeholder="Enter User Id">
                    <br>
        <input type="text" class="form-control" name="transaction_id" id="" placeholder="Enter Transaction Id">
                    <br>
        <input type="text" class="form-control" name="payment_date" id="" placeholder="Enter Payment Date">
                    <br>


        <input type="submit" value="Insert" name="InsertBtn" class="btn btn-primary btn-block">
        </form>

            </div>

        </div>

    </div>





    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

if (isset($_POST['InsertBtn'])) {

    $order_id = $_POST['eorder_id'];
    $user_id = $_POST['euser_id'];
    $transaction_id = $_POST['etransaction_id'];
    $payment_date = $_POST['epayment_date'];

    $query = "insert into payments (order_id,user_id,transaction_id,payment_date) values('$order_id','$user_id','$transaction_id','$payment_date')";

    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script> alert('Data has been inserted Successfully..');
        window.location.href = 'payments_read.php';
        </script>";

    } else {
        echo "<script> alert('Data insertion Failed..'); </script>";
    }

}

?>


