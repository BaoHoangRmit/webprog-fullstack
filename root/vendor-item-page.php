<?php
    session_start();
    // if ($_SESSION['current_user']['role'] == 'customer') {
    //     header('location: index.php');
    // } elseif ($_SESSION['current_user']['role'] == 'vendor') {
    //     header('location: vendor-item-page.php');
    // } else {
    //     header('location: login-page.php');
    // }

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($_SESSION['current_user']['role'] == 'customer') {
            header('location: index.php');
        } elseif ($_SESSION['current_user']['role'] == 'shipper') {
            header('location: shipper-page.php');
        }
    } else {
        header('location: login-page.php');
    }

    include_once 'product-file-control.php';

    $_SESSION['allProducts'] = read_product_file();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Products</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./css/vendor-item.css">
    <link rel="stylesheet" href="./css/layout/layout.css">
</head>

<body>
    <?php 
        include_once 'layout/header.php';
    ?>

    <!-- Page main section -->
    <main>
        <h1 class="title">My Products</h1>

        <!-- Add Product button -->
        <div class="add-product">
            <a href='add-product-page.php'>
                <button class="add-btn">
                    Add Product
                </button>
            </a>
        </div>

        <!-- All Products -->
        <div class="row">
            <?php 
                $length = count($_SESSION['allProducts']);
                for ($i=0; $i < $length; $i++) { 
                    $product = $_SESSION['allProducts'][$i];
                    foreach ($product as $key => $value) {
                        $id = strval($product['id']);
                        $name = $product['name'];
                        $price = strval($product['price']);
                        $img = $product['img'];
                        $desc = $product['desc'];
                    }
                    echo "<div class='column'>";
                    echo "<div class='card'>";
                    echo "<h2 class='card-header'>" . $id . "</h2>";
                    echo "<a href='#'><img class='product-img' src='" . $img . "' alt='product image'></a>";
                    echo "<div class='card-text'>";
                    echo "<h4 class='product-name'>" . $name . "</h4>";
                    echo "<p><small>" . $price . "$</small></p>";
                    echo "<p class='description'>" . $desc . "</p>";
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                
            ?>
            <!-- <div class="column">
                <div class="card">
                    <h2 class="card-header">#123456</h2>
                    <a href="#"><img class="product-img" src="./img/iphone.png" alt="product image"></a>
                    <div class="card-text">
                        <h4 class="product-name">iPhone</h4>
                        <p><small>$200</small></p>
                        <p class="description">The iPhone is a smartphone made by Apple that combines a computer, iPod, digital camera and cellular phone into one device with a touchscreen interface.
                        The iPhone runs the iOS operating system, and in 2021 when the iPhone 13 was introduced, it offered up to 1 TB of storage and a 12-megapixel camera.</p>
                    </div>
                </div>
            </div> -->
        </div>
    </main>

    <?php
        include_once 'layout/footer.html';
    ?>
</body>

</html>