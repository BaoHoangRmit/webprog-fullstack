<?php 

	// read one column only
	function read_user_file($p1) {
		$file_name = '../data/productss.csv';
		$fp = fopen($file_name, 'r');


		$users_from_file = [];

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
				$users_from_file[$i] = $row[$col_num];
				$i++;
			}
			


		  // treat sizes differently -> make it an array
	      // if ($col_name == 'sizes') {
	      //   $user_from_file[$col_name] = explode(',', $user_from_file[$col_name]);
	      // }
		}

		// overwrite the session variable
		$_SESSION['users_from_file'] = $users_from_file;
	}

	read_user_file('name');

	if (isset($_SESSION['users_from_file'])) {
		echo '<pre>';
		print_r($_SESSION['users_from_file']);
		echo '</pre>';
	}

?>