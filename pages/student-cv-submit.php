
<?php

    if ($_SESSION['stu-log'] != 1) {
        $_SESSION['stu-msg'] = 1;
        header("Location: /student-login");
    }

    $page_title = "Student CV Submition :";
    require 'includes/header.php';
    $dd = $mm = $yyyy = "";

    // print_r ($present_address);
    // echo $username;
    $stu_username = $_SESSION['stu-username'];
    $check_sql = "SELECT * FROM student_cv WHERE  username='$stu_username'";
    $check_query = mysqli_query($db, $check_sql);
    $check_rows = mysqli_num_rows($check_query);
    $row = mysqli_fetch_assoc($check_query);

?>

<div class="contentsection">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="maincontent fix">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h2 class="text-center text-uppercase">Submit your cv</h2>
                        <hr class="mb-4">
                        <?php if ($cv_query): ?>
                            <div class="alert alert-success text-center">
                                <?php echo $cv_msg ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" class="form">
                            <div class="picture">
                                <input type="hidden" name="picture" value="">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">First Name</div>
                                    </div>
                                    <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" class="form-control" placeholder="First name">
                                </div>
                                <div class="col-md input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Last Name</div>
                                    </div>
                                    <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" class="form-control" placeholder="Last name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Father's Name</div>
                                    </div>
                                    <input type="text" name="fathers_name" value="<?php echo $row['fathers_name'] ?>" class="form-control" placeholder="Father's name">
                                </div>
                                <div class="col-md input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Mother's Name</div>
                                    </div>
                                    <input type="text" name="mothers_name" value="<?php echo $row['mothers_name'] ?>" class="form-control" placeholder="Mother's name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 input-group dob" id="dob">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Date of birth</div>
                                    </div>
                                    <?php if(!empty($row['date_of_birth'])){ ?>
                                        <input type="text" name="date_of_birth" value="<?php echo $row['date_of_birth'] ?>" class="form-control">
                                    <?php } else { ?>
                                    <select class="form-control day" name="day">
                                        <?php
                                            for ($dd=1; $dd <= 31; $dd++) {
                                                echo "<option";
                                                if ($dd == date('d')+1) {
                                                    echo " selected";
                                                }
                                                echo ">".$dd."</option>";
                                            }
                                        ?>
                                    </select>
                                    <select class="form-control month" name="month">
                                        <?php
                                            for ($mm=1; $mm <= 12; $mm++) {
                                                $month = date('M', mktime(0, 0, 0, $mm, 1, date('Y')));
                                                echo "<option";
                                                if ($mm == date('m')) {
                                                    echo " selected";
                                                }
                                                echo ">".$month."</option>";
                                            }
                                        ?>
                                    </select>
                                    <select class="form-control year" name="year">
                                        <?php for ($yyyy=date('Y'); $yyyy >= 1901; $yyyy--) {
                                            echo "<option>$yyyy</option>";
                                        } ?>
                                    </select>
                                <?php } ?>
                                </div>
                                <div class="col-md input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Gender</div>
                                    </div>

                                    <select class="form-control" name="gender" value="">
                                        <?php if ($row['gender'] == "Male") { ?>
                                        <option>Choose Gender</option>
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                        <?php } elseif($row['gender'] == "Female") { ?>
                                        <option>Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female" selected>Female</option>
                                        <?php } else { ?>
                                        <option selected>Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <fieldset class="">
                                        <legend>Present Address</legend>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Address</div>
                                            </div>
                                            <?php
                                                $pre_ad = json_decode($row['present_address'], true);
                                                $per_ad = json_decode($row['permanent_address'], true);
                                            ?>
                                            <input type="text" name="house_road_vill" value="<?php echo $pre_ad[0] ?>" class="form-control" placeholder="House/Road/Village">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">P.O</div>
                                            </div>
                                            <input type="text" name="post_office" value="<?php echo $pre_ad[1] ?>" class="form-control" placeholder="Post Office">
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Post Code</div>
                                            </div>
                                            <input type="text" name="post_code" value="<?php echo $pre_ad[2] ?>" class="form-control" placeholder="Post Code">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Upazilla</div>
                                            </div>
                                            <input type="text" name="upazilla" value="<?php echo $pre_ad[3] ?>" class="form-control" placeholder="Upazilla">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">District</div>
                                            </div>

                                            <?php if (empty($pre_ad[4])): ?>
                                            <select class="form-control" name="present_district">
                                                <option selected>Select District</option>
                                                <option>Brahmanbaria</option><option>Bagerhat</option><option>Bandarban</option><option>Barishal</option><option>Bhola</option><option>Bogura</option><option>Barguna</option><option>Chandpur</option><option>Chapainawabganj</option><option>Chattogram</option><option>Chuadanga</option><option>Cumilla</option><option>Cox's Bazar</option><option>Dhaka</option><option>Dinajpur</option><option>Faridpur</option><option>Feni</option><option>Gaibandha</option><option>Gazipur</option><option>Gopalganj</option><option>Habiganj</option><option>Jamalpur</option><option>Jashore</option><option>Jhalokathi</option><option>Jhenaidah</option><option>Joypurhat</option><option>Khagrachari</option><option>Khulna</option><option>kishoreganj</option><option>Kurigram</option><option>Kushtia</option><option>Lalmonirhat</option><option>Laxmipur</option><option>Madaripur</option><option>Magura</option><option>Manikganj</option><option>Meherpur</option><option>MoulaviBazar</option><option>Munshiganj</option><option>Mymensingh</option><option>Naogaon</option><option>Narail</option><option>Narayanganj</option><option>Narsingdi</option><option>Natore</option><option>Netrokona</option><option>Nilphamari</option><option>Noakhali</option><option>Pabna</option><option>Panchagarh</option><option>Patuakhali</option><option>Pirojpur</option><option>Rajbari</option><option>Rajshahi</option><option>Rangamati</option><option>Rangpur</option><option>Satkhira</option><option>Shariatpur</option><option>Sherpur</option><option>Sirajganj</option><option>Sunamganj</option><option>Sylhet</option><option>Tangail</option><option>Thakurgaon</option>
                                            </select>
                                            <?php else: ?>
                                                <input type="text" name="present_district" value="<?php echo $pre_ad[4] ?>" placeholder="District" class="form-control form-control-sm">
                                            <?php endif; ?>


                                        </div>

                                    </fieldset>

                                </div>
                                <div class="col-md input-group">
                                    <fieldset class="">
                                        <legend>
                                            Permanent Address
                                            <span class="float-right">
                                                <small><sup><input type="checkbox" name="same_as_present" value="1"> <i>Same as present</i></sup></small>
                                            </span>
                                        </legend>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Address</div>
                                            </div>
                                            <input type="text" name="p_house_road_vill" value="<?php echo $per_ad[0] ?>" class="form-control" placeholder="House/Road/Village">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">P.O</div>
                                            </div>
                                            <input type="text" name="p_post_office" value="<?php echo $per_ad[1] ?>" class="form-control" placeholder="Post Office">
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Post Code</div>
                                            </div>
                                            <input type="text" name="p_post_code" value="<?php echo $per_ad[2] ?>" class="form-control" placeholder="Post Code">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Upazilla</div>
                                            </div>
                                            <input type="text" name="p_upazilla" class="form-control" value="<?php echo $per_ad[3] ?>" placeholder="Upazilla">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">District</div>
                                            </div>
                                            <?php if (empty($per_ad[4])): ?>
                                            <select class="form-control" name="permanent_district">
                                                <option selected>Select District</option>
                                                <option>Brahmanbaria</option><option>Bagerhat</option><option>Bandarban</option><option>Barishal</option><option>Bhola</option><option>Bogura</option><option>Barguna</option><option>Chandpur</option><option>Chapainawabganj</option><option>Chattogram</option><option>Chuadanga</option><option>Cumilla</option><option>Cox's Bazar</option><option>Dhaka</option><option>Dinajpur</option><option>Faridpur</option><option>Feni</option><option>Gaibandha</option><option>Gazipur</option><option>Gopalganj</option><option>Habiganj</option><option>Jamalpur</option><option>Jashore</option><option>Jhalokathi</option><option>Jhenaidah</option><option>Joypurhat</option><option>Khagrachari</option><option>Khulna</option><option>kishoreganj</option><option>Kurigram</option><option>Kushtia</option><option>Lalmonirhat</option><option>Laxmipur</option><option>Madaripur</option><option>Magura</option><option>Manikganj</option><option>Meherpur</option><option>MoulaviBazar</option><option>Munshiganj</option><option>Mymensingh</option><option>Naogaon</option><option>Narail</option><option>Narayanganj</option><option>Narsingdi</option><option>Natore</option><option>Netrokona</option><option>Nilphamari</option><option>Noakhali</option><option>Pabna</option><option>Panchagarh</option><option>Patuakhali</option><option>Pirojpur</option><option>Rajbari</option><option>Rajshahi</option><option>Rangamati</option><option>Rangpur</option><option>Satkhira</option><option>Shariatpur</option><option>Sherpur</option><option>Sirajganj</option><option>Sunamganj</option><option>Sylhet</option><option>Tangail</option><option>Thakurgaon</option>
                                            </select>
                                            <?php else: ?>
                                                <input type="text" name="permanent_district" value="<?php echo $per_ad[4] ?>" placeholder="District" class="form-control form-control-sm">
                                            <?php endif; ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-6 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Religion</div>
                                    </div>
                                    <input type="text" name="religion" value="<?php echo $row['religion'] ?>" class="form-control" placeholder="Religion Status">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Marital Status</div>
                                    </div>
                                    <select class="form-control" name="marital_status">
                                        <option>Single</option>
                                        <option>Unmarried</option>
                                        <option>Married</option>
                                    </select>
                                </div>
                                <div class="col-md input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nationality</div>
                                    </div>
                                    <input type="text" name="nationality" value="<?php echo $row['nationality'] ?>" class="form-control" placeholder="Nationality">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Mobile Number</div>
                                    </div>
                                    <input type="text" name="mobile_number" value="<?php echo $row['mobile_number'] ?>" class="form-control" placeholder="Mobile Number">
                                </div>
                                <div class="col-md input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Email</div>
                                    </div>
                                    <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col table-responsive">
                                <h4 class="text-center text-uppercase">Educational Qualifications</h4>
                                <?php
                                    $r = json_decode($row['results'], 1);
                                ?>
                                <table class="table text-center">
                                    <tr>
                                        <th>Degree Name</th>
                                        <th>Group/Department</th>
                                        <th>Session</th>
                                        <th>Passing Year</th>
                                        <th>Board/University</th>
                                        <th>Result</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group-text form-control-sm">SSC/Dakhil</div>
                                        </td>
                                        <td>
                                            <?php if (empty($r['ssc']['group'])): ?>
                                            <select class="form-control form-control-sm" name="ssc_group">
                                                <option selected>Select Group</option>
                                                <option>Science</option>
                                                <option>Humanities</option>
                                                <option>Business Studis</option>
                                            </select>
                                            <?php else: ?>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['ssc']['group']; ?>" name="ssc_group">
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['ssc']['session']; ?>" name="ssc_session">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['ssc']['passed']; ?>" name="ssc_passed">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['ssc']['board']; ?>" name="ssc_board">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['ssc']['result']; ?>" name="ssc_result">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group-text  form-control-sm">HSC/Alim</div>
                                        </td>
                                        <td>
                                            <?php if (empty($r['hsc']['group'])): ?>
                                            <select class="form-control form-control-sm" name="hsc_group">
                                                <option selected>Select Group</option>
                                                <option>Science</option>
                                                <option>Humanities</option>
                                                <option>Business Studis</option>
                                            </select>
                                            <?php else: ?>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['hsc']['group']; ?>" name="hsc_group">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['hsc']['session']; ?>" name="hsc_session">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['hsc']['passed']; ?>" name="hsc_passed">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['hsc']['board']; ?>" name="hsc_board">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['hsc']['result']; ?>" name="hsc_result">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group-text form-control-sm">Bachelor</div>
                                        </td>
                                        <td>
                                            <?php if (empty($r['bachelor']['group'])): ?>
                                                <select class="form-control form-control-sm" name="bachelor_group">
                                                    <option selected>Select Group</option>
                                                    <option>Engineering</option>
                                                    <option>Medical</option>
                                                    <option>Science</option>
                                                    <option>Humanities</option>
                                                    <option>Business Studis</option>
                                                </select>
                                            <?php else: ?>
                                                <input type="text" class="form-control form-control-sm" value="<?php echo $r['bachelor']['group']; ?>" name="bachelor_group">
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['bachelor']['session']; ?>" name="bachelor_session">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['bachelor']['passed']; ?>" name="bachelor_passed">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['bachelor']['board']; ?>" name="bachelor_board">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['bachelor']['result']; ?>" name="bachelor_result">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group-text form-control-sm">Masters</div>
                                        </td>
                                        <td>
                                            <?php if (empty($r['masters']['group'])): ?>
                                                <select class="form-control form-control-sm" name="masters_group">
                                                    <option selected>Select Group</option>
                                                    <option>Engineering</option>
                                                    <option>Medical</option>
                                                    <option>Science</option>
                                                    <option>Humanities</option>
                                                    <option>Business Studis</option>
                                                </select>
                                            <?php else: ?>
                                                <input type="text" class="form-control form-control-sm" value="<?php echo $r['masters']['group']; ?>" name="masters_group">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['masters']['session']; ?>" name="masters_session">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['masters']['passed']; ?>" name="masters_passed">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['masters']['board']; ?>" name="masters_board">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" value="<?php echo $r['masters']['result']; ?>" name="masters_result">
                                        </td>
                                    </tr>
                                </table>

                                </div>
                            </div>
                            <div class="row mb-3 mt-2">
                                <div class="col input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Experiences</div>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row['experience'] ?>" name="experience">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col text-center">
                                    <input type="submit" name="stu-cv" value="submit cv" class="text-uppercase btn btn-warning btn-lg" style="width: 20em">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
