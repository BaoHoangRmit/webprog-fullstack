<?php 

  function read_hub_file() {
    $file_name = 'data/distributions.csv';
    $fp = fopen($file_name, 'r');

    // first row -> field names
    $first = fgetcsv($fp);
    $hubs = [];

    while ($row = fgetcsv($fp)) {
      $i = 0;
      $hub = [];

      foreach ($first as $col_name) {
        $hub[$col_name] = $row[$i];

        // treat sizes differently -> make it an array
        // if ($col_name == 'sizes') {
        //   $product[$col_name] = explode(',', $product[$col_name]);
        // }

        $i++;
      }

      $hubs[] = $hub;
    }

    // overwrite the session variable
    $_SESSION['hubs'] = $hubs;
  }

  read_hub_file();


?>