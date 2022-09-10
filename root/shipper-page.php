<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($_SESSION['current_user']['role'] == 'customer') {
            header('location: index.php');
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
    <title>Shipper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/shipper/shipper.css">
    <link rel="stylesheet" href="css/layout/layout.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php 
        include_once 'layout/header.php';
    ?>

    <!-- Page main section -->
    <main>
        <div class="container my-5">
            <h1 class="text-center">Active Orders</h1>
        </div>
        <!-- Showing active orders -->
        <div class="container">
            <!-- The order -->
            <div class="card mx-5 rounded-0 my-4">
                <h5 class="card-header">
                    <div class="row">
                        <div class="col-md-10">ID: #123456</div>
                        <div class="col-md-2">Status: <span class="text-success">Active</span></div>
                    </div>
                </h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Distribution Hub</li>
                        <li class="list-group-item">Created at: 09-02-2022 15:46</li>
                        <li class="list-group-item">Customer:</li>
                        <li class="list-group-item">Address: </li>
                    </ul>
                    <div class="text-end">
                        <button type="button" class="btn btn-dark rounded-0" id="Btn#123456" onclick="openModal('Modal#123456')">View Detail</button>
                    </div>

                </div>
            </div>

                <!-- Order's Modal -->
                <div id="Modal#123456" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Order #123456</h4>
                            <span class="close" onclick="closeModal('Modal#123456')">&times;</span>
                        </div>

                        <div class="modal-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <label>Customer: </label>#Name - #Phone
                                </li>
                                <li class="list-group-item">
                                    <label>Location: </label>Location
                                </li>
                                <li class="list-group-item">
                                    <label>Shopping cart </label>
                                    <div class="card my-3 rounded-0">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 my-2">
                                                <img src="../img/iphone.png" class="card-img" alt="item-image">
                                            </div>
                                            <div class="col-lg-8 col-md-12">
                                                <div class="card-body">
                                                    <h5 class="card-title">iPhone</h5>
                                                    <p class="card-text">Price <small class="text-muted">$200</small></p>
                                                    <p class="card-text"><span class="description">The iPhone is a smartphone made by Apple that combines a computer, iPod, 
                                                    digital camera and cellular phone into one device with a touchscreen interface. The iPhone runs the iOS operating system, 
                                                    and in 2021 when the iPhone 13 was introduced, it offered up to 1 TB of storage and a 12-megapixel camera.</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark rounded-0">Cancel Order</button>
                            <button type="button" class="btn btn-dark rounded-0">Delivered</button>
                        </div>
                    </div>

                </div>
    </main>

    <?php
        include_once 'layout/footer.html';
    ?>

    <script src="js/shipper.js"></script>
</body>

</html>