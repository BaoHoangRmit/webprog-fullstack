<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>VENDOR REGISTER</title>
</head>
<body>
	<form method="post" action="vendor-register.php" enctype="multipart/form-data">
		Username <input type="text" name="venUsername"><br>
		Password <input type="password" name="venPassword"><br>
		
		<!-- Need to name 1 word - do not use "-" character as the directory link cannot process -->
		Profile Picture <input type="file" name="venImg" id="venImg"><br> 

		Vendor Name <input type="text" name="venName"><br>
		Vendor Address <input type="text" name="venAddress"><br>
		<input type="submit" name="register" value="Register">
	</form>
</body>
</html>

