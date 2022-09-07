<?php 

	if (isset($_POST['register'])) {
		$username_pattern = "/^([a-zA-Z0-9]){8,15}$/";
		$username = $_POST['username'];

		$password_pattern = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])(.{8,20})$/";
		$password = $_POST['password'];

		$other_pattern = "/^(.{5,})$/";
		

		if (preg_match($password_pattern, $password)) {
			echo 'This string is correct';
			return 1;
		}

		// if (preg_match($username_pattern, $username)) {
		// 	echo 'This string is correct';
		// 	return 1;
		// }

		echo 'This string WRONG';
		return 0;
	}

?>