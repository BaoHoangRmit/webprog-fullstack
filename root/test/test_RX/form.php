<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>REGISTER</title>
</head>
<body>
	<form method="post" action="form-regex.php" enctype="multipart/form-data">
		Username <input type="text" name="username" ><br>
		Password <input type="password" name="password"><br>
		
		<!-- Need to name 1 word - do not use "-" character as the directory link cannot process -->
		<!-- Profile Picture <input type="file" name="cusImg" id="cusImg"><br> 

		Customer Name <input type="text" name="cusName"><br>
		Customer Address <input type="text" name="cusAddress"><br> -->
		<input type="submit" name="register" value="Register">
	</form>
</body>
</html>

