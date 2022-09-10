<?php 

    include_once 'product-validation.php';

    if (isset($_POST['addPro'])) {
        $error = '';

        if(!file_exists($_FILES['proImg']['tmp_name']) 
        || !is_uploaded_file($_FILES['proImg']['tmp_name'])) {
            $error = 'You have not uploaded your product\'s picture file';
        } else {
        $id = round(microtime(true));
        // $register_id = round(microtime(true));

        // --- UPLOAD IMG ---
        $target_dir = "img/product_img/";
        $target_file = $target_dir . basename($_FILES["proImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
        } else {

            // if ($_POST['cusUsername'] != '' && $_POST['cusPassword'] != '' &&
            // $_POST['cusName'] != '' && $_POST['cusAddress'] != '') {

            // if (check_unique_all(strval($_POST['cusUsername']), 'username')) {
            //     if (check_username(strval($_POST['cusUsername']))) {
            //     if (check_password(strval($_POST['cusPassword']))) {
            //         if (check_other(strval($_POST['cusName']))) {
            //         if (check_other(strval($_POST['cusAddress']))) {
            if ($_POST['proName'] != '' && $_POST['proPrice'] && $_POST['proDesc'] != '') {
                if (check_product_name($_POST['proName'])) {
                    if (check_product_price($_POST['proPrice'])) {
                        if (check_product_desc($_POST['proDesc'])) {
                            // change name of the file before uploading it
                            $temp = explode(".", $_FILES["proImg"]["name"]);
                            // $newfilename = round(microtime(true)) . '.' . end($temp);
                            $newfilename = strval($id) . '.' . end($temp);
                            $new_target_file = $target_dir . $newfilename;                

                            $product = [
                            'id' => $id,
                            'name' => $_POST['proName'],
                            'price' => $_POST['proPrice'],
                            'img' => $new_target_file,
                            'desc' => $_POST['proDesc'],
                            'createdTime' => date('d-m-Y h:i:s'),
                            ];

                            $_SESSION['products'][] = $product;

                            // If all other fields passed and session is set -> check upload img
                            if (isset($_SESSION['products'])) {
                                // upload the file with new name
                                if (move_uploaded_file($_FILES["proImg"]["tmp_name"], $new_target_file)) {
                                    // echo "The file ". htmlspecialchars( basename( $_FILES["cusImg"]["name"])). " has been uploaded.";
                                    save_product_file();

                                } else {
                                    $error = "Sorry, there was an error uploading your file.";
                                }
                            }
                        } else {
                            $error = 'wrong product description pattern';
                        }
                    } else {
                        $error = 'wrong product price pattern';
                    }
                } else {
                    $error = 'wrong product name pattern';
                }
            } else {
                $error = 'There are blank fields';
            }
        }
    }
        if (!is_null($error)) {
        echo $error;
        } else {
        // header('location: users.php');
        }

        if (isset($_SESSION['products'])) {
            echo '<pre>';
            print_r($_SESSION['products']);
            echo '</pre>';
        }

        $_SESSION['products'] = read_product_file();
        if (isset($_SESSION['products'])) {
            echo '<pre>';
            print_r($_SESSION['products']);
            echo '</pre>';
        }

    } else {
        echo 'not ok';
    }

?>