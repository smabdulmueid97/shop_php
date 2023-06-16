<?php include 'layouts/header.php'; ?>

<?php

// include 'server/connection.php';

if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM product_tea_powder WHERE product_tea_powder_id = ?");

    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    $product = $stmt->get_result(); //[]

    // no product id was given
} else {
    header('location: shop.php');
}
?>





<!-- Single product -->
<section class="container single-product my-5 pt-5">
    <div class="row mt-5 ">

        <?php while ($row = $product->fetch_assoc()) { ?>

            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pd-1" src="assets/imgs/<?php echo $row['tea_powder_image']; ?>" id="mainImg">
                <div class="small-img-group">
                    <!-- <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['tea_powder_image']; ?>" width="100%" class="small-img">
                    </div> -->
<!-- 
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img">
                    </div>

                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img">
                    </div>

                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img">
                    </div> -->
                </div>
            </div>




            <div class="col-lg-6 col-md-12 col-12">
                <!-- <h6>Men/Items</h6> -->
                <h3 class="py-5"><?php echo $row['tea_powder_name']; ?></h3>
                <h2>RM <?php echo $row['tea_powder_price']; ?></h2>

                <form method="POST" action="cart.php">

                    <input type="hidden" name="product_tea_powder_id" value="<?php echo $row['product_tea_powder_id']; ?>" />

                    <input type="hidden" name="tea_powder_image" value="<?php echo $row['tea_powder_image']; ?>" />

                    <input type="hidden" name="tea_powder_name" value="<?php echo $row['tea_powder_name']; ?>" />

                    <input type="hidden" name="tea_powder_price" value="<?php echo $row['tea_powder_price']; ?>" />

                    <input type="number" name="tea_powder_quantity" value="1">


                    <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>

                </form>



                <!-- <h4 class="mt-5 mb-5">Product details</h4> -->
                <!-- <span>
                    <?php echo $row['product_description']; ?>
                </span> -->

            </div>
        <?php } ?>

    </div>
</section>

<!-- Related products -->
<!-- <section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Related Products</h3>
        <hr class="mx-auto" />
    </div>
    <div class="row mx-auto container-fluid">
        <div class="Product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/featured1.jpg" />

            <h5 class="p-name">Tea</h5>
            <h4 class="p-price">RM 199.8</h4>
            <button class="buy-btn">Purchase</button>
        </div>

        <div class="Product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/featured2.jpg" />

            <h5 class="p-name">Black Tea</h5>
            <h4 class="p-price">RM 199.8</h4>
            <button class="buy-btn">Purchase</button>
        </div>

        <div class="Product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/featured3.jpg" />

            <h5 class="p-name">Milk Tea</h5>
            <h4 class="p-price">RM 199.8</h4>
            <button class="buy-btn">Purchase</button>
        </div>

        <div class="Product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/featured4.jpg" />

            <h5 class="p-name">Milk Coffee</h5>
            <h4 class="p-price">RM 199.8</h4>
            <button class="buy-btn">Purchase</button>
        </div>
    </div>
</section> -->

<!-- <script>
    var mainImg = document.getElementById("mainImg")
    var smallIng = document.getElementsByClassName("small-img");

    for (let i = 0; i < 4; i++) {
        smallIng[i].onclick = function() {
            mainImg.src = smallIng[i].src;
        }
    }
</script> -->


<?php
include 'layouts/footer.php';
?>