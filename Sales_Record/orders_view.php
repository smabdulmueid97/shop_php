<?php
include '../include/dbconnection.php';

$sales_record_id = $_GET["sales_record_id"] ?? "";

$query = "SELECT * FROM sales_record WHERE sales_record_id = '$sales_record_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Sales Record</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">View Sales Record</h1>

                <div>
                    <label for="sales_record_price">Sales Record Price: </label>
                    <span><?php echo $data[1] ?? ""; ?></span>
                </div>
                <div>
                    <label for="sales_record_date">Sales Record Date: </label>
                    <span><?php echo $data[3] ?? ""; ?></span>
                </div>
                <div>
                    <label for="sales_record_time">Sales Record Time: </label>
                    <span><?php echo $data[4] ?? ""; ?></span>
                </div>
                <div>
                    <label for="employee_id">Employee ID: </label>
                    <span><?php echo $data[5] ?? ""; ?></span>
                </div>
                <div>
                    <label for="customer_id">Customer ID: </label>
                    <span><?php echo $data[6] ?? ""; ?></span>
                </div>

                <br>

                <button onclick="goBack()" class="btn btn-primary btn-block">Back</button>

            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>