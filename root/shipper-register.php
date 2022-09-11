<?php
  session_start();
  include_once 'register-validation.php';
  
  
  if (isset($_POST['register'])) {

    $error = '';
    $_SESSION['registered'] = '';

    if(!file_exists($_FILES['shipImg']['tmp_name']) 
      || !is_uploaded_file($_FILES['shipImg']['tmp_name'])) {
        $error = 'You have not uploaded your picture file';
    } else {
      $role = 'shipper';

      // --- UPLOAD IMG ---
      $target_dir = "img/shipper_img/";
      $target_file = $target_dir . basename($_FILES["shipImg"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $error = "Sorry, your file was not uploaded.";

      // if everything is ok, try to upload file
      } else {

        if ($_POST['shipUsername'] != '' && $_POST['shipPassword'] != '') {

          if (check_unique_all(strval($_POST['shipUsername']), 'username')) {
            unset($_SESSION['errorUsername']);
            if (check_username(strval($_POST['shipUsername']))) {
              if (check_password(strval($_POST['shipPassword']))) {
                // change name of the file before uploading it
                $temp = explode(".", $_FILES["shipImg"]["name"]);
                // $newfilename = round(microtime(true)) . '.' . end($temp);
                $newfilename = strval($_POST['shipUsername']) . '.' . end($temp);
                $new_target_file = $target_dir . $newfilename;                

                $insert_password = hash_password($_POST['shipPassword']);

                $user = [
                  // 'id' => $register_id,
                  'role' => $role,
                  'username' => $_POST['shipUsername'],
                  'password' => $insert_password,
                  'img' => $new_target_file,
                  'name' => '',
                  'address' => '',
                  'hub' => $_POST['shipHub'],
                  'createdTime' => date('d-m-Y h:i:s'),

                ];

                $_SESSION['users'][] = $user;

                // If all other fields passed and session is set -> check upload img
                if (isset($_SESSION['users'])) {
                  // upload the file with new name
                  if (move_uploaded_file($_FILES["shipImg"]["tmp_name"], $new_target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["cusImg"]["name"])). " has been uploaded.";
                    // if (save_user_file()) {
                    //   unset($_SESSION['registered']);
                      
                    //   header('location: index.php');
                    // } else {
                    //   $_SESSION['registered'] = 'You have not been registered';
                    //   header('location: shipper-register-page.php');
                    // }

                    save_user_file();
                    header('location: login-page.php');

                  } else {
                    $error = "Sorry, there was an error uploading your file.";
                  }

                  // if do not use read_from_file() function -> $_SESSION['users'] will record the most recent info -> latest registration
                  // This is only for pre test before checking unique
                  // read_user_file();
                }
              } else {
                $error = 'wrong password pattern';
              }
            } else {
              $error = 'wrong username pattern';
            }
          } else {
            $error = 'This username has been taken - choose another';
            $_SESSION['errorUsername'] = $error;
            header('location: shipper-register-page.php');
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
    header('location: shipper-register-page.php');
  }

  // test SESSION users
  if (isset($_SESSION['users'])) {
    echo '<pre>';
    print_r($_SESSION['users']);
    echo '</pre>';
  }

?>

