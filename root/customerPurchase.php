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
    <link rel="stylesheet" href="css/customer/customerPurchase.css">
    <link rel="stylesheet" href="css/customer/customerStyle.css">
    <link rel="stylesheet" href="css/layout/layout.css">

    <title>Customer | Purchase</title>
</head>
<body>
    <?php 
        include_once 'layout/header.php';
    ?>
    
    <main id="customer-purchase">
        <section id="customer-purchase-info">
            <h3 id="customer-purchase-info-heading">Delivery Address</h3>

            <form id="customer-purchase-info-detail" method='post' action="add-order.php">

                <div id="customer-purchase-info-detail-name" class="customer-purchase-info-detail-item">
                    <label class="text-bold customer-purchase-info-detail-label" for="purchase-customer-name">Name*</label>

                    <input type="text" id="purchase-customer-name" class="text-para customer-purchase-info-detail-input" name="purchase-customer-name" 
                    placeholder="E.g: Tony Diggory">
                </div>

                <div id="customer-purchase-info-detail-phone" class="customer-purchase-info-detail-item">
                    <label class="text-bold customer-purchase-info-detail-label" for="purchase-customer-phone">Phone*</label>

                    <input type="number" id="purchase-customer-phone" class="text-para customer-purchase-info-detail-input" name="purchase-customer-phone" 
                    placeholder="E.g: 091 234 5678">
                </div>

                <div id="customer-purchase-info-detail-location" class="customer-purchase-info-detail-item">
                    <label class="text-bold customer-purchase-info-detail-label" for="purchase-customer-location">Address*</label>

                    <input type="text" id="purchase-customer-location" class="text-para customer-purchase-info-detail-input" name="purchase-customer-location" 
                    placeholder="E.g: Handi Resco Building, 521 Kim Ma, Ha Noi">
                </div>

                <div id="customer-purchase-info-detail-cartId" class="customer-purchase-info-detail-item">
                    <label class="text-bold customer-purchase-info-detail-label" for="purchase-customer-cartId">CartID</label>

                    <input type="text" id="purchase-customer-cartId" class="text-para customer-purchase-info-detail-input" name="purchase-customer-cartId" readonly>
                </div>

                <div id="customer-purchase-info-detail-note" class="customer-purchase-info-detail-item">
                    <label class="text-bold customer-purchase-info-detail-label" for="purchase-customer-note">Note</label>

                    <textarea name="purchase-customer-note" id="purchase-customer-note" class="text-para" placeholder="E.g: 10th Floor, Tower A"></textarea>
                </div>
            </form>
        </section>

        <section id="customer-purchase-payment">
            <div id="customer-purchase-payment-method">
                <h3 id="customer-purchase-payment-method-heading">Payment Method</h3>

                <div class="customer-purchase-payment-method-option">
                    <p class="text-para">Cash payment when receiving goods</p>
                </div>
            </div>

            <div id="customer-purchase-payment-summary">
                <h3 id="customer-purchase-payment-summary-heading">Order Summary</h3>

                <div id="purchase-payment-summary-contain">
                    <div id="purchase-payment-summary-contain-product">
                        <div class="purchase-payment-summary-product-card">
                            <p class="text-para purchase-payment-summary-product-card-name">Misfit Ring</p>
                            <p class="text-para purchase-payment-summary-product-card-price">$45454.00</p>
                        </div>

                        <div class="purchase-payment-summary-product-card">
                            <p class="text-para purchase-payment-summary-product-card-name">Misfit Ring</p>
                            <p class="text-para purchase-payment-summary-product-card-price">$45454.00</p>
                        </div>
                    </div>

                    <div id="purchase-payment-summary-contain-price">
                        <div id="purchase-payment-summary-price-subtotal" class="purchase-payment-summary-price-card">
                            <p class="text-bold purchase-payment-summary-price-card-name">Subtotal</p>
                            <p class="text-para purchase-payment-summary-product-card-price">$45454.00</p>
                        </div>

                        <div id="purchase-payment-summary-price-shipping" class="purchase-payment-summary-price-card">
                            <p class="text-bold purchase-payment-summary-price-card-name">Shipping</p>
                            <p class="text-para purchase-payment-summary-product-card-price">$45454.00</p>
                        </div>

                        <div id="purchase-payment-summary-price-total" class="purchase-payment-summary-price-card">
                            <p class="text-bold purchase-payment-summary-price-card-name">Total</p>
                            <p class="text-para purchase-payment-summary-product-card-price">$45454.00</p>
                        </div>

                        <p id="purchase-payment-summary-price-vat" class="text-sub">(VAT included)</p>
                    </div>
                </div>

                <div id="purchase-payment-btn-list">
                    <button class="customer-purchase-buy-btn border-btn" name='addOrder'>
                        <p class="text-bold">Purchase Orders</p>
                    </button>

                    <button class="customer-purchase-select-btn border-btn" onClick="location.href='index.php#category'">
                        <p class="text-bold">Select More</p>
                    </button>
                </div>
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
    <script src="./js/customerPurchase.js"></script>
</body>
</html>