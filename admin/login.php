<?php
    require '../core/db.conf.php';
    $username = "";
    $password = "";
    $sql = "";
    $query = "";
    $messege = "";
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM admin WHERE username='$username'";
        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($query);
        if ($username == $row['username'] && $password == $row['password']) {
            session_start();
            $_SESSION['admin_log'] = 1;
            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_name'] = $row['name'];
            header("location: index.php");
        } else {
            $messege = "<div class='alert alert-danger text-center'>Something went wrong</div>";
        }
    }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <link rel="icon" href="../images/logo.png" type="image/png">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
      <a href="/"><img src="../images/logo.png" alt="" width="72" height="72"></a>
      <h6 class="mb-4">Job Placement, Cell Management</h6>
      <h3 class="mb-3 font-weight-normal">Admin Login</h3>
      <?php echo $messege ?>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputText" class="form-control" name="username" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Log in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </body>
</html>
