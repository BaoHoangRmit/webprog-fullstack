<form method="post" action="test-hash.php">
	Password: <input type="password" name="password"><br>
	<input type="submit" name="hash" value="Hash">
</form>

<?php 

	if (isset($_POST['hash'])) {
		$hashed = password_hash(strval($_POST['password']), PASSWORD_DEFAULT);
		echo  $hashed . '<br>';
		echo password_verify('realUser1@', $hashed);
	}

?>