<?php
	session_start();
	include_once 'login-validation.php';

	$error = '';

	if (isset($_POST['login'])) {
		if ($_POST['logUsername'] != '' && $_POST['logPassword'] != '') {
			$current_user = check_login(strval($_POST['logUsername']), strval($_POST['logPassword']));
			// add check blank array
			if ($current_user == 0 || $current_user == []) {
				$error = 'There are no users with the username and password you have entered';
				$_SESSION['errorUsername'] = $error;
            	header('location: login-page.php');	
			} else {
				unset($_SESSION['errorUsername']);
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
	}	else {
		// header('location: login-page.php');
		echo $error;
	}

	if (isset($_SESSION['current_user'])) {
		$_SESSION['loggedin'] = true;
		if (isset($_SESSION['current_user']['role']) && $_SESSION['current_user']['role'] == 'customer') {	
			header('location: index.php');
			// exit();		
		} elseif (isset($_SESSION['current_user']['role']) && $_SESSION['current_user']['role'] == 'vendor') {
			header('location: vendor-item-page.html');
		} elseif (isset($_SESSION['current_user']['role']) && $_SESSION['current_user']['role'] == 'shipper') {
			header('location: shipper.php');
		}
	}
?>