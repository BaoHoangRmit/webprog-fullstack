<?php 
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($_SESSION['current_user']['role'] == 'customer') {
            header('location: index.php');
        } elseif ($_SESSION['current_user']['role'] == 'shipper') {
            header('location: vendor-item-page.php');
        }
    } else {
        header('location: login-page.php');
    }
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


    <script defer src="js/vendor/addProduct.js"></script>

	<title>Add Product</title>
</head>
<body>

	<?php include_once 'layout/header.php'; ?>

	<main>
		<div class="register-form">
			<form id="register-form" method="post" action="add-product.php" enctype="multipart/form-data">
				<h1>Add Product</h1>

				<div class="input-control">
					<label for="proName">Product Name</label>
					<input type='text' id="proName" name="proName">
					<div class="error">
					</div>
				</div>

				<div class="input-control">
					<label for="proPrice">Price</label>
					<input type='text' id="proPrice" name="proPrice">
					<div class="error"></div>
				</div>
				
				<div class="input-control">
					<label for="proImg">Profile Image</label>
					<input type="file" name="proImg" id="proImg" required>
				</div>

				<div class="input-control">
					<label for="cusName">Description</label>
					<textarea id="proDesc" name="proDesc" rows="4" cols="50"></textarea>
					<div class="error"></div>
				</div>

				<button type="submit" name="addPro">Add Product</button>
			</form>
		</div>
	</main>
	
	<?php include_once 'layout/footer.html'; ?>

</body>
</html>