<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Nav</title>

    <link rel="stylesheet" href="../css/admin.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>

    <div class="container">
        <div class="side-nav">
            <a href="../shop.php" class="logo">
                <img src="../include/logo.jpg" class="logo-img">
                <img src="../include/logo.jpg" class="logo-icon">

            </a>
            <ul class="nav-links">
                <li><a href="../shop.php">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <p>Back to Sales</p>
                    </a></li>


                <!-- <li><a href="../orders/orders_read.php">
                        <span class="material-symbols-outlined">
                            local_shipping
                        </span>
                        <p>Orders</p>
                    </a></li> -->

                <li><a href="../Sales_Record/orders_read.php">
                        <span class="material-symbols-outlined">
                            package
                        </span>
                        <p>Sales Record</p>
                    </a></li>


                <!-- <li><a href="../payments/payments_read.php">
                        <span class="material-symbols-outlined">
                            credit_card
                        </span>
                        <p>Payments</p>
                    </a></li> -->


                <li><a href="../Import/products_read.php">
                        <span class="material-symbols-outlined">
                            view_list
                        </span>
                        <p>Import</p>
                    </a></li>


                <li><a href="../Employee/users_read.php">
                        <span class="material-symbols-outlined">
                            group
                        </span>
                        <p>Employee</p>
                    </a>
                </li>

                <div class="active">
                </div>
            </ul>
        </div>
    </div>

    <!-- </body>

</html> -->