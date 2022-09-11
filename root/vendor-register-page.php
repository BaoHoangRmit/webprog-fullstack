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


    <script defer src="js/register/registerVendor.js"></script>

	<title>VENDOR REGISTER</title>
</head>
<body>
	<?php include_once 'layout/header.php'; ?>

	<main>
		<div class="register-form">
			<form id="register-form" method="post" action="vendor-register.php" enctype="multipart/form-data">
				<h1>Sign Up</h1>
				<h2>Vendor</h2>
				<div class='error'>
					<?php 
						if (isset($_SESSION['registered'])) {
							echo '<p>' . $_SESSION['registered'] . '</p>';
						}
					?>
				</div>

				<div class="input-control">
					<label for="venUsername">Username</label>
					<input type='text' id="venUsername" name="venUsername">
					<div class="error">
						<?php 
							if (isset($_SESSION['errorUsername'])) {
								echo '<p>' . $_SESSION['errorUsername'] . '</p>';
							}
						?>
					</div>
				</div>

				<div class="input-control">
					<label for="venPassword">Password</label>
					<input type='password' id="venPassword" name="venPassword">
					<div class="error"></div>
				</div>

				<div class="input-control">
					<label for="venPassword2">Confirm Password</label>
					<input type='password' id="venPassword2" name="venPassword2">
					<div class="error"></div>
				</div>
				
				<div class="input-control">
					<label for="venImg">Profile Image</label>
					<input type="file" name="venImg" id="venImg" required>
				</div>

				<div class="input-control">
					<label for="venName">Vendor name</label>
					<input type='text' id="venName" name="venName">
					<div class="error">
						<?php 
							if (isset($_SESSION['errorName'])) {
								echo '<p>' . $_SESSION['errorName'] . '</p>';
							}
						?>
					</div>
				</div>

				<div class="input-control">
					<label for="venAddress">Vendor Address</label>
					<input type='text' id="venAddress" name="venAddress">
					<div class="error">
						<?php 
							if (isset($_SESSION['errorAddress'])) {
								echo '<p>' . $_SESSION['errorAddress'] . '</p>';
							}
						?>
					</div>
				</div>

				<button type="submit" name="register" style="cursor: pointer;">Register</button>
			</form>
		</div>
	</main>		
				
	<?php include_once 'layout/footer.html'; ?>
</body>
</html>

