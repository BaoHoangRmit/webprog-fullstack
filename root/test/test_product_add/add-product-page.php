<?php 
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // echo 'ok' . 'login van return $_SESSION[current_user] voi mang rong -> van chuyen my account khi an quay lai sau khi dang nhap sai mkhau';
        // echo '<br>';
        // echo 'test above function again but for now have fixed';
        if (isset($_SESSION['current_user'])) {
		    echo '<pre>';
		    print_r($_SESSION['current_user']);
		  	echo '</pre>';
		}

        if ($_SESSION['current_user']['role'] == 'vendor') {
		    echo 'nice';    
		} else {
            echo 'not nice';
        }
    } else {
        echo 'not ok';
    }
?>

<form method="post" action="add-product.php" enctype="multipart/form-data">
    Product Name <input type="text" name="proName" ><br>
    Price <input type="text" name="proPrice"><br>
    
    <!-- Need to name 1 word - do not use "-" character as the directory link cannot process -->
    Profile Picture <input type="file" name="proImg" id="proImg"><br> 

    Product Description <textarea id="proDesc" name="proDesc" rows="4" cols="50"></textarea><br>
    <input type="submit" name="addPro" value="Add Product">
</form>