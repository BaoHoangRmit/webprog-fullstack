<?php 
	// session_start();	
	include_once 'login-validation.php';
	// session_start();

	$error = '';

	if (isset($_POST['login'])) {
		// if (isset($_SESSION['current_user'])) {
		// 	session_destroy();
		// } else {
			
		// }

		$_SESSION['current_user'] = [];
			
			if ($_POST['logUsername'] != '' && $_POST['logPassword'] != '') {
				$current_user = check_login(strval($_POST['logUsername']), strval($_POST['logPassword']));
				if ($current_user == 0) {
					$error = 'There are no users with the username and password you have entered';
				} else {
					$_SESSION['current_user'] = $current_user;
					
				} 
			} else {
				$error = 'There are blank fields';
			} 
	
			if (!is_null($error)) {
				echo $error;
			  } else {
				// header('location: users.php');
			  }
	
			if (isset($_SESSION['current_user'])) {
				echo '<pre>';
				print_r($_SESSION['current_user']);
				  echo '</pre>';
			}

		
	}	else {
		// header('location: login-page.php');
		echo $error;
	}

	if (isset($_SESSION['current_user'])) {
		$_SESSION['loggedin'] = true;
		if (isset($_SESSION['current_user']['role']) && $_SESSION['current_user']['role'] == 'customer') {
			
			header('location: index.php');
			exit();	
			
		} elseif (isset($_SESSION['current_user']['role']) && $_SESSION['current_user']['role'] == 'vendor') {
			// header('location: vendor-page.php');
		} elseif (isset($_SESSION['current_user']['role']) && $_SESSION['current_user']['role'] == 'shipper') {
			header('location: shipper.php');
		}
	}

?>