<?php  
    session_start();

    include_once 'get-hub.php';
    include_once 'order-file-control.php';

    $str = $_POST['purchase-customer-cartId'];
    $productIds = [];
    $sub_str = '';

    for ($i = 0; $i < strlen($str); $i++){
        $sub_str .= $str[$i];

        if (strlen($sub_str) == 10) {
            array_push($productIds, $sub_str);
            $sub_str = '';
        }
    }


    $orderId = round(microtime(true));

    $hub_names = [];
    if (is_array($_SESSION['hubs'])) {
        $length = count($_SESSION['hubs']);
        for ($i=0; $i < $length; $i++) { 
            $current_hub = $_SESSION['hubs'][$i]['hubName'];
            array_push($hub_names, $current_hub);
        }
    }

    $random_key = array_rand($hub_names);
    $random_hub = $hub_names[$random_key];

    $order = [
        'orderId' => $orderId,
        'orderHub' => strval($random_hub),
        'orderName' => $_POST['purchase-customer-name'],
        'orderAddress' => $_POST['purchase-customer-location'],
        'orderStatus' => 'active',
        'orderProductId' => $productIds,
        'createdTime' => date('d-m-Y h:i:s'),
    ];

    $_SESSION['orders'] = $order;

    if (isset($_SESSION['orders'])) {
        save_order_file();
        
        header('location: order-successful-page.php');
        exit();
    }
?>