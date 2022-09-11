<?php 

function save_order_file() {
    // point to another file
    $file_name = 'data/orders.csv';
    $fp = fopen($file_name, 'a');

    // no id
    // $fields = ['orderId', 'orderHub', 'orderName', 'orderAddress', 'orderStatus', 'orderProductId', 'createdTime'];

    $fields = ['orderId', 'orderHub', 'orderName', 'orderAddress', 'orderStatus', 'createdTime'];

    $fpr = fopen($file_name, 'r');     
    $first = fgetcsv($fpr);

    // check if first row is fields or not
    if ($first != $fields) {
      $fpw = fopen($file_name, 'w');
      fputcsv($fpw, $fields);
    }
      
    if (is_array($_SESSION['orders'])) {
      foreach ($_SESSION['orders'] as $order) {
        // for the sizes -> store the with comma seperated
        // $order['orderProductId'] = implode(',', $order['orderProductId']);
        fputcsv($fp, $order);
      }
    }
    return 1;
}

function read_order_file() {
    $file_name = 'data/orders.csv';
    $fp = fopen($file_name, 'r');

    // first row -> field names
    $first = fgetcsv($fp);
    $orders_from_file = [];

    while ($row = fgetcsv($fp)) {
      $i = 0;
      $order_from_file = [];

      foreach ($first as $col_name) {
        $order_from_file[$col_name] = $row[$i];

        // treat sizes differently -> make it an array
        // if ($col_name == 'orderProductId') {
        //   $order_from_file[$col_name] = explode(',', $order_from_file[$col_name]);
        // }

        $i++;
      }

      $orders_from_file[] = $order_from_file;
    }

    // overwrite the session variable
    // $_SESSION['users_from_file'] = $users_from_file;

    return $orders_from_file;
}

?>