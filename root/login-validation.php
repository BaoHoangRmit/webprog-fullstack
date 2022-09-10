<?php 
	
	include_once 'file-control.php';

	// $p1 username and $p2 password
	function check_login($p1, $p2) {
		$users = read_user_file();

		if (is_array($users)) {
			$length = count($users);
			$user = [];

			for ($i=0; $i < $length; $i++) { 
				$check = 0;
				$j = 0;

				foreach ($users[$i] as $key => $value) {
					if ($check == 2) {
						$user[$key] = $value;
						continue;
					} else {
						$j++;
					}

					if ($key == 'role') {
						$user[$key] = $value;
					}

					if ($key == 'username' && $value == $p1) {
						$check = 1;
						$user[$key] = $value;
						continue;
					} else {
						if ($j == 2) {
							$user = [];
							break;
						} 
					}

					if ($key == 'password' && password_verify($p2, $value)) {
						$check = 2;
						$user[$key] = $value;
						continue;
					} else {
						if ($j == 3) {
							$user = [];
							break;
						} else {
							continue;
						}
						
					}
				}

				if ($user != []) {
					break;
				} else {
					continue;
				}
			}

			if ($user == []) {
				return 0;
			} else {
				return $user;
			}
			
		} else {
			return 0;
		}
	}

?>