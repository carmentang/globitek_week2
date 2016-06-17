<?php

  //
  // COUNTRY QUERIES
  //

  // Find all countries, ordered by name
  function find_all_countries() {
    global $db;
    $sql = "SELECT * FROM countries ORDER BY name ASC;";
    $country_result = db_query($db, $sql);
    return $country_result;
  }

  function find_country_by_id($id) {
    global $db;
    $sql = "SELECT * FROM countries WHERE id = $id";
    $country_result = db_query($db, $sql);
    return $country_result;
  }

  function find_states_by_country_id($id=0) {
    global $db;
    $sql = "SELECT * FROM states WHERE country_id = $id ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    return $result;
  }

  function find_territories_by_state_id($id=0) {
    global $db;
    $sql = "SELECT * FROM territories WHERE state_id = $id ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    return $result;
  }

  function find_salesterritories_by_terr_id($id=0) {
    global $db;
    $sql = "SELECT * FROM salespeople_territories WHERE territory_id = $id";
    $result = mysqli_query($db, $sql);
    return $result;
  }

  function validate_country($country, $errors=array()) {
    if (is_blank($country['name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif (!has_length($country['name'], array('min' => 2, 'max' => 60))) {
      $errors[] = "Name must be between 2 and 60 characters.";
    } elseif (!has_valid_name($country['name'])) {
      $errors[] = "Invalid country name.";
    }

    if (is_blank($country['code'])) {
      $errors[] = "Country code cannot be blank.";
    } elseif (!has_length($country['code'], array('min' => 2, 'max' => 10))) {
      $errors[] = "Country code must be between 2 and 10 characters.";
    } elseif (!has_valid_code($country['code'])) {
      $errors[] = "Country code invalid.";
    }
    return $errors;
  }

  // Add a new country to the table
  // Either returns true or an array of errors
  function insert_country($country) {
    global $db;

    $errors = validate_country($country);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO countries ";
    $sql .= "(name, code) ";
    $sql .= "VALUES (";
    $sql .= "'" . $country['name'] . "',";
    $sql .= "'" . $country['code'] . "'";
    $sql .= ");";
    // For INSERT statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL INSERT statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  // Edit a country record
  // Either returns true or an array of errors
  function update_country($country) {
    global $db;

    $errors = validate_country($country);
    if (!empty($errors)) {
      return $errors;
    }
    $sql = "UPDATE countries SET ";
    $sql .= "name='" . $country['name'] . "', ";
    $sql .= "code='" . $country['code'] . "' ";
    $sql .= "WHERE id='" . $country['id'] . "' ";
    $sql .= "LIMIT 1;";
    // For update_salesperson statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL UPDATE statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  //
  // STATE QUERIES
  //

  // Find all states, ordered by name
  function find_all_states() {
    global $db;
    $sql = "SELECT * FROM states ";
    $sql .= "ORDER BY name ASC;";
    $state_result = db_query($db, $sql);
    return $state_result;
  }

  // Find all states, ordered by name
  function find_states_for_country_id($country_id=0) {
    global $db;
    $sql = "SELECT * FROM states ";
    $sql .= "WHERE country_id='" . $country_id . "' ";
    $sql .= "ORDER BY name ASC;";
    $state_result = db_query($db, $sql);
    return $state_result;
  }

  // Find state by ID
  function find_state_by_id($id=0) {
    global $db;
    $sql = "SELECT * FROM states ";
    $sql .= "WHERE id='" . $id . "';";
    $state_result = db_query($db, $sql);
    return $state_result;
  }

  function validate_state($state, $errors=array()) {
    if (is_blank($state['name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif (!has_length($state['name'], array('min' => 2, 'max' => 60))) {
      $errors[] = "Name must be between 2 and 60 characters.";
    } elseif (!has_valid_name($state['name'])) {
      $errors[] = "Invalid state name.";
    }

    if (is_blank($state['code'])) {
      $errors[] = "State code cannot be blank.";
    } elseif (!has_length($state['code'], array('min' => 2, 'max' => 10))) {
      $errors[] = "State code must be between 2 and 10 characters.";
    } elseif (!has_valid_code($state['code'])) {
      $errors[] = "State code invalid.";
    }

    if (is_blank($state['country_id'])) {
      $errors[] = "Country ID cannot be blank";
    } elseif (!has_length($state['country_id'], array('min' => 1, 'max' => 10))) {
      $errors[] = "Country ID must be between 1 and 10 numbers.";
    } elseif (!is_num($state['country_id'])) {
      $errors[] = "Country ID must be an integer.";
    }
    return $errors;
  }

  // Add a new state to the table
  // Either returns true or an array of errors
  function insert_state($state) {
    global $db;

    $errors = validate_state($state);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO states ";
    $sql .= "(name, code, country_id) ";
    $sql .= "VALUES (";
    $sql .= "'" . $state['name'] . "',";
    $sql .= "'" . $state['code'] . "',";
    $sql .= "'" . $state['country_id'] . "'";
    $sql .= ");";
    // For INSERT statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL INSERT statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  // Edit a state record
  // Either returns true or an array of errors
  function update_state($state) {
    global $db;

    $errors = validate_state($state);
    if (!empty($errors)) {
      return $errors;
    }
    $sql = "UPDATE states SET ";
    $sql .= "name='" . $state['name'] . "', ";
    $sql .= "code='" . $state['code'] . "', ";
    $sql .= "country_id='" . $state['country_id'] . "' ";
    $sql .= "WHERE id='" . $state['id'] . "' ";
    $sql .= "LIMIT 1;";
    // For update_salesperson statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL UPDATE statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  //
  // TERRITORY QUERIES
  //

  // Find all territories, ordered by state_id
  function find_all_territories() {
    global $db;
    $sql = "SELECT * FROM territories ";
    $sql .= "ORDER BY state_id ASC, position ASC;";
    $territory_result = db_query($db, $sql);
    return $territory_result;
  }

  // Find all territories whose state_id (foreign key) matches this id
  function find_territories_for_state_id($state_id=0) {
    global $db;
    $sql = "SELECT * FROM territories ";
    $sql .= "WHERE state_id='" . $state_id . "' ";
    $sql .= "ORDER BY position ASC;";
    $territory_result = db_query($db, $sql);
    return $territory_result;
  }

  // Find territory by ID
  function find_territory_by_id($id=0) {
    global $db;
    $sql = "SELECT * FROM territories ";
    $sql .= "WHERE id='" . $id . "';";
    $territory_result = db_query($db, $sql);
    return $territory_result;
  }

  function validate_territory($territory, $errors=array()) {
    if (is_blank($territory['name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif (!has_length($territory['name'], array('min' => 2, 'max' => 60))) {
      $errors[] = "Name must be between 2 and 60 characters.";
    } elseif (!has_valid_name($territory['name'])) {
      $errors[] = "Invalid Territory name.";
    }
    if (is_blank($territory['position'])) {
      $errors[] = "Position cannot be blank";
    } elseif (!has_length($territory['position'], array('min' => 1, 'max' => 5))) {
      $errors[] = "Position must be between 2 and 5 char";
    } elseif (!is_num($territory['position'])) {
      $errors[] = "Position must be an integer.";
    }

    return $errors;
  }

  // Add a new territory to the table
  // Either returns true or an array of errors
  function insert_territory($territory) {
    global $db;

    $errors = validate_territory($territory);
    if (!empty($errors)) {
      return $errors;
    }
    $sql = "INSERT INTO territories ";
    $sql .= "(name, state_id, position) ";
    $sql .= "VALUES (";
    $sql .= "'" . $territory['name'] . "',";
    $sql .= "'" . $territory['state_id'] . "',";
    $sql .= "'" . $territory['position'] . "'";
    $sql .= ");";
    echo "Name: " . $territory['name'];
    echo "ID: " . $territory['state_id'] . "    ";
    // For INSERT statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL INSERT territoryment failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  // Edit a territory record
  // Either returns true or an array of errors
  function update_territory($territory) {
    global $db;

    $errors = validate_territory($territory);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE territories SET ";
    $sql .= "name='" . $territory['name'] . "', ";
    $sql .= "state_id='" . $territory['state_id'] . "', ";
    $sql .= "position='" . $territory['position'] . "' ";
    $sql .= "WHERE id='" . $territory['id'] . "' ";
    $sql .= "LIMIT 1;";
    // For update_territory statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL UPDATE territoryment failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  //
  // SALESPERSON QUERIES
  //

  // Find all salespeople, ordered last_name, first_name
  function find_all_salespeople() {
    global $db;
    $sql = "SELECT * FROM salespeople ";
    $sql .= "ORDER BY last_name ASC, first_name ASC;";
    $salespeople_result = db_query($db, $sql);
    return $salespeople_result;
  }

  // To find salespeople, we need to use the join table.
  // We LEFT JOIN salespeople_territories and then find results
  // in the join table which have the same territory ID.
  function find_salespeople_for_territory_id($territory_id=0) {
    global $db;
    $sql = "SELECT * FROM salespeople ";
    $sql .= "LEFT JOIN salespeople_territories
              ON (salespeople_territories.salesperson_id = salespeople.id) ";
    $sql .= "WHERE salespeople_territories.territory_id='" . $territory_id . "' ";
    $sql .= "ORDER BY last_name ASC, first_name ASC;";
    $salespeople_result = db_query($db, $sql);
    return $salespeople_result;
  }

  // Find salesperson using id
  function find_salesperson_by_id($id=0) {
    global $db;
    $sql = "SELECT * FROM salespeople ";
    $sql .= "WHERE id='" . $id . "';";
    $salespeople_result = db_query($db, $sql);
    return $salespeople_result;
  }

  function validate_salesperson($salesperson, $errors=array()) {
    if (is_blank($salesperson['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($salesperson['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    } elseif (!has_valid_name($salesperson['first_name'])) {
      $errors[] = "First name invalid.";
    }

    if (is_blank($salesperson['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($salesperson['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    } elseif (!has_valid_name($salesperson['last_name'])) {
      $errors[] = "Last name invalid.";
    }

    if (is_blank($salesperson['phone'])) {
      $errors[] = "Phone number cannot be blank.";
    } elseif (!has_length($salesperson['phone'], array('min' => 10, 'max' => 14))) {
      $errors[] = "Phone number must be between 10 and 14 numbers.";
    } elseif (!has_valid_phone_number($salesperson['phone'])) {
      $errors[] = "Phone number must be valid.";
    }

    if (is_blank($salesperson['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($salesperson['email'], array('min' => 4, 'max' => 255))) {
      $errors[] = "Email must be between 4 and 255 characters.";
    } elseif (!has_valid_email_format($salesperson['email'])) {
      $errors[] = "Email must be a valid format.";
    }
    return $errors;
  }

  // Add a new salesperson to the table
  // Either returns true or an array of errors
  function insert_salesperson($salesperson) {
    global $db;

    $errors = validate_salesperson($salesperson);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO salespeople ";
    $sql .= "(first_name, last_name, phone, email) ";
    $sql .= "VALUES (";
    $sql .= "'" . $salesperson['first_name'] . "',";
    $sql .= "'" . $salesperson['last_name'] . "',";
    $sql .= "'" . $salesperson['phone'] . "',";
    $sql .= "'" . $salesperson['email'] . "'";
    $sql .= ");";
    // For INSERT statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL INSERT statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  // Edit a salesperson record
  // Either returns true or an array of errors
  function update_salesperson($salesperson) {
    global $db;

    $errors = validate_salesperson($salesperson);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE salespeople SET ";
    $sql .= "first_name='" . $salesperson['first_name'] . "', ";
    $sql .= "last_name='" . $salesperson['last_name'] . "', ";
    $sql .= "phone='" . $salesperson['phone'] . "', ";
    $sql .= "email='" . $salesperson['email'] . "' ";
    $sql .= "WHERE id='" . $salesperson['id'] . "' ";
    $sql .= "LIMIT 1;";
    // For update_salesperson statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL UPDATE statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  // To find territories, we need to use the join table.
  // We LEFT JOIN salespeople_territories and then find results
  // in the join table which have the same salesperson ID.
  function find_territories_by_salesperson_id($id=0) {
    global $db;
    $sql = "SELECT * FROM territories ";
    $sql .= "LEFT JOIN salespeople_territories
              ON (territories.id = salespeople_territories.territory_id) ";
    $sql .= "WHERE salespeople_territories.salesperson_id='" . $id . "' ";
    $sql .= "ORDER BY territories.name ASC;";
    $territories_result = db_query($db, $sql);
    return $territories_result;
  }

  //
  // USER QUERIES
  //

  // Find all users, ordered last_name, first_name
  function find_all_users() {
    global $db;
    $sql = "SELECT * FROM users ";
    $sql .= "ORDER BY last_name ASC, first_name ASC;";
    $users_result = db_query($db, $sql);
    return $users_result;
  }

  // Find user using id
  function find_user_by_id($id=0) {
    global $db;
    $sql = "SELECT * FROM users WHERE id='" . $id . "' LIMIT 1;";
    $users_result = db_query($db, $sql);
    return $users_result;
  }

  function validate_user($user, $errors=array()) {
    if (is_blank($user['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($user['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    } elseif (!has_valid_name($user['first_name'])) {
      $errors[] = "First name invalid.";
    }

    if (is_blank($user['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($user['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    } elseif (!has_valid_name($user['last_name'])) {
      $errors[] = "Last name invalid.";
    }

    if (is_blank($user['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($user['username'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Username must be between 2 and 255 characters.";
    } elseif (!has_valid_username($user['username'])) {
      $errors[] = "Invalid username.";
    } elseif (!is_unique($user)) {
      $errors[] = "Username already taken.";
    }


    if (is_blank($user['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($user['email'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Email must be between 2 and 255 characters.";
    } elseif (!has_valid_email_format($user['email'])) {
      $errors[] = "Email must be a valid format.";
    }
    return $errors;
  }

  // Add a new user to the table
  // Either returns true or an array of errors
  function insert_user($user) {
    global $db;

    $errors = validate_user($user);
    if (!empty($errors)) {
      return $errors;
    }

    $created_at = date("Y-m-d H:i:s");
    $sql = "INSERT INTO users ";
    $sql .= "(first_name, last_name, email, username, created_at) ";
    $sql .= "VALUES (";
    $sql .= "'" . $user['first_name'] . "',";
    $sql .= "'" . $user['last_name'] . "',";
    $sql .= "'" . $user['email'] . "',";
    $sql .= "'" . $user['username'] . "',";
    $sql .= "'" . $created_at . "'";
    $sql .= ");";
    // For INSERT statments, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL INSERT statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  // Edit a user record
  // Either returns true or an array of errors
  function update_user($user) {
    global $db;

    $errors = validate_user($user);
  if (!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE users SET ";
    $sql .= "first_name='" . $user['first_name'] . "', ";
    $sql .= "last_name='" . $user['last_name'] . "', ";
    $sql .= "email='" . $user['email'] . "', ";
    $sql .= "username='" . $user['username'] . "' ";
    $sql .= "WHERE id='" . $user['id'] . "' ";
    $sql .= "LIMIT 1;";
    // For update_user statements, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL UPDATE statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

  function delete_user($id) {
    global $db;

    $sql = "DELETE FROM users ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1;";
    // For update_user statements, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL UPDATE statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }


?>
