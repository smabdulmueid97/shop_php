<?php
include '../include/dbconnection.php';

$query = "select * from admins";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $search_text = $_GET['SearchTxt'];

    if ($searchBy == "Admin_Id") {
        $query = "SELECT * from admins WHERE admin_id = '$search_text'";
    } else if ($searchBy == "Admin_Name") {
        $query = "SELECT * from admins WHERE admin_name = '$search_text'";
    } else if ($searchBy == "Admin_Email") {
        $query = "SELECT * from admins WHERE admin_email = '$search_text'";

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
<title>Admins</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body> -->

   <?php
include '../include/sidenav.php';
?>


    <div class="container">


        <div class="row mt-3">

            <div class="col-md-3">

            <a href="admins_add_new.php" class="btn btn-outline-dark">Add New Admins</a>

            </div>

            <div class="col-md-8">

                <form action="" method="get" class="form-inline">

                    <select name="SearchList" admins_id="" required class="form-control">
                        <option value="">Select Field</option>
                        <option value="Admin_Id">Admin Id</option>
                        <option value="Admin_Name">Admin Name</option>
                        <option value="Admin_Email">Admin Email</option>
                    </select>
                    <input type="text" placeholder="Search By " name="SearchTxt" required class="form-control">

                    <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                    <a href="admins_read.php" class="btn btn-danger">Reset</a>


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
            <th colspan="4" class="text-center">Admins</th>
        </tr>
        <tr>
            <th>Admin Id</th>
            <th>Admin Name</th>
            <th>Admin Email</th>
            <th>Admin Password</th>
        </tr>
    </thead>
    <?php
echo "<tbody>";
    while ($data = mysqli_fetch_assoc($rows)) {
        echo "<tr>
              <td>" . $data["admin_id"] . "</td>
              <td>" . $data["admin_name"] . "</td>
              <td>" . $data["admin_email"] . "</td>
              <td>" . $data["admin_password"] . "</td>
            <td><a href='admins_update.php?admin_id=$data[admin_id]' class='btn btn-info'>Edit</a></td>
            <td><a href='admins_delete.php?admin_id=$data[admin_id]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
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