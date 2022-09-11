<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You have successfully been logged out.</title>

    <link rel="stylesheet" href="css/logout.css">
    <link rel="stylesheet" href="css/customer/customerStyle.css">
    <link rel="stylesheet" href="css/layout/layout.css">
</head>

<body>
    <header>
        <a href="../index.php" class="logo"><img src="../img/lazada_logo.png" width="25"></a>
        <div class="header-right">
            <a href="#" class="text-muted">About</a>
            <a href="#" class="text-muted">Privacy</a>
            <a href="#" class="text-muted">Copyright</a>
            <a href="#" class="text-muted">Help</a>
            <a href='register-page.php'>Register</a>
            <a href='login-page.php'>Login</a>
        </div>
    </header>

    <main>
            <h2>You have successfully been logged out.</h2>
    </main>

    <?php
        include_once 'layout/footer.html';
    ?>
</body>

</html>