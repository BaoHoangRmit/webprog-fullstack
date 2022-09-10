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


    <script defer src="js/register/registerShipper.js"></script>

	<title>SHIPPER REGISTER</title>
</head>
<body>
	<!-- <p>SHIPPER after register still keep previous session data -> echo 2 username and save to file 2 username -> FIX by remove session_start() at the beginning of shipper-resgiter.php (why work?)</p> -->
	<?php include_once 'layout/header.php'; ?>

	<main>
		<p>Not filtering js - still register sucess</p>
		<div class="register-form">
			<form id="register-form" method="post" action="shipper-register.php" enctype="multipart/form-data">
				<h1>Sign Up</h1>
				<h2>Shipper</h2>
				<div class='error'>
					<?php 
						if (isset($_SESSION['registered'])) {
							echo '<p>' . $_SESSION['registered'] . '</p>';
						}
					?>
				</div>

				<div class="input-control">
					<label for="shipUsername">Username</label>
					<input type='text' id="shipUsername" name="shipUsername">
					<div class="error">
						<?php 
							if (isset($_SESSION['errorUsername'])) {
								echo '<p>' . $_SESSION['errorUsername'] . '</p>';
							}
						?>
					</div>
				</div>

				<div class="input-control">
					<label for="shipPassword">Password</label>
					<input type='password' id="shipPassword" name="shipPassword">
					<div class="error"></div>
				</div>

				<div class="input-control">
					<label for="shipPassword2">Confirm Password</label>
					<input type='password' id="shipPassword2" name="shipPassword2">
					<div class="error"></div>
				</div>
				
				<div class="input-control">
					<label for="shipImg">Profile Image</label>
					<input type="file" name="shipImg" id="shipImg" required>
				</div>

				<div class="input-control">
					<label for="shipHub">Distribution Hub</label>
					<select name="shipHub" id="shipHub">
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
						</select>
					<div class="error">
					</div>
				</div>

				<button type="submit" name="register">Register</button>
			</form>
		</div>
	</main>

	<?php include_once 'layout/footer.html'; ?>

</body>
</html>

