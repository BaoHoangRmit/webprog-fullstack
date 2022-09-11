<?php 
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($_SESSION['current_user']['role'] == 'customer') {
            header('location: index.php');
        } elseif ($_SESSION['current_user']['role'] == 'shipper') {
            header('location: shipper-page.php');
        }
    } else {
        header('location: login-page.php');
    }

    include_once 'product-validation.php';

    if (isset($_POST['addPro'])) {
        $error = '';
        $_SESSION['added'] = '';
        $_SESSION['products'] = [];

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
                                'ven' => $_SESSION['current_user']['name'],
                                'createdTime' => date('d-m-Y h:i:s'),
                                ];

                                $_SESSION['products'][] = $product;
                                // $_SESSION['addProduct'] = $product;

                                // If all other fields passed and session is set -> check upload img
                                if (isset($_SESSION['products'])) {
                                    // upload the file with new name
                                    if (move_uploaded_file($_FILES["proImg"]["tmp_name"], $new_target_file)) {
                                        // echo "The file ". htmlspecialchars( basename( $_FILES["cusImg"]["name"])). " has been uploaded.";
                                        if (save_product_file()) {
                                            unset($_SESSION['added']);
                                            header('location: vendor-item-page.php');
                                        } else {
                                            
                                            $_SESSION['added'] = 'Product has not been added';
                                            header('location: customer-register-page.php');
                                        }

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

        // $_SESSION['allProducts'] = read_product_file();
        if (isset($_SESSION['products'])) {
            echo '<pre>';
            print_r($_SESSION['products']);
            echo '</pre>';
        }

    } else {
        echo 'not ok';
    }

?>