<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // echo 'ok' . 'login van return $_SESSION[current_user] voi mang rong -> van chuyen my account khi an quay lai sau khi dang nhap sai mkhau';
        // echo '<br>';
        // echo 'test above function again but for now have fixed';
        if (isset($_SESSION['current_user'])) {
		    echo '<pre>';
		    print_r($_SESSION['current_user']);
		  	echo '</pre>';
		}
    } else {
        // echo 'not ok';
    }
    // if (isset($_SESSION['current_user'])) {
    //     echo '<pre>';
    //     print_r($_SESSION['current_user']);
    //       echo '</pre>';
    // } else {
    //     echo 'no cookie';
    // }
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
    <!-- <link rel="stylesheet" href="css/customer/index.css"> -->
    <link rel="stylesheet" href="css/customer/customerStyle.css">
    <link rel="stylesheet" href="css/layout/layout.css">

    <title>Customer | Home</title>
</head>
<body id = "customerIndex">
    
    <?php 
        include_once 'layout/header.php';
    ?>

    <main>
        <div>
            <a href="customer-register-page.php" class="text-muted">Customer Register Page</a>
        </div>
        <div>
        <a href="vendor-register-page.php" class="text-muted">Vendor Register Page</a>
        </div>
        <div>
        <a href="shipper-register-page.php" class="text-muted">Shipper Register Page</a>
        </div>
    </main>
    
    <?php
        include_once 'layout/footer.html';
    ?>

    <!-- JS -->
    <script src="./js/customerMain.js"></script>
    <script src="./js/customerHome.js"></script>
</body>
</html>