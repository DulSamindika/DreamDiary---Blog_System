<?php include('server.php') ?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Blog</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/grid/">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

  <?php include('navbar.php'); ?>

  <div class="container text-center">
    <div class="row">
      <div class="col">
      </div>
      <div class="col-6">


        <div class="container">
          <h1><?php echo $title; ?></h1>
          <p>Author: <?php echo $author; ?></p>

          <p><?php echo $abstract; ?></p>
          <img src="/DreamDiary/public/assets/uploads/<?php echo $row['image_url']; ?>" class="img-fluid rounded-start" alt="blog" style="height: 100%;">
          <div><?php echo $content; ?></div>
        </div>

      </div>
      <div class="col">
      </div>
    </div>
  </div>

  <footer>

      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>&copy; 2023 Company, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#twitter" />
              </svg></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#instagram" />
              </svg></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#facebook" />
              </svg></a></li>
        </ul>
      </div>
    </footer>

</body>

</html>