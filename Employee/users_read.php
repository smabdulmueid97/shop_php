
<?php
include '../include/dbconnection.php';

$query = "SELECT * FROM employee";

if (isset($_GET['SearchBtn'])) {
    $searchBy = $_GET['SearchList'];
    $searchText = $_GET['SearchTxt'];

    if ($searchBy == "Employee_Id") {
        $query = "SELECT * FROM employee WHERE employee_id = '$searchText'";
    } else if ($searchBy == "Employee_FirstName") {
        $query = "SELECT * FROM employee WHERE employee_first_name = '$searchText'";
    } else if ($searchBy == "Employee_Email") {
        $query = "SELECT * FROM employee WHERE employee_email = '$searchText'";
    } else {
        echo "<script>alert('No Search Result Found.');</script>";
    }
}

$rows = mysqli_query($con, $query);
$totalRows = mysqli_num_rows($rows);
?>

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
                <select name="SearchList" required class="form-control">
                    <option value="">Select Field</option>
                    <option value="Employee_Id">Employee Id</option>
                    <option value="Employee_FirstName">Employee First Name</option>
                    <option value="Employee_Email">Employee Email</option>
                </select>
                <input type="text" placeholder="Search By" name="SearchTxt" required class="form-control">
                <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                <a href="users_read.php" class="btn btn-danger">Reset</a>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <?php
            if ($totalRows != 0) {
                ?>
                <table class="table table-bordered table-striped table-hover table-borderless">
                    <thead>
                        <tr>
                            <th colspan="8" class="text-center">Employees</th>
                        </tr>
                        <tr>
                            <th>Employee Id</th>
                            <th>Department Id</th>
                            <th>Manager Id</th>
                            <th>Job Id</th>
                            <th>Address Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                            <th>Gender</th>
                            <th>Hire Date</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($rows)) {
                            echo "<tr>
                                      <td>" . $data["employee_id"] . "</td>
                                      <td>" . $data["department_id"] . "</td>
                                      <td>" . $data["manager_id"] . "</td>
                                      <td>" . $data["job_id"] . "</td>
                                      <td>" . $data["address_id"] . "</td>
                                      <td>" . $data["employee_first_name"] . "</td>
<td>" . $data["employee_last_name"] . "</td>
<td>" . $data["employee_phone_number"] . "</td>
<td>" . $data["employee_email"] . "</td>
<td>" . $data["employee_birthdate"] . "</td>
<td>" . $data["employee_gender"] . "</td>
<td>" . $data["employee_hiredate"] . "</td>
<td>" . $data["employee_login_password"] . "</td>
<td><a href='users_update.php?employee_id=$data[employee_id]' class='btn btn-info'>Edit</a></td>
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