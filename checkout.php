<?php include 'layouts/header.php';?>

<?php
if (!empty($_SESSION['cart'])) {
    // let user in

    // send user to home page
} else {
    header('location:shop.php');
}
?>








<!-- checkout -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 py-5">
        <h2 class="form-weight-bold">Check Out</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="checkout-form" method="POST" action="server/place_order.php">
            <p class="text-center" style="color: red;">
                <?php if (isset($_GET['message'])) {
    echo $_GET['message'];
}?>
                <?php if (isset($_GET['message'])) {?>
                    <a class="btn btn-primary" href="login.php">Login</a>
                <?php }?>
            </p>

            <div class="form-group checkout-small-element">
                <label>Customer Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required />
            </div>
            
            <div class="form-group checkout-small-element">
                <label>Customer Phone Number</label>
                <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="phone" required />
            </div>

            <div class="form-group checkout-large-element">
                <label>Customer Street Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required />
            </div>

            <div class="form-group checkout-small-element">
                <label>Postcode</label>
                <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Postcode" required />
            </div>



            <div class="form-group checkout-small-element">
                <label>State</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="State" required />
            </div>



            <div class="form-group checkout-btn-container">
                <p>Total amount: RM <?php echo $_SESSION['total']; ?></p>
                <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order" />
            </div>
        </form>
    </div>
</section>










<?php
include 'layouts/footer.php';
?>