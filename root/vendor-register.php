<?php
  session_start();
  include_once 'register-validation.php';
  
  
  if (isset($_POST['register'])) {

    $error = '';

    if(!file_exists($_FILES['venImg']['tmp_name']) 
      || !is_uploaded_file($_FILES['venImg']['tmp_name'])) {
        $error = 'You have not uploaded your picture file';
    } else {
      $role = 'vendor';

      // --- UPLOAD IMG ---
      $target_dir = "img/vendor_img/";
      $target_file = $target_dir . basename($_FILES["venImg"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $error = "Sorry, your file was not uploaded.";

      // if everything is ok, try to upload file
      } else {

        if ($_POST['venUsername'] != '' && $_POST['venPassword'] != '' &&
        $_POST['venName'] != '' && $_POST['venAddress'] != '') {

          if (check_unique_all(strval($_POST['venUsername']), 'username')) {
            unset($_SESSION['errorUsername']);
            if (check_unique_column(strval($_POST['venName']), 'name', 'role', 'vendor')) {
              unset($_SESSION['errorName']);
              if (check_unique_column(strval($_POST['venAddress']), 'address', 'role', 'vendor')) {
                unset($_SESSION['errorAddress']);
                if (check_username(strval($_POST['venUsername']))) {
                  if (check_password(strval($_POST['venPassword']))) {
                    if (check_other(strval($_POST['venName']))) {
                      if (check_other(strval($_POST['venAddress']))) {

                        // change name of the file before uploading it
                        $temp = explode(".", $_FILES["venImg"]["name"]);
                        // $newfilename = round(microtime(true)) . '.' . end($temp);
                        $newfilename = strval($_POST['venUsername']) . '.' . end($temp);
                        $new_target_file = $target_dir . $newfilename;                

                        $insert_password = hash_password($_POST['venPassword']);

                        $user = [
                          // 'id' => $register_id,
                          'role' => $role,
                          'username' => $_POST['venUsername'],
                          'password' => $insert_password,
                          'img' => $new_target_file,
                          'name' => $_POST['venName'],
                          'address' => $_POST['venAddress'],
                          'hub' => '',
                          'createdTime' => date('d-m-Y h:i:s'),

                        ];

                        $_SESSION['users'][] = $user;

                        // If all other fields passed and session is set -> check upload img
                        if (isset($_SESSION['users'])) {
                          // upload the file with new name
                          if (move_uploaded_file($_FILES["venImg"]["tmp_name"], $new_target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["cusImg"]["name"])). " has been uploaded.";
                            if (save_user_file()) {
                              $_SESSION['registered'] = 'You have not been registered';
                              header('location: index.php');
                            } else {
                              unset($_SESSION['registered']);
                              header('location: vendor-register-page.php');
                            }

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
                $error = 'This vendor address has been taken - choose another';
                $_SESSION['errorAddress'] = $error;
                header('location: vendor-register-page.php');
              }
              
            } else {
              $error = "This vendor name has been taken - choose another";
              $_SESSION['errorName'] = $error;
              header('location: vendor-register-page.php');
            }
            
          } else {
            $error = 'This username has been taken - choose another';
            $_SESSION['errorUsername'] = $error;
            header('location: vendor-register-page.php');
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
    header('location: vendor-register-page.php');
  }

  // test SESSION users
  if (isset($_SESSION['users'])) {
    echo '<pre>';
    print_r($_SESSION['users']);
    echo '</pre>';
  }

?>

