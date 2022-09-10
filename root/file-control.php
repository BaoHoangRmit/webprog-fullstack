<?php 
	
	function save_user_file() {
		// point to another file
		$file_name = 'data/users.csv';
		$fp = fopen($file_name, 'a');

		// no img
		// $fields = ['username', 'password', 'name', 'address', 'created_time'];

		// have id
		// $fields = ['id','role', 'username', 'password', 'img', 'name', 'address', 'hub', 'createdTime'];

		// no id
		$fields = ['role', 'username', 'password', 'img', 'name', 'address', 'hub', 'createdTime'];

		$fpr = fopen($file_name, 'r');     
		$first = fgetcsv($fpr);

		// check if first row is fields or not
		if ($first != $fields) {
		  $fpw = fopen($file_name, 'w');
		  fputcsv($fpw, $fields);
		}
		  
		if (is_array($_SESSION['users'])) {
		  foreach ($_SESSION['users'] as $user) {
		    // for the sizes -> store the with comma seperated
		    // $product['sizes'] = implode(',', $product['sizes']);
		    fputcsv($fp, $user);
		  }
		}
	}

	function read_user_file() {
		$file_name = 'data/users.csv';
		$fp = fopen($file_name, 'r');

		// first row -> field names
		$first = fgetcsv($fp);
		$users_from_file = [];

		while ($row = fgetcsv($fp)) {
		  $i = 0;
		  $user_from_file = [];

		  foreach ($first as $col_name) {
		    $user_from_file[$col_name] = $row[$i];

		    // treat sizes differently -> make it an array
		    // if ($col_name == 'sizes') {
		    //   $product[$col_name] = explode(',', $product[$col_name]);
		    // }

		    $i++;
		  }

		  $users_from_file[] = $user_from_file;
		}

		// overwrite the session variable
		// $_SESSION['users_from_file'] = $users_from_file;

		return $users_from_file;
	}

	// read one column only
	function read_one_user_file($p1) {
		$file_name = 'data/users.csv';
		$fp = fopen($file_name, 'r');


		$one_user_from_file = [];

		$col_name = $p1;
		$col_num = 0;
		$row_count = 0;

		$i = 0;

		// loop each row of file
		while ($row = fgetcsv($fp)) {
			// $row_count = 0 means first row (fields row)
			if ($row_count == 0) {
				$length = count($row);

				// for in the first row to find the $p1 field
				for ($k=0; $k <$length ; $k++) { 
					if ($row[$k] == $col_name) {
						// set the key to the place where it find the $p1 field
						$col_num = $k;
						$row_count++;
						break;
					} else {
						continue;
					}
				}
			} else {
				$one_user_from_file[$i] = $row[$col_num];
				$i++;
			}
		}

		// overwrite the session variable
		// $_SESSION['one_user_from_file'] = $one_user_from_file;

		return $one_user_from_file;
	}

	// read all info of user with $p2 value in $p1 column
	function read_user_by_field($p1, $p2) {
		$file_name = 'data/users.csv';
		$fp = fopen($file_name, 'r');

		// first row -> field names
		$first = fgetcsv($fp);
		$users_by_field = [];
		$user_by_field = [];

		while ($row = fgetcsv($fp)) {
		  $i = 0;
		  $check = 0;

		  foreach ($first as $col_name) {
		  	if ($col_name == $p1 && $row[$i] !== $p2) {
		  		$check = 1;
		  		break;
		  	} else {
		  		$user_by_field[$col_name] = $row[$i];
		  		$i++;
		  		$check = 0;
		  	}	    
		  }

		  if ($check == 1) {
		  	continue;
		  } else {
		  	$users_by_field[] = $user_by_field;
		  	$user_by_field = [];
		  }
		  
		}

		// overwrite the session variable
		// $_SESSION['users_by_field'] = $users_by_field;

		return $users_by_field;		
	}

	// return $array2 contain info of column $p1 in $array1
	function read_user_one_column($array1, $p1) {
		$array2 = [];
		$length = count($array1);
		for ($i=0; $i < $length; $i++) { 
			foreach ($array1[$i] as $key => $value) {
				if ($key == $p1) {
					$array2[] = $value;
					break;
				} else {
					continue;
				}
			}
		}

		return $array2;
	}

	// $_SESSION['users_by_field'] = read_user_by_field('role', 'customer');

	// if (isset($_SESSION['users_by_field'])) {
	//     echo '<pre>';
	//     print_r($_SESSION['users_by_field']);
	//   	echo '</pre>';
	// }

	// return $array2 containing info of column $p1 in $array1

	// $array1 = read_user_by_field('role', 'customer');
	// $test_array = read_user_one_column($_SESSION['users_by_field'], 'name');
	// for ($i=0; $i < count($test_array); $i++) { 
	// 	echo $test_array[$i] . ' ';
	// }


?>