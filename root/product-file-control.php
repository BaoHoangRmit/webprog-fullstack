<?php 

function save_product_file() {
    // point to another file
    $file_name = 'data/products.csv';
    $fp = fopen($file_name, 'a');

    // no img
    // $fields = ['username', 'password', 'name', 'address', 'created_time'];

    // have id
    // $fields = ['id','role', 'username', 'password', 'img', 'name', 'address', 'hub', 'createdTime'];

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

function read_product_file() {
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

// read all info of user with $p2 value in $p1 column
function read_product_by_field($p1, $p2) {
  $file_name = 'data/products.csv';
  $fp = fopen($file_name, 'r');

  // first row -> field names
  $first = fgetcsv($fp);
  $products_by_field = [];
  $product_by_field = [];

  while ($row = fgetcsv($fp)) {
    $i = 0;
    $check = 0;

    foreach ($first as $col_name) {
      if ($col_name == $p1 && $row[$i] !== $p2) {
        $check = 1;
        break;
      } else {
        $product_by_field[$col_name] = $row[$i];
        $i++;
        $check = 0;
      }	    
    }

    if ($check == 1) {
      continue;
    } else {
      $products_by_field[] = $product_by_field;
      $product_by_field = [];
    }
    
  }

  // overwrite the session variable
  // $_SESSION['users_by_field'] = $users_by_field;

  return $products_by_field;		
}

?>