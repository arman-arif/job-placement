

<?php
    $page_title = $_SESSION['stu-name']." - Profile :";
    require 'includes/header.php';

?>

<div class="contentsection">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="maincontent fix">

                <h3 class="text-center text-uppercase mt-3 mb-4">student profile</h3>
                <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md">
                        <div class="text-center">
                            <i class="fa fa-user-circle-o fa-5x mb-4"></i>
                        </div>
                        <table class="table">
                            <tr>
                                <td>Student Name</td>
                                <td><b><?php echo $_SESSION['stu-name'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Userame</td>
                                <td><b><?php echo $_SESSION['stu-username'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td><b><?php echo $_SESSION['stu-email'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><b><?php echo $_SESSION['stu-phone'] ?></b></td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td><b><?php echo $_SESSION['stu-district'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td><b><?php echo $_SESSION['stu-department'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Session</td>
                                <td><b><?php echo $_SESSION['stu-session'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Passing Year</td>
                                <td><b><?php echo $_SESSION['stu-passed'] ?></b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md"></div>
                </div>


            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
