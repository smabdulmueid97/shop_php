<?php
include '../include/dbconnection.php';

$employee_id = $_GET["employee_id"] ?? "";

$query = "SELECT * FROM employee WHERE employee_id = '$employee_id'";
$row = mysqli_query($con, $query);
$data = mysqli_fetch_array($row);

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Employee</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4 mx-auto">

                <h1 class="jumbotron text-center bg-primary">Update Employee</h1>

                <form action="" method="post">

                    <input type="hidden" name="employee_id" value="<?php echo $data['employee_id']; ?>">

                    <input type="text" class="form-control" name="employee_first_name" id="" placeholder="Enter First Name" value="<?php echo $data['employee_first_name']; ?>">
                    <br>

                    <input type="text" class="form-control" name="employee_last_name" id="" placeholder="Enter Last Name" value="<?php echo $data['employee_last_name']; ?>">
                    <br>

                    <input type="text" class="form-control" name="employee_phone_number" id="" placeholder="Enter Phone Number" value="<?php echo $data['employee_phone_number']; ?>">
                    <br>

                    <input type="email" class="form-control" name="employee_email" id="" placeholder="Enter Email" value="<?php echo $data['employee_email']; ?>">
                    <br>

                    <input type="date" class="form-control" name="employee_birthdate" id="" placeholder="Enter Birthdate" value="<?php echo $data['employee_birthdate']; ?>">
                    <br>

                    <select name="employee_gender" class="form-control">
                        <option value="Male" <?php if ($data['employee_gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($data['employee_gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Other" <?php if ($data['employee_gender'] == 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                    <br>

                    <input type="date" class="form-control" name="employee_hiredate" id="" placeholder="Enter Hire Date" value="<?php echo $data['employee_hiredate']; ?>">
                    <br>

                    <input type="password" class="form-control" name="employee_login_password" id="" placeholder="Enter Login Password" value="<?php echo $data['employee_login_password']; ?>">
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

    $employee_id = $_POST['employee_id'];
    $employee_first_name = $_POST['employee_first_name'];
    $employee_last_name = $_POST['employee_last_name'];
    $employee_phone_number = $_POST['employee_phone_number'];
    $employee_email = $_POST['employee_email'];
    $employee_birthdate = $_POST['employee_birthdate'];
    $employee_gender = $_POST['employee_gender'];
    $employee_hiredate = $_POST['employee_hiredate'];
    $employee_login_password = $_POST['employee_login_password'];

    $query = "UPDATE employee SET
        employee_first_name = '$employee_first_name',
        employee_last_name = '$employee_last_name',
        employee_phone_number = '$employee_phone_number',
        employee_email = '$employee_email',
        employee_birthdate = '$employee_birthdate',
        employee_gender = '$employee_gender',
        employee_hiredate = '$employee_hiredate',
        employee_login_password = '$employee_login_password'
        WHERE employee_id = '$employee_id'";

    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script> 
            alert('Data has been updated successfully.');
            window.location.href = 'users_read.php';
        </script>";
    } else {
        echo "<script> 
            alert('Failed to update data.');
        </script>";
    }
}
?>