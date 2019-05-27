
<?php
    // error_reporting(0);
    $err_msg ="";

    if ($_SESSION['stu-msg'] == 1) {
        $err_msg = '<p class="alert alert-danger text-center">You must loging first!</p>';
        unset($_SESSION['stu-msg']);
    }
    if ($_SESSION['stu-log'] == 1) {
        header("Location: /error?msg=logged-in");
    }

    $page_title = "Student Login :";
    require 'includes/header.php';


?>


<div class="contentsection">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="maincontent fix">
                <h3 class="text-center mt-3">Student Login</h3>
                <p class="text-center">Login as a student</p>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <?php
                            echo $err_msg;
                            echo $stu_login_err;
                            if (isset($_POST['stu-login'])) {
                                if (empty($_POST['username']) || empty($_POST['password'])) {
                                   echo '<div class="alert alert-danger text-center">';
                                   echo $stu_user_err;
                                   echo $stu_pass_err;
                                   echo '</div>';
                                }
                            }
                        ?>
                        <form class="" action="" method="post">
                            <div class="form-group">
                                <input type="text" name="username" id="stu-username" class="form-control text-center" placeholder="Username">
                                <input type="password" name="password" id="stu-password" class="form-control text-center" placeholder="Password">
                            </div>
                            <input type="submit" name="stu-login" value="Log in" class="form-control btn btn-primary">
                        </form>
                        <p class="text-center mt-3 mb-3">Not a member yet? <a href="/student-register">Register</a> here</p>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
