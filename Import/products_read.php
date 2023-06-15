<?php
include '../include/dbconnection.php';

$query = "SELECT * FROM import_tea";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $searchText = $_GET['SearchTxt'];

    if ($searchBy == "Product_Id") {
        $query = "SELECT * FROM import_tea WHERE import_tea_id = '$searchText'";
    } else if ($searchBy == "Product_Name") {
        $query = "SELECT * FROM import_tea WHERE tea_name = '$searchText'";
    } else if ($searchBy == "Product_Category") {
        $query = "SELECT * FROM import_tea WHERE tea_category = '$searchText'";
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
            <a href="products_add_new.php" class="btn btn-outline-dark">Add New import_tea</a>
        </div>
        <div class="col-md-8">
            <form action="" method="get" class="form-inline">
                <select name="SearchList" order_id="" required class="form-control">
                    <option value="">Select Field</option>
                    <option value="Product_Id">Product Id</option>
                    <option value="Product_Name">Product Name</option>
                    <option value="Product_Category">Product Category</option>
                </select>
                <input type="text" placeholder="Search By" name="SearchTxt" required class="form-control">
                <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                <a href="products_read.php" class="btn btn-danger">Reset</a>
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
                            <th colspan="8" class="text-center">import_tea</th>
                        </tr>
                        <tr>
                            <th>Import Tea ID</th>
                            <th>Supplier ID</th>
                            <th>Tea Name</th>
                            <th>Tea Cost</th>
                            <th>Tea Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($rows)) {
                            echo "<tr>
                            <td>" . $data["import_tea_id"] . "</td>
                            <td>" . $data["supplier_id"] . "</td>
                            <td>" . $data["tea_name"] . "</td>
                            <td>" . $data["tea_cost"] . "</td>
                            <td>" . $data["tea_quantity"] . "</td>
                            <td><a href='products_update.php?import_tea_id=$data[import_tea_id]' class='btn btn-info'>Edit</a></td>
                            <td><a href='products_delete.php?import_tea_id=$data[import_tea_id]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
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