<?php

    $stu_login_err = "";
    $stu_user_err = "";
    $stu_pass_err = "";
    $stu_err = "";
    $password = "";
    $confirm_password = "";
    $cv_query = "";


     if (isset($_POST['tec-reg'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $district = $_POST['district'];
            $department = $_POST['department'];
            $session = $_POST['title'];



            $sql = "INSERT INTO `teachers`
                        (`name`, `username`, `district`, `department`, `title`, `phone`, `email`, `password`)
            VALUES ('$name', '$username', '$district', '$department', '$title', '$phone', '$email', '$password')";

            if ($password == $confirm_password) {
                $query = mysqli_query($db, $sql);

                if ($query) {
                    $_SESSION['tec-log'] = 1;
                    $_SESSION['tec-msg'] = 0;
                    $_SESSION['tec-name'] = $name;
                    $_SESSION['tec-username'] = $username;
                    $_SESSION['tec-email'] = $email;
                    $_SESSION['tec-phone'] = $phone;
                    $_SESSION['tec-district'] = $district;
                    $_SESSION['tec-department'] = $department;
                    $_SESSION['tec-title'] = $title;
                    header("Location: /teacher/");
                }
            } else {
                $stu_err = "Password are not matched";
            }
        }





    if (isset($_POST['stu-cv'])) {
        $username = $_SESSION['stu-username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $fathers_name = $_POST['fathers_name'];
        $mothers_name = $_POST['mothers_name'];
        $gender = $_POST['gender'];
        $present_address = array(
            $_POST['house_road_vill'],
            $_POST['post_office'],
            $_POST['post_code'],
            $_POST['upazilla'],
            $_POST['present_district']
        );
        // $village = $_POST['village'];

        $permanent_address = array(
            $_POST['p_house_road_vill'],
            $_POST['p_post_office'],
            $_POST['p_post_code'],
            $_POST['p_upazilla'],
            $_POST['permanent_district']
        );
        $religion = $_POST['religion'];
        $marital_status = $_POST['marital_status'];
        $nationality = $_POST['nationality'];
        $mobile_number = $_POST['mobile_number'];
        $email = $_POST['email'];
        $results = array(
            'ssc' => [
                'group' => $_POST['ssc_group'],
                'session' => $_POST['ssc_session'],
                'passed' => $_POST['ssc_passed'],
                'board' => $_POST['ssc_board'],
                'result' => $_POST['ssc_result']
            ],
            'hsc' => [
                'group' => $_POST['hsc_group'],
                'session' => $_POST['hsc_session'],
                'passed' => $_POST['hsc_passed'],
                'board' => $_POST['hsc_board'],
                'result' => $_POST['hsc_result']
            ],
            'bachelor' => [
                'group' => $_POST['bachelor_group'],
                'session' => $_POST['bachelor_session'],
                'passed' => $_POST['bachelor_passed'],
                'board' => $_POST['bachelor_board'],
                'result' => $_POST['bachelor_result']
            ],
            'masters' => [
                'group' => $_POST['masters_group'],
                'session' => $_POST['masters_session'],
                'passed' => $_POST['masters_passed'],
                'board' => $_POST['masters_board'],
                'result' => $_POST['masters_result']
            ]
        );
        $present_address = json_encode($present_address);
        $permanent_address = json_encode($permanent_address);
        $results = json_encode($results);
        $experience = $_POST['experience'];
        $picture = $_POST['picture'];

        $same_as_present = $_POST['same_as_present'];
        if ($same_as_present == 1) {
            $permanent_address = $present_address;
        }

        $check_sql = "SELECT * FROM student_cv WHERE username='$username'";
        $check_query = mysqli_query($db, $check_sql);
        $check_rows = mysqli_num_rows($check_query);
        $row = mysqli_fetch_assoc($check_query);


        if ($check_rows == 0) {
            $date_of_birth = $_POST['day']." ".$_POST['month']." ".$_POST['year'];
            $cv_sql = "INSERT INTO `student_cv` (`username`, `first_name`, `last_name`, `fathers_name`, `mothers_name`, `date_of_birth`, `gender`, `present_address`, `permanent_address`, `religion`, `marital_status`, `nationality`, `mobile_number`, `email`, `results`, `experience`, `picture`)
                VALUES ('$username', '$first_name', '$last_name', '$fathers_name', '$mothers_name', '$date_of_birth', '$gender', '$present_address', '$permanent_address', '$religion', '$marital_status', '$nationality', '$mobile_number', '$email', '$results', '$experience', '');";
            $cv_query = mysqli_query($db, $cv_sql);
        } else {

            if (!empty($row['date_of_birth'])) {
                $date_of_birth = $_POST['date_of_birth'];
            } else {
                $date_of_birth = $_POST['day']." ".$_POST['month']." ".$_POST['year'];
            }
            $cv_sql = "UPDATE `student_cv` SET
                                    `id` = '1',
                        `username` = '$username',
                        `first_name` = '$first_name',
                        `last_name` = '$last_name',
                        `fathers_name` = '$fathers_name',
                        `mothers_name` = '$mothers_name',
                        `date_of_birth` = '$date_of_birth',
                        `gender` = '$gender',
                        `present_address` = '$present_address',
                        `permanent_address` = '$permanent_address',
                        `religion` = '$religion',
                        `marital_status` = '$marital_status',
                        `nationality` = '$nationality',
                        `mobile_number` = '$mobile_number',
                        `email` = '$email',
                        `results` = '$results',
                        `experience` = '$experience',
                        `picture` = ''
                        WHERE `username` = '$username';";
            $cv_query = mysqli_query($db, $cv_sql);
        }
        if ($cv_query) {
            $cv_msg = "CV Submitted Successfully";
        }

    }


        if (isset($_POST['stu-login'])) {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $stu_user = $_POST['username'];
                $stu_sql = "SELECT * FROM students WHERE username='$stu_user'";
                $stu_query = mysqli_query($db, $stu_sql);
                $stu_row = mysqli_fetch_assoc($stu_query);
                if ($_POST['password'] == $stu_row['password']) {
                    $_SESSION['stu-log'] = 1;
                    $_SESSION['stu-msg'] = 0;
                    $_SESSION['stu-name'] = $stu_row['name'];
                    $_SESSION['stu-username'] = $stu_row['username'];
                    $_SESSION['stu-email'] = $stu_row['email'];
                    $_SESSION['stu-phone'] = $stu_row['phone'];
                    $_SESSION['stu-district'] = $stu_row['district'];
                    $_SESSION['stu-department'] = $stu_row['department'];
                    $_SESSION['stu-session'] = $stu_row['session'];
                    $_SESSION['stu-passed'] = $stu_row['passed'];
                    header('Location: /student-profile');
                    die("You are logged in ".$stu_row['name']);
                } else {
                    $stu_login_err = '<p class="alert alert-danger text-center">Wrong password and username!</p>';
                }
            } else {
                if (empty($_POST['username'])) {
                    $stu_user_err = '<p>Username is required!</p>';
                }
                if (empty($_POST['password'])) {
                    $stu_pass_err = '<p>Password is required!</p>';
                }
            }
        }

        if (isset($_POST['stu-reg'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $district = $_POST['district'];
            $department = $_POST['department'];
            $session = $_POST['session'];
            $passing_year = $_POST['passing_year'];

            $sql = "INSERT INTO `students`
                        (`id`, `name`, `username`, `email`, `phone`, `district`, `department`, `session`, `passed`, `password`)
                VALUES (NULL, '$name', '$username', '$email', '$phone', '$district', '$department', '$session', '$passing_year', '$password')";

            if ($password == $confirm_password) {
                $query = mysqli_query($db, $sql);

                if ($query) {
                    $_SESSION['stu-log'] = 1;
                    $_SESSION['stu-msg'] = 0;
                    $_SESSION['stu-name'] = $name;
                    $_SESSION['stu-username'] = $username;
                    $_SESSION['stu-email'] = $email;
                    $_SESSION['stu-phone'] = $phone;
                    $_SESSION['stu-district'] = $district;
                    $_SESSION['stu-department'] = $department;
                    $_SESSION['stu-session'] = $session;
                    $_SESSION['stu-passed'] = $passing_year;
                    header("Location: /student-profile");
                }
            } else {
                $stu_err = "Password are not matched";
            }
        }

    function submit_cv() {

    }

    function Test() {
        echo "This is a test function";
        $tt = "arman";
    }
