<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($_SESSION['current_user']['role'] == 'shipper') {
            header('location: shipper-page.php');
        } elseif ($_SESSION['current_user']['role'] == 'vendor') {
            header('location: vendor-item-page.php');
        }
    } else {
       header('location: login-page.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/customer/customerCart.css">
    <link rel="stylesheet" href="./css/customer/customerStyle.css">
    <link rel="stylesheet" href="css/layout/layout.css">

    <title>Customer | Cart</title>
</head>
<body id="customerCart">
    <?php 
        include_once 'layout/header.php';
    ?>
    
    <main>
        <section id="cart-popup">
            <div id="cart-popup-card">
                <div id="customer-popup-card-text">
                    <h2>A product successfully added to your shopping cart</h2>
                </div>

                <div id="cart-popup-card-button">
                    <button id="cart-popup-close" class="border-btn">
                        <p class="text-bold">Close</p>
                    </button>

                    <button id="cart-popup-confirm" class="bg-btn">
                        <p class="text-bold">Confirm</p>
                    </button>
                </div>
            </div>
        </section>

        <section id="customer-cart">
            <h2 id="customer-cart-heading">Shopping Bag</h2>
            <div id="cart-container">
                <h3 id="cart-container-warning">You currently have 0 item in your shopping bag.</h3>

                <div id="cart-list">
                    <div class="cart-card">
                        <figure class="cart-card-image">
                            <img src="./img/itemTest.png" alt="thumbnail">
                        </figure>

                        <div class="cart-card-info">
                            <div class="cart-card-info-detail">
                                <div class="cart-card-info-detail-basic">
                                    <p class="text-para">MisFit Ring</p>
                                    
                                    <p class="text-sub">Vendor Name</p>
                                </div>

                                <div class="cart-card-info-detail-remove">
                                    <span class="text-sub">Remove</span>
                                </div>
                            </div>

                            <p class="text-bold cart-card-info-price">
                                $454545.00
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="customer-cart-btn-list">
                <button class="customer-cart-purchase-btn border-btn" onClick="location.href='customerPurchase.php'">
                    <p class="text-bold">Place Orders</p>
                </button>
    
                <button class="customer-cart-select-btn border-btn" onClick="location.href='index.php#category'">
                    <p class="text-bold">Select More</p>
                </button>
            </div>
        </section>



        <button id="scroll-top-btn" class="scroll-top-btn">
            <span>&#708</span>
        </button>
    </main>

    <?php
        include_once 'layout/footer.html';
    ?>

    <!-- JS -->
    <script src="./js/customerMain.js"></script>
    <script src="./js/customerCart.js"></script>
</body>
</html>