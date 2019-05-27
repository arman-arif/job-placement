<?php error_reporting(0); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $pagetitle ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Fontawesome core CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">


    <link rel="icon" href="../images/logo.png" type="image/png">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Panel</a>
      <h6 class="col-sm-3 col-md-2 mr-0 text-center text-light">Job Placement <br>Cell Management</h6>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link float-left pr-4" href="/" target="_blank"><i class="fa fa-globe"></i></a>
          <a class="nav-link float-left" href="logout.php">Log out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
            <?php include 'include/nav.php'; ?>
