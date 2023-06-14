<?php
include '../include/dbconnection.php';

$query = "select * from payments";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $search_text = $_GET['SearchTxt'];

    if ($searchBy == "payment_id") {
        $query = "SELECT * from payments WHERE payment_id = '$search_text'";
    } else if ($searchBy == "order_id") {
        $query = "SELECT * from payments WHERE order_id = '$search_text'";
    } else if ($searchBy == "transaction_id") {
        $query = "SELECT * from payments where transaction_id = '$search_text'";
    } else {
        echo "<script>alert('No Search Result Found.');</script>";
    }

}

$rows = mysqli_query($con, $query);
$Total_Rows = mysqli_num_rows($rows);
//echo $Total_Rows;
?>

<!-- <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Payments</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body> -->

   <?php
include '../include/sidenav.php';
?>



    <div class="container">


        <div class="row mt-3">

            <div class="col-md-3">

            <a href="payments_add_new.php" class="btn btn-outline-dark">Add New Payments</a>

            </div>

            <div class="col-md-8">

                <form action="" method="get" class="form-inline">

                    <select name="SearchList" payments="" required class="form-control">
                        <option value="">Select Field</option>
                        <option value="Payment_Id">Payment Id</option>
                        <option value="Order_Id">Order Id</option>
                        <option value="Transaction_Id">Transaction Id</option>
                    </select>
                    <input type="text" placeholder="Search By " name="SearchTxt" required class="form-control">

                    <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                    <a href="payments_read.php" class="btn btn-danger">Reset</a>


                </form>

            </div>

        </div>

        <div class="row mt-3">

            <div class="col-md-12">

    <?php

if ($Total_Rows != 0) {
    ?>

    <table class="table table-bordered table-striped table-hover table-dark">
        <thead>
        <tr>
            <th colspan="8" class="text-center">Payments</th>
        </tr>
        <tr>
            <th>Payment Id</th>
            <th>Order Id</th>
            <th>User Id</th>
            <th>Transaction Id</th>
            <th>Payment Date</th>
        </tr>
    </thead>
    <?php
echo "<tbody>";
    while ($data = mysqli_fetch_assoc($rows)) {
        echo "<tr>
              <td>" . $data["payment_id"] . "</td>
              <td>" . $data["order_id"] . "</td>
              <td>" . $data["user_id"] . "</td>
              <td>" . $data["transaction_id"] . "</td>
              <td>" . $data["payment_date"] . "</td>
            <td><a href='payments_update.php?payment_id=$data[payment_id]' class='btn btn-info'>Edit</a></td>
            <td><a href='payments_delete.php?payment_id=$data[payment_id]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
        </tr>";
    }
    echo "</tbody>";
} else {
    echo "No Rows Found";
}

?>
    </table>
        </div>
        </div>
    </div>

    <script>

    function Confirmation()
        {
            return confirm("Are You Sure To Delete Data");
        }

    </script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>