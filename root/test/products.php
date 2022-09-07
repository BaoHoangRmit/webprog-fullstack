<p>can save file for the first time - problem with load function as it cannot load fully 
and second time delete all data -> FIXED</p>

<p>DO NOT OPEN FILE CSV when pressing load or save or it will lose data -> still suffer from add problem with back button</p>

<form method="get" action="products.php">
	<input type="submit" name="choice" value="Save"> <br>
	<input type="submit" name="choice" value="Load">
</form>

<?php 

	session_start();

	function read_from_file() {
		$file_name = 'data/productss.csv';
		$fp = fopen($file_name, 'r');

		// first row -> field names
		$first = fgetcsv($fp);
		$products = [];

		while ($row = fgetcsv($fp)) {
			$i = 0;
			$product = [];

			foreach ($first as $col_name) {
				$product[$col_name] = $row[$i];

				// treat sizes differently -> make it an array
				if ($col_name == 'sizes') {
					$product[$col_name] = explode(',', $product[$col_name]);
				}

				$i++;
			}

			$products[] = $product;
		}

		// overwrite the session variable
		$_SESSION['products'] = $products;
	}

	function save_to_file() {
		// point to another file
		$file_name = 'data/productss.csv';
		$fp = fopen($file_name, 'w');
		$fields = ['name', 'price', 'sizes', 'created_time'];
		fputcsv($fp, $fields);

		if (is_array($_SESSION['products'])) {
			foreach ($_SESSION['products'] as $product) {
				// for the sizes -> store the with comma seperated
				$product['sizes'] = implode(',', $product['sizes']);
				fputcsv($fp, $product);
			}
		}
	}


	if (isset($_GET['choice']) && $_GET['choice'] == 'Save') {
		save_to_file();
	}

	if (isset($_GET['choice']) && $_GET['choice'] == 'Load') {
		read_from_file();
	}

	if (isset($_SESSION['products'])) {
		echo '<pre>';
		print_r($_SESSION['products']);
		echo '</pre>';
	}

	// echo '<pre>';
	// print_r($products);
	// echo '</pre>';

?>


