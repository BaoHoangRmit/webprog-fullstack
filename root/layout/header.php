<?php
    session_start();
    include_once 'login.php';
    

    if ($_SESSION['loggedin'] == true) {
        echo 'ok';
        if (isset($_SESSION['current_user'])) {
		    echo '<pre>';
		    print_r($_SESSION['current_user']);
		  	echo '</pre>';
		}
    } else {
        echo 'not ok';
    }

    if (isset($_SESSION['current_user'])) {
        echo '<pre>';
        print_r($_SESSION['current_user']);
          echo '</pre>';
    } else {
        echo 'no cookie';
    }
?>

<!-- Page header -->
<header>
    <a href="#" class="logo"><img src="../img/lazada_logo.png" width="25"></a>
    <div class="header-right">
        <a href="#" class="text-muted">About</a>
        <a href="#" class="text-muted">Privacy</a>
        <a href="#" class="text-muted">Copyright</a>
        <a href="#" class="text-muted">Help</a>
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<a href='#'>My Account</a>" ;
            } else {
                echo "<a href='login-page.php'>Login</a>" ;
            }
        ?>
        <!-- <a href="#">My Account</a> -->
    </div>
</header> 