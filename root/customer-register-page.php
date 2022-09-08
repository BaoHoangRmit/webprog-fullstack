<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="css/layout/layout.css">
	<link rel="stylesheet" href="css/customer/customerStyle.css">
	<link rel="stylesheet" href="css/register/registerCustomer.css">


    <script defer src="js/register/registerCustomer.js"></script>

	<title>CUSTOMER REGISTER</title>
</head>
<body>
	<?php include_once 'layout/header.php'; ?>

	<main>
		<!-- Need to set name as 1 word - do not use "-" character as the directory link cannot process (img attribute) -->
		<!-- <form method="post" action="customer-register.php" enctype="multipart/form-data">
			Username <input type="text" name="cusUsername" required ><br>
			Password <input type="password" name="cusPassword" required ><br>
			
			
			Profile Picture <input type="file" name="cusImg" id="cusImg" required><br> 

			Customer Name <input type="text" name="cusName" required ><br>
			Customer Address <input type="text" name="cusAddress" required ><br>
			<input type="submit" name="register" value="Register">
		
		</form> -->

		<p>ERROR AFTER validate js then cannot parse php</p>

		<div class="register-form">
			<form id="register-form" method="post" action="customer-register.php" enctype="multipart/form-data">
			<!-- <form id="register-form" method="post" onsubmit="return setAction(this)" enctype="multipart/form-data"> -->
				<h1>Customer Sign Up</h1>

				<div class="input-control">
					<label for="cusUsername">Username</label>
					<input type='text' id="cusUsername" name="cusUsername">
					<div class="error"></div>
				</div>

				<div class="input-control">
					<label for="cusPassword">Password</label>
					<input type='password' id="cusPassword" name="cusPassword">
					<div class="error"></div>
				</div>

				<div class="input-control">
					<label for="cusPassword2">Confirm Password</label>
					<input type='password' id="cusPassword2" name="cusPassword2">
					<div class="error"></div>
				</div>
				
				<div class="input-control">
					<label for="cusImg">Profile Image</label>
					<input type="file" name="cusImg" id="cusImg" required>
				</div>

				<div class="input-control">
					<label for="cusName">Customer name</label>
					<input type='text' id="cusName" name="cusName">
					<div class="error"></div>
				</div>

				<div class="input-control">
					<label for="cusAddress">Customer Address</label>
					<input type='text' id="cusAddress" name="cusAddress">
					<div class="error"></div>
				</div>

				<input type="submit" name="register" value="Register"></input>
			</form>
		</div>
		

		<!-- <div class="register-form">
			<form id="form" action="/">
				<h1>Registration</h1>
				<div class="input-control">
					<label for="username">Username</label>
					<input id="username" name="username" type="text">
					<div class="error"></div>
				</div>
				<div class="input-control">
					<label for="email">Email</label>
					<input id="email" name="email" type="text">
					<div class="error"></div>
				</div>
				<div class="input-control">
					<label for="password">Password</label>
					<input id="password"name="password" type="password">
					<div class="error"></div>
				</div>
				<div class="input-control">
					<label for="password2">Password again</label>
					<input id="password2"name="password2" type="password">
					<div class="error"></div>
				</div>
				<button type="submit">Sign Up</button>
			</form>
		</div> -->
	</main>
	
	<?php include_once 'layout/footer.html'; ?>

</body>
</html>

