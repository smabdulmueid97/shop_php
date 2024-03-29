<?php include 'layouts/header.php';?>

<?php
include 'server/connection.php';

// use the search section
if (isset($_POST['search'])) {

    // 1. determain page nunmber
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        // if user has alredy entered page then page number is theone that they selected
        $page_no = $_GET['page_no'];
    } else {
        // if user just enterd the page then default page is 1
        $page_no = 1;
    }

    $category = $_POST['category'];
    $price = $_POST['price'];

    // 2. return number of products
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price<=?");
    $stmt1->bind_param('si', $category, $price);
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    // 3. products per page
    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    // 4. get all products
    $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset,$total_records_per_page");
    $stmt2->bind_param("si", $category, $price);
    $stmt2->execute();
    $products = $stmt2->get_result(); //[]

    // return all products
} else {
    // 1. determain page nunmber
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        // if user has alredy entered page then page number is theone that they selected
        $page_no = $_GET['page_no'];
    } else {
        // if user just enterd the page then default page is 1
        $page_no = 1;
    }
    // 2. return number of products
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    // 3. products per page
    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    // 4. get all products
    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();
}
?>




<!-- Search -->
<section id="search" class="my-5 py-5 ms-2">
    <div class="container mt-5 py-5 ">
        <p>Search Products</p>
        <hr>
    </div>

    <form action="shop.php" method="POST">
        <div class="row mx-auto container">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <p>Category</p>
                <div class="form-check">
                    <input class="form-check-input" value="shoes" type="radio" name="category" id="category_one" <?php if (isset($category) && $category == 'shoes') {echo 'checked';}?>>

                    <label class="form-check-label" for="flexRadioDefault1">
                        Shoes
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" value="coats" type="radio" name="category" id="category_two"<?php if (isset($category) && $category == 'coats') {echo 'checked';}?>>

                    <label class="form-check-label" for="flexRadioDefault2">
                        Coats
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" value="watches" type="radio" name="category" id="category_two"<?php if (isset($category) && $category == 'watches') {echo 'checked';}?>>

                    <label class="form-check-label" for="flexRadioDefault2">
                        Watches
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" value="bags" type="radio" name="category" id="category_two"<?php if (isset($category) && $category == 'bags') {echo 'checked';}?>>

                    <label class="form-check-label" for="flexRadioDefault2">
                        Bags
                    </label>
                </div>

            </div>
        </div>

        <div class="row mx-auto container mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <p>Price</p>
                <input type="range" class="form-range w-50" name="price" value="<?php if (isset($price)) {echo $price;} else {echo "100";}?>" min="1" max="1000" id="customRange2">
                <div class="w-50">
                    <span style="float: left;">1</span>
                    <span style="float: right;">1000</span>
                </div>
            </div>
        </div>

        <div class="form-group my-3 mx-3">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>
    </form>
</section>


<!-- Shop -->
<section id="shop" class="my-5 py-5">
    <div class="container mt-5 py-5">
        <h3>Our Products</h3>
        <hr>
        <p>Here you can check our products</p>
    </div>
    <div class="row mx-auto container">

        <?php while ($row = $products->fetch_assoc()) {?>

            <div onclick="window.location.href='<?php echo "single_product.php?product_id=" . $row['product_id']; ?>';" class="Product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3 mt-5" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>

                <a class="btn shop-buy-btn" href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>">Buy Now</a>
            </div>

        <?php }?>
        <nav aria-label="page navigation example" class="mx-auto">
            <ul class="pagination mt-5 mx-auto">

                <li class="page-item<?php if ($page_no <= 1) {echo 'disabled';}?>">
                <a class="page-link" href="<?php if ($page_no <= 1) {echo '#';} else {echo "?page_no=" . ($page_no - 1);}?>">Previous</a>
                </li>

                <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                <?php if ($page_no >= 3) {?>

                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="<?php echo "?page_no=" . $page_no; ?>"><?php echo $page_no; ?></a></li>



                <?php }?>


                <li class="page-item <?php if ($page_no >= $total_no_of_pages) {echo 'disabled';}?>"><a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {echo '#';} else {echo "?page_no=" . ($page_no + 1);}?>">Next</a></li>
            </ul>
        </nav>
    </div>
</section>

<?php
include 'layouts/footer.php';
?>