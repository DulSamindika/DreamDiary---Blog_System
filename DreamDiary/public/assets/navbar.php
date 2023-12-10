<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
  </style>

</head>

<body>
  <main>
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
          <a class="navbar-brand col-lg-3 me-0" href="home.php">
            <img src="Images/blog-logo-nav.png" alt="logo" style="max-height: 40px; max-width:200px" /></a>
          <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php">Create</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Science</a></li>
                <li><a class="dropdown-item" href="#">Technology</a></li>
                <li><a class="dropdown-item" href="#">Entertainment</a></li>
                <li><a class="dropdown-item" href="#">History</a></li>
                <li><a class="dropdown-item" href="#">Travel</a></li>
              </ul>
            </li>
          </ul>
          <div class="d-lg-flex col-lg-3 justify-content-lg-end ">
            <ul class="navbar-nav col-lg-6 justify-content-lg-end ">
              <li class="nav-item mt-2">
                <a class="nav-link" class="nav-item" href="login.php">Login</a>
              </li class="nav-item">
              <li>
                <a class="nav-link" class="nav-item" href="signUp.php">
                  <button class="btn btn-primary">Sign Up</button>
              </li></a>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </main>
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>