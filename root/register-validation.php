<?php 

  include_once 'file-control.php';

  function check_username($p1) {
    $username_pattern = "/^([a-zA-Z0-9 ]){8,15}$/";
    if (preg_match($username_pattern, $p1)) {
      return 1;
    } else return 0;
  }

  function check_password($p1) {
    $password_pattern = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])(.{8,20})$/";
    if (preg_match($password_pattern, $p1)) {
      return 1;
    } else return 0;
  }

  function check_other($p1) {
    $other_pattern = "/^(.{5,})$/";
    if (preg_match($other_pattern, $p1)) {
      return 1;
    } else return 0;
  }

  // check if $p1 is the same as $_SESSION['one_user_from_file'][$p2] (column name $p2 - field name $p2)
  function check_unique_all($p1, $p2) {

    $_SESSION['one_user_from_file'] = read_one_user_file($p2);

    if (isset($_SESSION['one_user_from_file'])) {
      $one_user = $_SESSION['one_user_from_file'];
      $length = count($one_user);

      // loop in $one_user to find if there are any matches with $p1
      for ($i=0; $i <$length ; $i++) { 
        if ($p1 == $one_user[$i]) {
          return 0;
        } else {
          continue;
        }
      }
      return 1;
    } else {
      return 0;
    }
  }

  // check unique of $p1 in column $p2 of $array (which gaining from read all info of user with $v1 value in $c1 column)
  function check_unique_column($p1, $p2, $c1, $v1) {
    $user_with_field = read_user_by_field($c1, $v1);
    $array = read_user_one_column($user_with_field, $p2);

    $length_of_array = count($array);
    for ($i=0; $i < $length_of_array; $i++) { 
      if ($p1 == $array[$i]) {
        return 0;
      } else {
        continue;
      }
    }
     return 1;
  }

  // function to hash password
  function hash_password($p1) {
    $hashed_password = password_hash($p1, PASSWORD_DEFAULT);
    return $hashed_password;
  }

?>