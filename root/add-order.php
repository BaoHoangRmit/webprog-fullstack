<?php  
    session_start();

    include_once 'get-hub.php';
    include_once 'order-file-control.php';

    if (isset($_POST['addOrder'])) {
        echo 'ok';
    }

    echo $_POST['purchase-customer-name'] . '<br>';
    echo $_POST['purchase-customer-phone'] . '<br>';
    echo $_POST['purchase-customer-location'] . '<br>';
    echo $_POST['purchase-customer-cartId'] . '<br>';

    $str = $_POST['purchase-customer-cartId'];
    $productIds = [];
    $sub_str = '';

    for ($i = 0; $i < strlen($str); $i++){
        echo $str[$i] . ' ';
        $sub_str .= $str[$i];

        if (strlen($sub_str) == 10) {
            array_push($productIds, $sub_str);
            $sub_str = '';
        }
    }

    echo '<br>';

    for ($i=0; $i < count($productIds); $i++) { 
        echo $productIds[$i] . ' ';
    }

    $orderId = round(microtime(true));

    // for ($i=0; $i < count($_SESSION['hubs']); $i++) { 
    //     echo $_SESSION['hubs'][$i];
    // }


    $hub_names = [];
    if (is_array($_SESSION['hubs'])) {
        $length = count($_SESSION['hubs']);
        for ($i=0; $i < $length; $i++) { 
            $current_hub = $_SESSION['hubs'][$i]['hubName'];
            array_push($hub_names, $current_hub);
        }
    }

    for ($i=0; $i < count($hub_names); $i++) { 
        echo $hub_names[$i] . ' ';
    }

    $random_key = array_rand($hub_names);
    $random_hub = $hub_names[$random_key];
    echo gettype($random_hub);

    $order = [
        'orderId' => $orderId,
        'orderHub' => strval($random_hub),
        'orderName' => $_POST['purchase-customer-name'],
        'orderAddress' => $_POST['purchase-customer-location'],
        'orderStatus' => 'active',
        'orderProductId' => $productIds,
        'createdTime' => date('d-m-Y h:i:s'),
    ];

    $_SESSION['orders'][] = $order;

    // if (isset($_SESSION['orders'])) {
    //     save_order_file();
    //     echo '<pre>';
    //     print_r($_SESSION['orders']);
    //     echo '</pre>';
    // }

?>