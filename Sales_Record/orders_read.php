


<?php
include '../include/dbconnection.php';

$query = "select * from orders";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $search_text = $_GET['SearchTxt'];

    if ($searchBy == "Order_Id") {
        $query = "SELECT * from orders WHERE order_id = '$search_text'";
    } else if ($searchBy == "User_Id") {
        $query = "SELECT * from orders WHERE user_id = '$search_text'";
    } else if ($searchBy == "User_Phone") {
        $query = "SELECT * from orders where user_phone = '$search_text'";
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
<title>Orders</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body> -->

   <?php
include '../include/sidenav.php';
?>



    <div class="container">


        <div class="row mt-3">

            <div class="col-md-3">

            <a href="orders_add_new.php" class="btn btn-outline-dark">Add New Orders</a>

            </div>

            <div class="col-md-8">

                <form action="" method="get" class="form-inline">

                    <select name="SearchList" order_id="" required class="form-control">
                        <option value="">Select Field</option>
                        <option value="Order_Id">Order Id</option>
                        <option value="User_Id">User Id</option>
                        <option value="User_Phone">User Phone</option>
                    </select>
                    <input type="text" placeholder="Search By " name="SearchTxt" required class="form-control">

                    <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                    <a href="orders_read.php" class="btn btn-danger">Reset</a>


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
            <th colspan="8" class="text-center">Orders</th>
        </tr>
        <tr>
            <th>Order Id</th>
            <th>Order Cost</th>
            <th>User Address</th>
            <th>User Phone</th>
            <th>Order Date</th>
            <th>User City</th>
            <th>User Id</th>
            <th>Order Status</th>
        </tr>
    </thead>
    <?php
echo "<tbody>";
    while ($data = mysqli_fetch_assoc($rows)) {
        echo "<tr>
              <td>" . $data["order_id"] . "</td>
              <td>" . $data["order_cost"] . "</td>
              <td>" . $data["user_address"] . "</td>
              <td>" . $data["user_phone"] . "</td>
              <td>" . $data["order_date"] . "</td>
              <td>" . $data["user_city"] . "</td>
              <td>" . $data["user_id"] . "</td>
              <td>" . $data["order_status"] . "</td>

            <td><a href='orders_view.php?order_id=$data[order_id]' class='btn btn-success'>View</a></td>
            <td><a href='orders_update.php?order_id=$data[order_id]' class='btn btn-info'>Edit</a></td>

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