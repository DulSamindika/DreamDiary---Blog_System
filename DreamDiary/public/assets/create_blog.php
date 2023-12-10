<?php


include('server.php');





if (isset($_POST['upload_blog']) && isset($_FILES['my_image'])) {


  

 

  /*
  
      echo "<pre>";
      print_r($_POST);  // Print all POST data for inspection
      echo "</pre>";
  
  
      echo "<pre>";
      print_r($_FILES['my_image']);
      echo "</pre>";*/

  $title = mysqli_real_escape_string($db, $_POST['title']);
  $author = mysqli_real_escape_string($db, $_POST['author']);
  $abstract = mysqli_real_escape_string($db, $_POST['abstract']);
  $content = mysqli_real_escape_string($db, $_POST['content']);
  $category = mysqli_real_escape_string($db, $_POST['category']);

  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  if ($error === 0) {
    if ($img_size > 525000) {
      $em = "Sorry, your file is too large.";
      header("Location: create.php?error=$em");
    } else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png");

      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;

        $img_upload_path = __DIR__ . '/uploads/' . $new_img_name;
        if (move_uploaded_file($tmp_name, $img_upload_path)) {

          $query = "INSERT INTO posts (title, author, abstract, content, category, image_url) VALUES('$title', '$author', '$abstract', '$content', '$category', '$new_img_name')";
          if (mysqli_query($db, $query)) {
            echo "Record added successfully";
          } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
          }
          // Redirect after successful submission
          header("Location: home.php");
          exit();
        } else {
          echo "Failed to move uploaded file.";
        }
      } else {
        $em = "You can't upload files of this type";
        header("Location: create.php?error=$em");
        exit();
      }
    }
  } else {
    $em = "unknown error occurred!";
    header("Location: create.php?error=$em");
    exit();
  }
}
