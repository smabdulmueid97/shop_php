<?php
include '../include/dbconnection.php';

$query = "select * from users";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $search_text = $_GET['SearchTxt'];

    if ($searchBy == "User_Id") {
        $query = "SELECT * from users WHERE user_id = '$search_text'";
    } else if ($searchBy == "User_Name") {
        $query = "SELECT * from users WHERE user_name = '$search_text'";
    } else if ($searchBy == "User_Email") {
        $query = "SELECT * from users WHERE user_email = '$search_text'";

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
<title>Users</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body> -->

   <?php
include '../include/sidenav.php';
?>



    <div class="container">


        <div class="row mt-3">

            <div class="col-md-3">

            <a href="users_add_new.php" class="btn btn-outline-dark">Add New Users</a>

            </div>

            <div class="col-md-8">

                <form action="" method="get" class="form-inline">

                    <select name="SearchList" users_id="" required class="form-control">
                        <option value="">Select Field</option>
                        <option value="User_Id">User Id</option>
                        <option value="User_Name">User Name</option>
                        <option value="User_Email">User Email</option>
                    </select>
                    <input type="text" placeholder="Search By " name="SearchTxt" required class="form-control">

                    <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                    <a href="users_read.php" class="btn btn-danger">Reset</a>


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
            <th colspan="4" class="text-center">Users</th>
        </tr>
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Password</th>
        </tr>
    </thead>
    <?php
echo "<tbody>";
    while ($data = mysqli_fetch_assoc($rows)) {
        echo "<tr>
              <td>" . $data["user_id"] . "</td>
              <td>" . $data["user_name"] . "</td>
              <td>" . $data["user_email"] . "</td>
              <td>" . $data["user_password"] . "</td>
            <td><a href='users_update.php?user_id=$data[user_id]' class='btn btn-info'>Edit</a></td>
            <td><a href='users_delete.php?user_id=$data[user_id]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
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