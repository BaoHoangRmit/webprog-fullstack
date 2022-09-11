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
        <div class="grid-container">
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
                    echo "<div class='grid-item'>";
                    echo "<p class='item-id'>" . $id . "</p>";
                    echo "<a href='#'><img class='product-img' src='" . $img . "' alt='product image'></a>";
                    echo "<p class='product-name'>" . $name . "</p>";
                    echo "<p class='price'>" . $price . "$</p>";
                    echo "<p class='description'>" . $desc . "</p>";
                    echo '</div>';
                }
                
            ?>
        </div>
    </main>

    <?php
        include_once 'layout/footer.html';
    ?>
</body>

</html>