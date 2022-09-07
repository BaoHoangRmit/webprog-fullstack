<?php

  // include_once 'file-control.php';
  include_once 'register-validation.php';
  
  
  if (isset($_POST['register'])) {

    $error = '';

    if(!file_exists($_FILES['cusImg']['tmp_name']) 
      || !is_uploaded_file($_FILES['cusImg']['tmp_name'])) {
        $error = 'You have not uploaded your picture file';
    } else {
      $role = 'customer';
      // $register_id = round(microtime(true));

      // --- UPLOAD IMG ---
      $target_dir = "img/customer_img/";
      $target_file = $target_dir . basename($_FILES["cusImg"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      // if(isset($_POST["register"])) {
      //   $check = getimagesize($_FILES["cusImg"]["tmp_name"]);
      //   if($check !== false) {
      //     echo "File is an image - " . $check["mime"] . ".";
      //     $uploadOk = 1;
      //   } else {
      //     echo "File is not an image.";
      //     $uploadOk = 0;
      //   }
      // }

      // Check if file already exists
      // if (file_exists($target_file)) {
      //   echo "Sorry, file already exists.";
      //   $uploadOk = 0;
      // }

      // Check file size > 10MB
      // if ($_FILES["cusImg"]["size"] > 10_000_000) {
      //   echo "Sorry, your file is too large.";
      //   $uploadOk = 0;
      // }

      // Allow certain file formats
      // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      //   echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
      //   $uploadOk = 0;
      // }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $error = "Sorry, your file was not uploaded.";

      // if everything is ok, try to upload file
      } else {

        if ($_POST['cusUsername'] != '' && $_POST['cusPassword'] != '' &&
        $_POST['cusName'] != '' && $_POST['cusAddress'] != '') {

          if (check_unique_all(strval($_POST['cusUsername']), 'username')) {
            if (check_username(strval($_POST['cusUsername']))) {
              if (check_password(strval($_POST['cusPassword']))) {
                if (check_other(strval($_POST['cusName']))) {
                  if (check_other(strval($_POST['cusAddress']))) {

                    // change name of the file before uploading it
                    $temp = explode(".", $_FILES["cusImg"]["name"]);
                    // $newfilename = round(microtime(true)) . '.' . end($temp);
                    $newfilename = strval($_POST['cusUsername']) . '.' . end($temp);
                    $new_target_file = $target_dir . $newfilename;                

                    $insert_password = hash_password($_POST['cusPassword']);

                    $user = [
                      // 'id' => $register_id,
                      'role' => $role,
                      'username' => $_POST['cusUsername'],
                      'password' => $insert_password,
                      'img' => $new_target_file,
                      'name' => $_POST['cusName'],
                      'address' => $_POST['cusAddress'],
                      'hub' => '',
                      'createdTime' => date('d-m-Y h:i:s'),

                    ];

                    $_SESSION['users'][] = $user;

                    // If all other fields passed and session is set -> check upload img
                    if (isset($_SESSION['users'])) {
                      // upload the file with new name
                      if (move_uploaded_file($_FILES["cusImg"]["tmp_name"], $new_target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["cusImg"]["name"])). " has been uploaded.";
                        save_user_file();

                      } else {
                        $error = "Sorry, there was an error uploading your file.";
                      }

                      // if do not use read_from_file() function -> $_SESSION['users'] will record the most recent info -> latest registration
                      // This is only for pre test before checking unique
                      // read_user_file();
                    }
                  } else {
                    $error = 'wrong Customer address pattern';
                  }
                } else {
                  $error = 'wrong Customer name pattern';
                }
              } else {
                $error = 'wrong password pattern';
              }
            } else {
              $error = 'wrong username pattern';
            }
          } else {
            $error = 'This username has been taken - choose another';
          }
        
        } else {
          $error = 'there are blank fields';
        }  
      }
    }

    if (!is_null($error)) {
      echo $error;
    } else {
      // header('location: users.php');
    }
  } else {
    header('location: customer-register-page.php');
  }

  // test SESSION users
  if (isset($_SESSION['users'])) {
    echo '<pre>';
    print_r($_SESSION['users']);
    echo '</pre>';
  }

?>
