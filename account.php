<?php include 'layouts/header.php';?>

<?php

session_start();

include 'server/connection.php';

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['employee_email']);
        unset($_SESSION['employee_first_name']);
        unset($_SESSION['employee_last_name']);
        header('location: login.php');
        exit;
    }
}

if (isset($_POST['change_password'])) {

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_email = $_SESSION['employee_email'];

    //if passwords don't match
    if ($password !== $confirmPassword) {
        header('location: account.php?error=passwords dont match');

        //if password is less then 6 char
    } else if (strlen($password) < 6) {
        header('location: account.php?error=password must be atleast 6 charachters');

        // no errors
    } else {
        $stmt = $conn->prepare("UPDATE employee SET employee_login_password=? WHERE employee_email=?");
        $stmt->bind_param('ss', $password, $user_email);

        if ($stmt->execute()) {
            header('location: account.php?message=password has been updated successfully');
        } else {
            header('location: account.php?error=could not update password');
        }
    }
}
?>

<section class="my-5 py-5">
    <div class="row container mx-auto">

        <?php if (isset($_GET['payment_message'])) {?>
            <p class="mt-5 text-center" style="color:green;"><?php echo $_GET['payment_message']; ?></p>
        <?php }?>

        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12
            col-sm-12">
            <p class="text-center" style="color: green"><?php if (isset($_GET['register_success'])) {
    echo $_GET['register_success'];
}?></p>
            <p class="text-center" style="color: green"><?php if (isset($_GET['login_success'])) {
    echo $_GET['login_success'];
}?></p>

            <h3 class="font-weight-bold">Account info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name <span><?php if (isset($_SESSION['emloyeee_first_name'])) {
    echo $_SESSION['emloyeee_first_name'];
}?></span></p>
                <p>Email: <span><?php if (isset($_SESSION['employee_email'])) {
    echo $_SESSION['employee_email'];
}?></span></p>
                <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <form id="account-form" method="POST" action="account.php">
                <p class="text-center" style="color: red">
                    <?php if (isset($_GET['error'])) {
    echo $_GET['error'];
}?></p>

                <p class="text-center" style="color: green">
                    <?php if (isset($_GET['message'])) {
    echo $_GET['message'];
}?></p>

                <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required />
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Password" required />
                </div>
                <div class="form-group">
                    <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include 'layouts/footer.php';
?>