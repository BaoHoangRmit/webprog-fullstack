<?php 
    session_start();
    if ($_SESSION['current_user']['role'] == 'vendor') {
        echo 'nice';    
    } else {
        echo 'not nice';
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