<form method="post" action="add-product.php" enctype="multipart/form-data">
    Product name <input type="text" name="proName" ><br>
    Price <input type="number" name="proPrice"><br>
    
    <!-- Need to name 1 word - do not use "-" character as the directory link cannot process -->
    Profile Picture <input type="file" name="cusImg" id="cusImg"><br> 

    Customer Name <input type="text" name="cusName"><br>
    Customer Address <input type="text" name="cusAddress"><br>
    <input type="submit" name="register" value="Register">
</form>