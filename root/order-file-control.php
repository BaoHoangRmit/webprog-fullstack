<?php 

function save_order_file() {
    // point to another file
    $file_name = 'data/orders.csv';
    $fp = fopen($file_name, 'a');

    // no id
    $fields = ['id', 'name', 'price', 'img', 'desc', 'ven', 'createdTime'];

    $fpr = fopen($file_name, 'r');     
    $first = fgetcsv($fpr);

    // check if first row is fields or not
    if ($first != $fields) {
      $fpw = fopen($file_name, 'w');
      fputcsv($fpw, $fields);
    }
      
    if (is_array($_SESSION['products'])) {
      foreach ($_SESSION['products'] as $user) {
        // for the sizes -> store the with comma seperated
        // $product['sizes'] = implode(',', $product['sizes']);
        fputcsv($fp, $user);
      }
    }
    return 1;
}

function read_order_file() {
    $file_name = 'data/products.csv';
    $fp = fopen($file_name, 'r');

    // first row -> field names
    $first = fgetcsv($fp);
    $products_from_file = [];

    while ($row = fgetcsv($fp)) {
      $i = 0;
      $product_from_file = [];

      foreach ($first as $col_name) {
        $product_from_file[$col_name] = $row[$i];

        // treat sizes differently -> make it an array
        // if ($col_name == 'sizes') {
        //   $product[$col_name] = explode(',', $product[$col_name]);
        // }

        $i++;
      }

      $products_from_file[] = $product_from_file;
    }

    // overwrite the session variable
    // $_SESSION['users_from_file'] = $users_from_file;

    return $products_from_file;
}

?>