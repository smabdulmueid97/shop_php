<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Nav</title>

    <link rel="stylesheet" href="../css/admin.css">

       <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>

    <div class="container">
        <div class="side-nav">
            <a href="#" class="logo">
                <img src="../include/logo.jpg" class="logo-img">
                <img src="../include/logo.jpg" class="logo-icon">

            </a>
            <ul class="nav-links">
                <li><a href="../admins/admins_read.php">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <p>Admins</p>
                    </a></li>
                <li><a href="../orders/orders_read.php">
                        <span class="material-symbols-outlined">
                            local_shipping
                        </span>
                        <p>Orders</p>
                    </a></li>
                <li><a href="../order_items/order_items_read.php">
                        <span class="material-symbols-outlined">
                            package
                        </span>
                        <p>Order Items</p>
                    </a></li>
                <li><a href="../payments/payments_read.php">
                        <span class="material-symbols-outlined">
                            credit_card
                        </span>
                        <p>Payments</p>
                    </a></li>
                <li><a href="../products/products_read.php">
                        <span class="material-symbols-outlined">
                            view_list
                        </span>
                        <p>Products</p>
                    </a></li>
                <li><a href="../users/users_read.php">
                        <span class="material-symbols-outlined">
                            group
                        </span>
                        <p>Users</p>
                    </a>
                </li>
                <div class="active">
                </div>
            </ul>
        </div>
    </div>

<!-- </body>

</html> -->
