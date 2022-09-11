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


    <script defer src="js/login/login.js"></script>

	<title>CUSTOMER REGISTER</title>
</head>
<body>

	<?php include_once 'layout/header.php'; ?>

	<main>
		<!-- <form method="post" action="login.php">
			Username <input type="text" name="logUsername"><br>
			Password <input type="password" name="logPassword"><br>
			<input type="submit" name="login" value="Login">
		</form> -->

		<div class="register-form">
			<form id="register-form" method="post" action="login.php" enctype="multipart/form-data">
				<h1>Login</h1>

				<div class="input-control">
					<label for="logUsername">Username</label>
					<input type='text' id="logUsername" name="logUsername">
					<div class="error">
						<?php 
							if (isset($_SESSION['errorUsername'])) {
								echo '<p>' . $_SESSION['errorUsername'] . '</p>';
							}
						?>
					</div>
				</div>

				<div class="input-control">
					<label for="logPassword">Password</label>
					<input type='password' id="logPassword" name="logPassword">
					<div class="error"></div>
				</div>

				<button type="submit" name="login" style="cursor: pointer;">Login</button>
			</form>
		</div>
	</main>
	
	<?php include_once 'layout/footer.html'; ?>

</body>
</html>