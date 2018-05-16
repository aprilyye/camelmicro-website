<?php
session_start();


$pages = array(
  "index"=>"Home",
  "product"=>"Product",
  "application" => "Applications",
  "blog" => "Blog",
  "contact" => "Contact",
  "login" => "Log In/Log Out"
);


/** = Message Output = **/
$messages = array();
// Push message out to user
function push_message($message) {
  global $messages;
  array_push($messages, $message);
}
// Print out message to the user
function print_out() {
  global $messages;
  foreach ($messages as $message) {
    echo '<p id= "centerlinemessage">' . htmlspecialchars($message) . "</p>\n";
  }
}

/** = SQL Initialization = **/
// execute an SQL query and return the results


function exec_sql_query($db, $sql, $params = array()) {
  try {
  $query = $db->prepare($sql);
  if ($query and $query->execute($params)) {
    return $query;
  }
} catch (PDOException $exception) {
  echo '<p>' . htmlspecialchars('Exception: '. $exception->getMessage()) . '</p>';
}
return NULL;
}

// YOU MAY COPY & PASTE THIS FUNCTION WITHOUT ATTRIBUTION.
// open connection to database
function open_or_init_sqlite_db($db_filename, $init_sql_filename) {
  if (!file_exists($db_filename)) {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db_init_sql = file_get_contents($init_sql_filename);
    if ($db_init_sql) {
      try {
        $result = $db->exec($db_init_sql);
        if ($result) {
          return $db;
        }
      } catch (PDOException $exception) {
        // If we had an error, then the DB did not initialize properly,
        // so let's delete it!
        unlink($db_filename);
        throw $exception;
      }
    }
  } else {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }
  return NULL;
}


/** = Login/Logout Output = **/

// structure of code taken partly from labs BUT modified to fit site structure,
//database. Additonally, also fit to incorporate sessions variables

// open connection to database
$db = open_or_init_sqlite_db("login.sqlite", "init/init.sql");


function login() {
  global $db;
//check login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
  $_SESSION['loggedin'] = TRUE;
  $session = $_SESSION["loggedin"];
  $sql = "SELECT * FROM accounts WHERE session = :session";
  $params = array(
    ':session' => $session
  );

  $records = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);
  if ($records) {
    // Username is UNIQUE, so there should only be 1 record.
    $account = $records[0];
    return $account['username'];
  }
}
return NULL;
}

//actual login
function log_in($username, $password) {
  global $db;

  if ($username && $password) {
    $sql = "SELECT * FROM accounts WHERE username = :username;";
    $params = array(
      ':username' => $username,
    );
    $records = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    if ($records) {
      //get the first unique record
      $account = $records[0];
      // Check password against database hash
      if (password_verify($password, $account['password'])) {
        Print_r ($_SESSION);
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = $username;
        $session1 = $_SESSION["loggedin"];
        $sql = "UPDATE accounts SET session = :session WHERE id = :user_id;";
        $params = array(
          ':user_id' => $account['ID'],
          ':session' => $session1,
        );
        $result = exec_sql_query($db, $sql, $params);
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
          //user is logged in
          push_message("$username, you're logged in!");
          return TRUE;
        } else {
          push_message("Failed Login");
        }
      } else {
        push_message("Invalid username/password");
      }
    } else {
      push_message("Invalid username/password");
    }
  } else {
    push_message("No username/password given");
  }
  return FALSE;
}


function log_out() {
  global $db;

    unset($_SESSION["loggedin"]);
    session_destroy();
    }
    //This is what is causing Array();
    Print_r ($_SESSION);


// filter input for user input for username
if (isset($_POST['login'])) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $username = trim($username);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  log_in($username, $password);
}
?>
