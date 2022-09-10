<?php
    session_start();
?>

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
	<link rel="stylesheet" href="css/register/register.css">


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

		<div class="register-form">
			<form id="register-form" method="post" action="customer-register.php" enctype="multipart/form-data">
			<!-- <form id="register-form" method="post" onsubmit="return setAction(this)" enctype="multipart/form-data"> -->
				<h1>Sign Up</h1>
				<h2>Customer</h2>
				<div class='error'>
					<?php 
						if (isset($_SESSION['registered'])) {
							echo '<p>' . $_SESSION['registered'] . '</p>';
						}
					?>
				</div>

				<div class="input-control">
					<label for="cusUsername">Username</label>
					<input type='text' id="cusUsername" name="cusUsername">
					<div class="error">
						<?php 
							if (isset($_SESSION['errorUsername'])) {
								echo '<p>' . $_SESSION['errorUsername'] . '</p>';
							}
						?>
					</div>
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

				<button type="submit" name="register">Register</button>
			</form>
		</div>
	</main>
	
	<?php include_once 'layout/footer.html'; ?>

</body>
</html>

