<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SHIPPER REGISTER</title>
</head>
<body>
	<!-- <p>SHIPPER after register still keep previous session data -> echo 2 username and save to file 2 username -> FIX by remove session_start() at the beginning of shipper-resgiter.php (why work?)</p> -->

	<form method="post" action="shipper-register.php" enctype="multipart/form-data">
		Username <input type="text" name="shipUsername"><br>
		Password <input type="password" name="shipPassword"><br>
		
		<!-- Need to name 1 word - do not use "-" character as the directory link cannot process -->
		Profile Picture <input type="file" name="shipImg" id="shipImg"><br> 


		Distribution Hub 
		<select name="shipHub" id="shipHub">
		   <!-- <option value="volvo">Volvo</option>
		   <option value="saab">Saab</option>
		   <option value="opel">Opel</option>
		   <option value="audi">Audi</option> -->
		   <?php 

		   	include 'get-hub.php';

		   	if (is_array($_SESSION['hubs'])) {
		   		$length = count($_SESSION['hubs']);
			    for ($i=0; $i < $length; $i++) { 
			    	$current_hub = $_SESSION['hubs'][$i]['hubName'];
			      	echo "<option value=" . $current_hub . ">" . $current_hub . '</option>';
			    }
		   	}
		   	

		   ?>
		 </select><br>
		<input type="submit" name="register" value="Register">
	</form>

	


</body>
</html>

