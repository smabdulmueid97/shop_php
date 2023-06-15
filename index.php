<?php include 'layouts/header.php'; ?>


<!-- home -->
<section id="home">
  <div class="container">
    <h5>NEW ARRIVELS</h5>
    <h1><span>Best Prices</span> This Season</h1>
    <p>
      Eshop offers the best best products for the most affordable prices
    </p>
    <button>Buy Now</button>
  </div>
</section>

<!-- Brand -->
<section id="Brand" class="container">
  <div class="row">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg" />
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg" />
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg" />
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg" />
  </div>
</section>

<!-- New -->
<section id="new" class="w-100">
  <div class="row p-0 m-0">
    <!-- One -->
    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/1.jpg" />
      <div class="details">
        <h2>Milk Tea</h2>
        <button class="text-uppercase">Shop Now</button>
      </div>
    </div>

    <!-- Two -->
    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/2.jpg" />
      <div class="details">
        <h2>Best Coffee</h2>
        <button class="text-uppercase">Shop Now</button>
      </div>
    </div>

    <!-- Three -->
    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/3.jpg" />
      <div class="details">
        <h2>50% OFF Cakes</h2>
        <button class="text-uppercase">Shop Now</button>
      </div>
    </div>
  </div>
</section>

<!-- Featrured -->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Our Featured</h3>
    <hr class="mx-auto" />
    <p>Here you can check our featured products</p>
  </div>
  <div class="row mx-auto container-fluid">

    <?php include 'server/get_featured_products.php'; ?>
    <?php while ($row = $featured_products->fetch_assoc()) { ?>

      <div class="Product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />


        <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
        <h4 class="p-price">RM <?php echo $row['product_price'] ?></h4>

        <a href="<?php echo "single_product.php? product_id=" . $row['product_id']; ?>">
          <button class="buy-btn">Buy Now</button>
        </a>

      </div>

    <?php } ?>

  </div>
</section>



</div>
</section>


<?php
include 'layouts/footer.php';
?>