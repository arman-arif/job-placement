<?php

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    $routes = [
        '' => 'pages/index.php',
        'about'          => 'pages/about.php',
        'contact'        => 'pages/contact.php',
        'post'           => 'pages/post.php',
        'job-offers'     => 'pages/job-offers.php',
        'apply'          => 'pages/apply.php',
        'company-list'   => 'pages/company-list.php',
        'diploma-list'   => 'pages/diploma-list.php',
        'general-list'   => 'pages/general-list.php',
        'student-cv'     => 'pages/student-cv.php',
        'student-cv-submit' => 'pages/student-cv-submit.php',
        'student-register'  => 'pages/student-register.php',
        'student-login'     => 'pages/student-login.php',
        'student-profile'   => 'pages/student-profile.php',
        'student-info'      => 'pages/student-info.php',
        'teacher-register'  => 'pages/teacher-register.php',
        'company-register'  => 'pages/company-register.php',
        'error'      => 'pages/error.php',
        'logout'     => 'logout.php',
        'test'     => 'test/index.php',
    ];

    if (array_key_exists($path, $routes)) {
        require $routes[$path];
    } else {
        require 'pages/page-not-found.php';
    }
