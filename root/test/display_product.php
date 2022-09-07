<p>If press Back button to add_product.php -> ask form confirmation and stuffs -> still add the last 
typed products</p>

<select id='compare_by' name="compare_by">
	<option value="">Select a sort condition</option>
	<option value="name">Name</option>
	<option value="price">Price</option>
	<option value="sizes">Sizes</option>
	<option value="created_time">Created Time</option>
</select>

<?php 

	// NAME COMPARISON
	function name_cmp($p1, $p2) {
		return strcmp($p1['name'], $p2['name']);
	}

	// PRICE COMPARISON
	function price_cmp($p1, $p2) {
		return (int)$p1['price'] - (int)$p2['price'];
	}

	// CREATED_TIME COMPARISON
	function created_time_cmp($p1, $p2) {
		return strtotime($p1['created_time']) - strtotime($p2['created_time']);
	}

	// NUMBER OF SIZES COMPARISON
	function avai_sizes_cmp($p1, $p2) {
		// prevent calling count() on non array objects
		if (is_array($p1['sizes'])) {
			$p1['sizes'] = [];
		}

		if (is_array($p2['sizes'])) {
			$p2['sizes'] = [];
		}

		return count($p1['sizes']) - count($p2['sizes']);
	}

	session_start();

	$mapping = [
		'name' => 'name_cmp',
		'price' => 'price_cmp',
		'created_time' => 'created_time_cmp',
		'sizes' => 'avai_sizes_cmp'
	];

	// DEFAULT USE NAME SORT
	$selected_func = 'name_cmp';
	if (isset($_GET['compare_by']) && !empty($_GET['compare_by'])) {
		if (array_key_exists($_GET['compare_by'], $mapping)) {
			$selected_func = $mapping[$_GET['compare_by']];
		}
	}

	usort($_SESSION['products'], $selected_func);
	echo '<pre>';
	print_r($_SESSION['products']);
	echo '</pre>';

?>




<script>
	let select_ele = document.querySelector("#compare_by");

	select_ele.addEventListener("change", function() {
		let selected_value = select_ele.value;
		location.href = "display_product.php?compare_by=" + selected_value;
	});
</script>