<?php 

function save_order_file() {
    // point to another file
    $file_name = 'data/orders.csv';
    $fp = fopen($file_name, 'a');

    // no id
    $fields = ['orderId', 'orderHub', 'orderName', 'orderAddress', 'orderStatus', 'orderProductId', 'createdTime'];

    // $fields = ['orderId', 'orderHub', 'orderName', 'orderAddress', 'orderStatus', 'createdTime'];

    $fpr = fopen($file_name, 'r');     
    $first = fgetcsv($fpr);

    // check if first row is fields or not
    if ($first != $fields) {
      $fpw = fopen($file_name, 'w');
      fputcsv($fpw, $fields);
    }

    $tmp = [];
      
    if (count($_SESSION['orders']) != 0) {
      $_SESSION['orders']['orderProductId'] = implode(',', $_SESSION['orders']['orderProductId']);
      foreach($_SESSION['orders'] as $key => $value){
        array_push($tmp, $value);
      }
      fputcsv($fp, $tmp);
      }
    fclose($fp);
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
        if ($col_name == 'orderProductId') {
          $order_from_file[$col_name] = explode(',', $order_from_file[$col_name]);
        }

        $i++;
      }

      $orders_from_file[] = $order_from_file;
    }

    // overwrite the session variable
    // $_SESSION['users_from_file'] = $users_from_file;

    return $orders_from_file;
}

// read all info of user with $p2 value in $p1 column
function read_order_by_field($p1, $p2) {
  $file_name = 'data/orders.csv';
  $fp = fopen($file_name, 'r');

  // first row -> field names
  $first = fgetcsv($fp);
  $orders_by_field = [];
  $order_by_field = [];

  while ($row = fgetcsv($fp)) {
    $i = 0;
    $check = 0;

    foreach ($first as $col_name) {
      if ($col_name == $p1 && $row[$i] !== $p2) {
        $check = 1;
        break;
      } else {
        $order_by_field[$col_name] = $row[$i];
        if ($col_name == 'orderProductId') {
          $order_by_field[$col_name] = explode(',', $order_by_field[$col_name]);
        }
        $i++;
        $check = 0;
      }	    
    }

    if ($check == 1) {
      continue;
    } else {
      $orders_by_field[] = $order_by_field;
      $order_by_field = [];
    }
    
  }

  // overwrite the session variable
  // $_SESSION['users_by_field'] = $users_by_field;

  return $orders_by_field;		
}

?>