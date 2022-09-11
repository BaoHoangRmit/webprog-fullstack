<!-- Page header -->
<header>
    <a href="../index.php" class="logo"><img src="../img/lazada_logo.png" width="25"></a>
    <div class="header-right">
        <a href="#" class="text-muted">About</a>
        <a href="#" class="text-muted">Privacy</a>
        <a href="#" class="text-muted">Copyright</a>
        <a href="#" class="text-muted">Help</a>
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if (isset($_SESSION['current_user']) && $_SESSION['current_user']['role'] == 'customer') {
                    echo "<a href='customerCart.php'>Cart</a>" ;
                }  
                echo "<a href='my-account.php'>My Account</a>" ;                           
            } else {
                echo "<a href='register-page.php'>Register</a>" ;
                echo "<a href='login-page.php'>Login</a>" ;
            }
        ?>
    </div>
</header> 