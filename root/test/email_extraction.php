<?php 

	function extract_email($str) {
		$email_pattern = "/[a-zA-Z0-9]+@([a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z0-9]+)/";
		$matches = [];

		if (preg_match($email_pattern, $str, $matches)) {
			echo 'Email: ' . $matches[0] . ' and domain: ' . $matches[1];
			return $matches[0];
		}

		return false;
	}

	extract_email('hello, my name is tri@gmail.com, can you extract it into components?');

?>