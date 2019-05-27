
<?php
    $page_title = "My CV :";
    require 'includes/header.php';

    $std_id = $_GET['student'];
    if (empty($std_id)) {   
        $check_sql = "SELECT * FROM student_cv WHERE username='$stu_username'";
    } else {
        $check_sql = "SELECT * FROM student_cv WHERE username='$std_id'";
    }
    $stu_username = $_SESSION['stu-username'];
    $check_query = mysqli_query($db, $check_sql);
    $check_rows = mysqli_num_rows($check_query);
    $row = mysqli_fetch_assoc($check_query);

?>

<div class="contentsection">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="maincontent fix">
                <h3 class="text-center text-uppercase m-3">Student cv</h3>
                <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md-6">
                        <div class="text-center mb-3 mt-3">
                            <i class="fa fa-user-circle-o fa-5x"></i>
                        </div>
                        <table class="table">
                            <tr>
                                <td colspan="2" class="text-center">
                                    Name: <h5><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">Father: <?php echo $row['fathers_name'] ?></td>
                                <td width="50%">Mother: <?php echo $row['mothers_name'] ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Date of birth: <?php echo $row['date_of_birth'] ?></td>
                                <td width="50%">Gender: <?php echo $row['gender'] ?></td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <?php
                                        $a = json_decode($row['present_address'], 1);
                                    ?>
                                    <b>Present Address </b><br>
                                    Village: <?php echo $a[0] ?><br>
                                    Post Office: <?php echo $a[1] ?><br>
                                    Post Code: <?php echo $a[2] ?><br>
                                    Upazilla: <?php echo $a[3] ?><br>
                                    District: <?php echo $a[4] ?>

                                </td>
                                <td width="50%">
                                    <?php
                                        $b = json_decode($row['permanent_address'], 1);
                                    ?>
                                    <b>Present Address </b><br>
                                    Village: <?php echo $b[0] ?><br>
                                    Post Office: <?php echo $b[1] ?><br>
                                    Post Code: <?php echo $b[2] ?><br>
                                    Upazilla: <?php echo $b[3] ?><br>
                                    District: <?php echo $b[4] ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">Religion: <?php echo $row['religion'] ?></td>
                                <td width="50%">Marital Status: <?php echo $row['marital_status'] ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Nationality: <?php echo $row['nationality'] ?></td>
                                <td width="50%"></td>
                            </tr>
                            <tr>
                                <td width="50%">Contact Number: <?php echo $row['mobile_number'] ?></td>
                                <td width="50%">Email: <?php echo $row['email'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table">
                                        <tr>
                                            <th>Degree</th>
                                            <th>Group</th>
                                            <th>Session</th>
                                            <th>Passing Year</th>
                                            <th>Board</th>
                                            <th>Result</th>
                                        </tr>
                                        <?php $r = json_decode($row['results'], 1); ?>
                                        <tr>
                                            <td>SSC/Dakhil</td>
                                            <td><?php echo $r['ssc']['group'] ?></td>
                                            <td><?php echo $r['ssc']['session'] ?></td>
                                            <td><?php echo $r['ssc']['passed'] ?></td>
                                            <td><?php echo $r['ssc']['board'] ?></td>
                                            <td><?php echo $r['ssc']['result'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>HSC/Alim</td>
                                            <td><?php echo $r['hsc']['group'] ?></td>
                                            <td><?php echo $r['hsc']['session'] ?></td>
                                            <td><?php echo $r['hsc']['passed'] ?></td>
                                            <td><?php echo $r['hsc']['board'] ?></td>
                                            <td><?php echo $r['hsc']['result'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bachelor</td>
                                            <td><?php echo $r['bachelor']['group'] ?></td>
                                            <td><?php echo $r['bachelor']['session'] ?></td>
                                            <td><?php echo $r['bachelor']['passed'] ?></td>
                                            <td><?php echo $r['bachelor']['board'] ?></td>
                                            <td><?php echo $r['bachelor']['result'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Masters</td>
                                            <td><?php echo $r['masters']['group'] ?></td>
                                            <td><?php echo $r['masters']['session'] ?></td>
                                            <td><?php echo $r['masters']['passed'] ?></td>
                                            <td><?php echo $r['masters']['board'] ?></td>
                                            <td><?php echo $r['masters']['result'] ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><?php echo $row['experience'] ?></td>
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
