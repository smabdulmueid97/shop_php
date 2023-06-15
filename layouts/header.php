<?php
$conn = mysqli_connect("localhost", "root", "", "shop_php")
    or die("Couldn't connect to database");


session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
            <a href="shop.php"><img class="logo" src="assets/imgs/logo.jpg" /></a>
            <h2 class="brand"><a id="brand_name" href="shop.php">Coffeepawa</a></h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Product</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Import/products_read.php">Import</a>
                    </li>



                    <li class="nav-item">
                        <a href="cart.php"><i class="fa fa-solid fa-heart">
                                <?php if (isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) { ?>
                                    <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>
                                <?php } ?>
                            </i>
                        </a>
                        <a href="account.php"><i class="fa fa-solid fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>