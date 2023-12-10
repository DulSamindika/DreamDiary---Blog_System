<?php session_start();





// initializing variables
$username = "";
$email    = "";
$title    = "";
$author    = "";
$abstract    = "";
$content    = "";
$category   = "";
$image    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'blog_system');

if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

$db_exists = mysqli_query($db, "SHOW DATABASES LIKE 'blog_system'");

if (!$db_exists) {
  // Create database if it doesn't exist
  mysqli_query($db, "CREATE DATABASE blog_system");
  echo "Database 'blog_system' created successfully.";
}

// Check if 'users' table exists
$users_table_exists = mysqli_query($db, "SHOW TABLES IN blog_system LIKE 'users'");

if (!$users_table_exists) {
  // Create 'users' table if it doesn't exist
  mysqli_query($db, "CREATE TABLE blog_system.users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(30) NOT NULL
  )");
  echo "Table 'users' created successfully.";
}

// Check if 'posts' table exists
$posts_table_exists = mysqli_query($db, "SHOW TABLES IN blog_system LIKE 'posts'");

if (!$posts_table_exists) {
  // Create 'posts' table if it doesn't exist
  mysqli_query($db, "CREATE TABLE blog_system.posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    abstract VARCHAR(5000) NOT NULL,
    content TEXT NOT NULL,
    category VARCHAR(50000) NOT NULL,
    image_url VARCHAR(255) NOT NULL
  )");
  echo "Table 'posts' created successfully.";
}










// REGISTER USER


if (isset($_POST['reg_user'])) {

  // Debugging
  echo "Form data received";


  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
  $stmt = mysqli_prepare($db, $user_check_query);
  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);
  //$result = mysqli_query($db, $user_check_query);
  $result = mysqli_stmt_get_result($stmt);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT); //encrypt the password before saving in the database


    $insert_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt_insert = mysqli_prepare($db, $insert_query);
    mysqli_stmt_bind_param($stmt_insert, "sss", $username, $email, $password_hash);
    mysqli_stmt_execute($stmt_insert);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: login.php');
    exit();
  }
}








// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    //$password = md5($password);
    $user_query = "SELECT * FROM users WHERE username=?";
    //$results = mysqli_query($db, $query);
    $stmt = mysqli_prepare($db, $user_query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);


    if ($results && mysqli_num_rows($results) == 1) {

      $user = mysqli_fetch_assoc($results);

      

      if (password_verify($password, $user['password'])) {
        session_start();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        session_regenerate_id(true);
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        header('location: create.php');
        exit();
      } else {
        array_push($errors, "Wrong password");
      }
    } else {
      array_push($errors, "Wrong username/password combination");
    }
    var_dump($_SESSION);
  }
}








// GET BLOG CONTENT

if (isset($_GET['id'])) {
  // Get article ID from URL parameter
  $articleId = $_GET['id'];

  // Fetch article details from the database based on the ID
  $query = "SELECT * FROM posts WHERE id = $articleId";
  $results = mysqli_query($db, $query);

  if ($results && mysqli_num_rows($results) > 0) {
    $row = mysqli_fetch_assoc($results);
    $title = $row['title'];
    $author = $row['author'];
    $abstract = $row['abstract'];
    $image_url = $row['image_url'];
    $content = $row['content'];
  } else {
    // Handle the case where no article is found with the given ID
    $title = "Article Not Found";
    $abstract = "The requested article does not exist.";
  }
} else {
  // Handle the case where article ID is not set in the URL
  $title = "Invalid Request";
  $abstract = "Please provide a valid article ID.";
}
