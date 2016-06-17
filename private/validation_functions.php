<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    if(strpos($value, '@') === false) {
      return false;
    } elseif(!preg_match("/^[A-Za-z0-9\@\.\_\-]+$/", $value)) {
      return false;
    } else {
      return true;
    }
  }

  function has_valid_phone_number($value) {
    if(!preg_match("/^[0-9\(\)\-]+$/", $value)) {
      return false;
    } else {
      return true;
    }
  }

  function has_valid_username($value) {
    if(!preg_match("/^[A-Za-z0-9\_]+$/", $value)) {
      return false;
    } else {
      return true;
    }
  }

  function has_valid_name($value) {
    if(!preg_match("/^[A-Za-z0-9\s\.\-]+$/", $value)) {
      return false;
    } else {
      return true;
    }
  }

  function has_valid_code($value) {
    if(!preg_match("/^[A-Za-z]+$/", $value)) {
      return false;
    } else {
      return true;
    }
  }

  function is_num($value) {
    if(!preg_match("/^[0-9]+$/", $value)) {
      return false;
    } else {
      return true;
    }
  }

  function is_unique($user) {
    $array = find_all_users();
    if(isset($user['id'])) {
      while ($arr = mysqli_fetch_assoc($array)) {
        if ($arr['username'] == $user['username'] && $arr['id'] != $user['id']) {
          return false;
        }
      }
      return true;
    } else {
      while ($arr = mysqli_fetch_assoc($array)) {
        if ($arr['username'] == $user['username']) {
          return false;
        }
      }
      return true;
    }
  }

?>
