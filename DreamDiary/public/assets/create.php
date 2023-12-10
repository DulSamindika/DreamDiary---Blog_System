<?php include('create_blog.php') ?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Create Blog post</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="../assets/bootstarp/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }



    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }

    .container {
      max-width: 960px;
    }
  </style>

</head>

<body class="bg-body-tertiary">

  <?php include('navbar.php'); ?>

  <main>
    <div class="py-5 text-left mx-auto">
      <img class="d-block mx-auto mb-4" src="Images/logo D.png" alt="" width="72" height="67">
      <h2 class="text-center">Create Blog Post</h2>
      <div class="container text-left">


        <form method="post" action="create_blog.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter your title" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Enter author name">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Abstraction</label>
            <textarea class="form-control" name="abstract" id="exampleFormControlTextarea1" rows="3" placeholder="30 word limit" required></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="8" placeholder="5000 word limit" required></textarea>
          </div>
          <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category">
              <option selected>Select Category</option>
              <option value="1">Science</option>
              <option value="2">Technology</option>
              <option value="3">Entertainment</option>
              <option value="3">History</option>
              <option value="3">Travel</option>
            </select>
          </div>
          <div>
            <label for="exampleFormControlTextarea1" class="form-label">Select Image</label></br>
            <div class="input-group mb-3">
              <input type="file" name="my_image" class="form-control" id="inputGroupFile02">
            </div>
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" name="upload_blog" type="submit">Upload</button>
          </div>

        </form>
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
  </main>
</body>

</html>