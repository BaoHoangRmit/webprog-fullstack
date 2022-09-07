<?php
    include_once 'login.php';
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
                        <button type="button" class="btn btn-dark rounded-0" id="myBtn">View Detail</button>
                    </div>

                </div>
            </div>
            <div class="card mx-5 rounded-0 my-4">
                <h5 class="card-header">
                    <div class="row">
                        <div class="col-md-10">ID: #555555</div>
                        <div class="col-md-2">Status: <span class="text-success">Active</span></div>
                    </div>
                </h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Distribution Hub</li>
                        <li class="list-group-item">Created at: 08-03-2022 18:22</li>
                        <li class="list-group-item">Customer:</li>
                        <li class="list-group-item">Address: </li>
                    </ul>
                    <div class="text-end">
                        <button type="button" class="btn btn-dark rounded-0" id="myBtn">View Detail</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order #123456</h4>
                    <span class="close">&times;</span>
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
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="card my-3 rounded-0">
                                            <div class="row g-0">
                                                <div class="col-5 col-sm-4 my-2">
                                                    <img src="../img/iphone.png" class="img-fluid" alt="item-image">
                                                </div>
                                                <div class="col-7 col-sm-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">iPhone</h5>
                                                        <p class="card-text">Price: <small
                                                                class="text-muted">$200</small></p>
                                                        <p class="card-text">Quantity: 2</p>
                                                    </div>
                                                </div>
                                            </div>
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