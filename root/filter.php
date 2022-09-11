<?php 
	// session_start();
	
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
		return strtotime($p2['createdTime']) - strtotime($p1['createdTime']);
	}

    $mapping = [
		'name' => 'name_cmp',
		'price' => 'price_cmp',
		'createdTime' => 'created_time_cmp'
	];

    // if (isset($_GET['compare_by']) && !empty($_GET['compare_by'])) {
	// 	if (array_key_exists($_GET['compare_by'], $mapping)) {
	// 		$selected_func = $mapping[$_GET['compare_by']];
	// 	}
	// }

    // usort($_SESSION['products'], $selected_func);

?>