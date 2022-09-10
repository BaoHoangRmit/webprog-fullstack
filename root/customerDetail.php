<?php 
    session_start();

    include_once 'product-file-control.php';

    $_SESSION['allProducts'] = read_product_file();
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
    <link rel="stylesheet" href="css/customer/customerDetail.css">
    <link rel="stylesheet" href="css/customer/customerStyle.css">
    <link rel="stylesheet" href="css/layout/layout.css">

    <title>Customer | Product</title>
</head>
<body id="customerDetail">
    <?php 
        include_once 'layout/header.php';
    ?>
    
    <main>
        <nav id="product-breadcrumb">
            <ul id="product-breadcrumb-list">
                <li id="product-breadcrumb-home" class="product-breadcrumb-item">
                    <a href="./index.php" class="text-h4">Home</a>
                </li>

                <li class="product-breadcrumb-sep">
                    <span>&#10095;</span>
                </li>

                <li id="product-breadcrumb-item" class="product-breadcrumb-item">
                    <p class="text-h4">Product</p>
                </li>
            </ul>
        </nav>

        <section id="product-popup">
            <div id="product-popup-card">
                <div id="product-popup-card-text">
                    <h2>A product successfully added to your shopping cart</h2>
                </div>

                <div id="product-popup-card-button">
                    <button id="product-popup-close" class="border-btn">
                        <p class="text-bold">Close</p>
                    </button>

                    <button id="product-popup-home" class="bg-btn" onClick="location.href='customerCart.php'">
                        <p class="text-bold">Cart</p>
                    </button>
                </div>
            </div>
        </section>

        <section id="product-detail">
            <div id="product-detail-container">
                <?php 
                    $length = count($_SESSION['allProducts']);
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $url_components = parse_url($actual_link);
                    parse_str($url_components['query'], $params);
                    // echo $params['productID'];


                    for ($i=0; $i < $length; $i++) { 
                        $product = $_SESSION['allProducts'][$i];
                        foreach ($product as $key => $value) {
                            $check1 = 0;
                            $real_id = "itemFS{$value}";
                            if ($key == 'id' && $real_id == $params['productID']) {
                                $id = strval($product['id']);
                                $name = $product['name'];
                                $price = strval($product['price']);
                                $img = $product['img'];
                                $desc = $product['desc'];
                                $ven = $product['ven'];
                                $check1 = 1;
                                break;
                            } else {
                                continue;
                            }
                        }

                        if ($check1 == 1) {
                            break;
                        } else {
                            continue;
                        } 
                    }
                    
                    echo "<figure id='product-detail-image'>";
                    echo "<img id='product-detail-image-img' src='" . $img . "' alt='" . $name . "'>";
                    echo "</figure>";
                    echo "<div id='product-detail-info'>";
                    echo "<h2 id='product-detail-info-name'>" . $name . "</h2>";
                    echo "<p id='product-detail-info-vendor' class='text-bold'>" . $ven . "</p>";
                    echo "<p id='product-detail-info-price' class='text-bold'>$" . $price . "</p>";
                    echo "<p id='product-detail-info-desc' class='text-para'>" . $desc . "</p>";
                    echo "<button class='add-cart-btn border-btn'><p class='text-bold'>Add to Cart</p></button>";
                    echo "</div>";

                ?>
                <!-- <figure id="product-detail-image">
                    <img id="product-detail-image-img" src="./img/itemTest.png" alt="itemTest">
                </figure>
    
                <div id="product-detail-info">
                    <h2 id="product-detail-info-name" >Misfit Ring</h2>

                    <p id="product-detail-info-vendor" class="text-bold">Vendor</p>

                    <p id="product-detail-info-price" class="text-bold">$120</p>

                    <p id="product-detail-info-desc" class="text-para">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a aliquet sem. Nunc vestibulum, diam eget tincidunt facilisis, elit nisi aliquam risus, at pharetra purus mi eget ante. Morbi ipsum elit, volutpat eget laoreet quis, accumsan vel ante. Donec non magna sed turpis finibus rutrum non quis est. Integer tincidunt turpis gravida sodales interdum. Donec dui metus, hendrerit quis arcu non, rhoncus condimentum justo. Etiam et odio bibendum, pretium massa quis, commodo sapien, unc vestibulum.
                    </p>

                    <button class="add-cart-btn border-btn"><p class="text-bold">Add to Cart</p></button>
                </div> -->
            </div>
        </section>

        <section id="product-policy">
            <div id="product-policy-delivery">
                <p id="product-policy-delivery-heading" class="text-bold product-policy-div-heading">Delivery / Shipping</p>
                <p id="product-policy-delivery-contain">
                    - Your order of US$ 300.00 or more gets free standard delivery.
                    <br>
                    <br>
                    - Standard delivered 4-5 Rest Days.
                    <br>
                    <br>
                    - Express delivered 2-4 Business Days
                    <br>
                    <br>
                    - Your order of US$ 300.00 or more gets free standard delivery.
                </p>
            </div>

            <div id="product-policy-return">
                <p id="product-policy-return-heading" class="text-bold product-policy-div-heading">Delivery / Shipping</p>
                <p id="product-policy-return-contain">
                    - All sales are final, The Retailer does not accept requests for cancellation of orders or the return of items.
                </p>
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
    <script src="./js/customerDetail.js"></script>
</body>
</html>