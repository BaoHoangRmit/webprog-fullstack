<?php 

	session_start();

	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
		header('location: login.php');
	}

	// This part serve the add product function
	if (isset($_POST['act'])) {
		$product = [
			'name' => $_POST['product_name'],
			'price' => $_POST['product_price'],
			'sizes' => $_POST['product_sizes'],
			'created_time' => date('d-m-Y h:i:s')
		];

		$_SESSION['products'][] = $product;
	}

?>

<form method="post" action="add_product.php">
	Product name <input type="text" name="product_name"><br>
	Price <input type="number" name="product_price"><br>
	Sizes <input type="checkbox" name="product_sizes[]" value="XS"> XS
		<input type="checkbox" name="product_sizes[]" value="S"> S
		<input type="checkbox" name="product_sizes[]" value="M"> M
		<input type="checkbox" name="product_sizes[]" value="L"> L
		<input type="checkbox" name="product_sizes[]" value="XL"> XL <br>

	<input type="submit" name="act" value="Add Product">
</form>

<?php

	if(isset($_SESSION['products'])) {
		echo '<pre>';
		print_r($_SESSION['products']);
		echo '</pre>';
	}

?>