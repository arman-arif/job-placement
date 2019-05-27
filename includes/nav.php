<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase mx-auto">
    <button class="navbar-toggler text-center" data-toggle="collapse" data-target="#navbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-dark" id="navbar">
        <ul class="navbar-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link <?php echo $home ?>" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $job_offers ?>" href="/job-offers">Job Offers</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">Student</a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <li class="dropdown-item">
                        <a href="/student-cv-submit">Student CV Submit</a>
                    </li>
                    <li class="dropdown-item">
                        <?php if ($_SESSION['stu-log'] == 1): ?>
                        <a href="/student-profile">Student Profile</a>
                        <?php else: ?>
                        <a href="/student-login">Student Login</a>
                        <?php endif; ?>
                    </li>
                    <?php if ($_SESSION['stu-log'] == 1): ?>
                    <li class="dropdown-item">
                        <a href="/student-cv">Student CV</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">Company</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="dropdown-item">
                        <a href="/company-list">Company list</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="/company/" target="_blank">Company Login</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">Collage List</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="dropdown-item">
                        <a href="/diploma-list">Diploma Side</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="/general-list">General Side</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $contact ?>" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $about ?>" href="/about">About</a>
            </li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Login/Register</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="dropdown-item">
                        <a href="/admin/" target="_blank">Admin</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="/teacher/">Teacher</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="/student-register">Register</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

    <?php if ($_SESSION['stu-log'] == 1): ?>
        <a href="/student-profile" class="nav-link user-tile float-right">
            <i class="fa fa-user-o"></i> <?php echo $_SESSION['stu-username'] ?>
        </a>
        <a href="/logout" class="nav-link logout float-right">
            <i class="fa fa-power-off"></i>
        </a>
    <?php endif; ?>

</nav>
