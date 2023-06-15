<?php include 'layouts/header.php';


// if (isset($_SESSION['logged_in'])) {
//     header('location: account.php');
//     exit;
// }

// session_start();

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT employee_id, employee_first_name, employee_last_name, employee_email, employee_login_password FROM employee WHERE employee_email=? AND employee_login_password=? LIMIT 1");

    $stmt->bind_param('ss', $email, $password);
    if ($stmt->execute()) {
        $stmt->bind_result($employee_id, $employee_first_name, $employee_last_name, $employee_email, $employee_login_password);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $row = $stmt->fetch();
            $_SESSION['employee_id'] = $employee_id;
            $_SESSION['emloyeee_first_name'] = $employee_first_name;
            $_SESSION['emloyeee_last_name'] = $employee_last_name;
            $_SESSION['employee_email'] = $employee_email;
            $_SESSION['logged_in'] = true;
            header('location: account.php?login_success=logged in successfully');
        } else {
            header('location: login.php?error=could not veryify your account');
        }
    } else {
        // error
        header('location: login.php?error=something went wrong');
    }
}
?>



<?php
include 'layouts/header.php'
?>




<!-- Login -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 py-5">
        <h2 class="form-weight-bold">Employee Login</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" method="POST" action="login.php">
            <p style="color: red" class="text-center"><?php if (isset($_GET['error'])) {
                                                            echo $_GET['error'];
                                                        } ?></p>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required />
            </div>

            <div class="form-group">
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login" />
            </div>

            <div class="form-group">
                <a id="register-url" href="register.php" class="btn">Dont have account? Register</a>
            </div>

        </form>
    </div>
</section>





<?php
include 'layouts/footer.php';
?>