<?php
include '../include/dbconnection.php';

$import_tea_id = $_GET["import_tea_id"] ?? "";

$query = "SELECT * FROM import_tea WHERE import_tea_id = '$import_tea_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Import Tea</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h1 class="jumbotron text-center bg-primary">Update Import Tea</h1>
                <form action="" method="post">
                    <input type="hidden" name="import_tea_id" value="<?php echo $data[0]; ?>">
                    <input type="text" class="form-control" name="supplier_id" id="" placeholder="Enter Supplier ID" value="<?php echo $data[1]; ?>">
                    <br>
                    <input type="text" class="form-control" name="tea_name" id="" placeholder="Enter Tea Name" value="<?php echo $data[2]; ?>">
                    <br>
                    <input type="text" class="form-control" name="tea_cost" id="" placeholder="Enter Tea Cost" value="<?php echo $data[3]; ?>">
                    <br>
                    <input type="text" class="form-control" name="tea_quantity" id="" placeholder="Enter Tea Quantity" value="<?php echo $data[4]; ?>">
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
    $import_tea_id = $_POST['import_tea_id'];
    $supplier_id = $_POST['supplier_id'];
    $tea_name = $_POST['tea_name'];
    $tea_cost = $_POST['tea_cost'];
    $tea_quantity = $_POST['tea_quantity'];

    $query = "UPDATE import_tea SET
        supplier_id = '$supplier_id',
        tea_name = '$tea_name',
        tea_cost = '$tea_cost',
        tea_quantity = '$tea_quantity'
        WHERE import_tea_id = '$import_tea_id'";

    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script> alert('Data has been Updated Successfully..');
        window.location.href = 'import_tea_read.php';
        </script>";
    } else {
        echo "<script> alert('Data Updation Failed..'); </script>";
    }
}
?>