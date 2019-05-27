<?php
    session_start();
    if ($_SESSION['com_log'] != 1) {
        header("location: /company/login.php");
    }
  require '../core/db.conf.php';
  $pagetitle = "Company Dashboard";
  $home = "active";
  require 'include/header.php';
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>

          <div class="row mt-5">
            <div class="col-7 ">
              <div class="row pb-3">
                <div class="col-6 mb-4">
                  <div class="card text-center pt-4 bg-dark text-light">
                    <i class="fa fa-graduation-cap fa-5x"></i>
                    <?php
                      $sql = "select * from students";
                      $query = mysqli_query($db, $sql);
                      $rows = mysqli_num_rows($query);
                    ?>
                    <p class="pt-2"><?php echo $rows ?><br>Students</p>
                  </div>
                </div>
                <div class="col-6 mb-4">
                  <div class="card text-center pt-4 bg-dark text-light">
                    <i class="fa fa-user fa-5x"></i>
                    <?php
                      $sql = "select * from teachers";
                      $query = mysqli_query($db, $sql);
                      $rows = mysqli_num_rows($query);
                    ?>
                    <p class="pt-2"><?php echo $rows ?><br>Teachers</p>
                  </div>

                </div>
                <div class="col-6 mb-4">
                  <div class="card text-center pt-4 bg-dark text-light">
                    <i class="fa fa-building fa-5x"></i>
                    <?php
                      $sql = "select * from companies";
                      $query = mysqli_query($db, $sql);
                      $rows = mysqli_num_rows($query);
                    ?>
                    <p class="pt-2"><?php echo $rows ?><br>Companies</p>

                  </div>


                </div>
                <div class="col-6 mb-4">
                  <div class="card text-center pt-4 bg-dark text-light">
                    <?php
                      $sql = "select * from joboffer";
                      $query = mysqli_query($db, $sql);
                      $rows = mysqli_num_rows($query);
                    ?>
                    <i class="fa fa-briefcase fa-5x"></i>
                    <p class="pt-2"><?php echo $rows ?><br>Job Offers</p>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-5 company-info">
                  <h3 class="text-center">Company Info</h3>
                  <table class="table">
                      <tr>
                          <td>Name: </td>
                          <td><b><?php echo $_SESSION['com_name'] ?></b></td>
                      </tr>
                      <tr>
                          <td>Username: </td>
                          <td><b><?php echo $_SESSION['com_username'] ?></b></td>
                      </tr>
                      <tr>
                          <td>Email: </td>
                          <td><i><?php echo $_SESSION['com_email'] ?></i></td>
                      </tr>
                      <tr>
                          <td>Phone: </td>
                          <td><?php echo $_SESSION['com_phone'] ?></td>
                      </tr>
                  </table>
                  <h5>Change Password</h5>
                  <form class="form" method="post">
                      <input type="password" name="password" class="form-control form-control-sm" placeholder="Current Password" required>
                      <input type="password" name="newpassword" class="form-control  form-control-sm" placeholder="New Password" required>
                      <input type="password" name="confirmpassword" class="form-control  form-control-sm" placeholder="Confirm Password" required>
                      <input type="submit" name="changepassword" class="form-control btn btn-sm form-control-sm btn-secondary" value="Change Password">
                  </form>
                  <?php
                      $username = $_SESSION['com_username'];

                      $pass_sql = "SELECT * FROM companies WHERE username='$username'";
                      $pass_query = mysqli_query($db, $pass_sql);
                      $pass_row = mysqli_fetch_array($pass_query);

                      if (isset($_POST['changepassword'])) {
                          $password = $_POST['password'];
                          if ($password == $pass_row['password'] && $_POST['newpassword'] == $_POST['confirmpassword']) {
                              $pass_sql = "UPDATE `companies` SET `password`='$password' WHERE `username`='$username'";
                              $pass_query=mysqli_query($db, $pass_sql);
                              if ($pass_query) {
                                  echo "<div class='alert alert-success mt-2'>Password change succuss</div>";
                              }
                          } else {
                              echo "<div class='alert alert-danger mt-2'>";
                              if ($password != $pass_row['password']) {
                                  echo "<div>Wrong password entered</div>";
                              }
                              if ($_POST['newpassword'] != $_POST['confirmpassword']) {
                                  echo "<div>Password are not matched</div>";
                              }
                              echo "</div>";
                          }
                      }
                  ?>
            </div>
          </div>

        </main>


<?php require 'include/footer.php'; ?>
