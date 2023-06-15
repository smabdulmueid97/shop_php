<?php
include '../include/dbconnection.php';

$query = "SELECT * FROM sales_record";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $searchText = $_GET['SearchTxt'];

    if ($searchBy == "Order_Id") {
        $query = "SELECT * FROM sales_record WHERE order_id = '$searchText'";
    } else if ($searchBy == "User_Id") {
        $query = "SELECT * FROM sales_record WHERE customer_id = '$searchText'";
    } else if ($searchBy == "User_Phone") {
        $query = "SELECT * FROM sales_record WHERE user_phone = '$searchText'";
    } else {
        echo "<script>alert('No Search Result Found.');</script>";
    }
}

$rows = mysqli_query($con, $query);
$Total_Rows = mysqli_num_rows($rows);
?>

<?php
include '../include/sidenav.php';
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-3">
            <a href="orders_add_new.php" class="btn btn-outline-dark">Add New sales_record</a>
        </div>
        <div class="col-md-8">
            <form action="" method="get" class="form-inline">
                <select name="SearchList" order_id="" required class="form-control">
                    <option value="">Select Field</option>
                    <option value="Order_Id">Order Id</option>
                    <option value="User_Id">User Id</option>
                    <option value="User_Phone">User Phone</option>
                </select>
                <input type="text" placeholder="Search By" name="SearchTxt" required class="form-control">
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
                <table class="table table-bordered table-striped table-hover table-borderless">
                    <thead>
                        <tr>
                            <th colspan="8" class="text-center">sales_record</th>
                        </tr>
                        <tr>
                            <th>Sales Record ID</th>
                            <th>Employee ID</th>
                            <th>Customer ID</th>
                            <th>Sales Record Date</th>
                            <th>Sales Record Time</th>
                            <th>Sales Record Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($rows)) {
                            echo "<tr>
                            <td>" . $data["sales_record_id"] . "</td>
                            <td>" . $data["employee_id"] . "</td>
                            <td>" . $data["customer_id"] . "</td>
                            <td>" . $data["sales_record_date"] . "</td>
                            <td>" . $data["sales_record_time"] . "</td>
                            <td>" . $data["sales_record_price"] . "</td>
                            <td><a href='orders_view.php?sales_record_id=$data[sales_record_id]' class='btn btn-success'>View</a></td>
            <td><a href='orders_update.php?sales_record_id=$data[sales_record_id]' class='btn btn-info'>Edit</a></td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo "No Rows Found";
            }
            ?>
        </div>
    </div>
</div>

<script>
    function Confirmation() {
        return confirm("Are You Sure To Delete Data");
    }
</script>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>