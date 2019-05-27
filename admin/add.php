<?php
	require '../core/db.conf.php';
	session_start();
	if ($_SESSION['admin_log'] != 1) {
		header("location: login.php");
	}
	$pagetitle = "Add Record";
	require 'include/header.php';

	$name 		= "";
	$username 	= "";
	$email 		= "";
	$phone 		= "";
	$district 	= "";
	$department = "";
	$session 	= "";
	$passed 	= "";
	$password 	= "";
	$type 		= "";
	$title 		= "";
	$location 	= "";
	$messege 	= "";

	if (isset($_POST['student'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$district = $_POST['district'];
		$department = $_POST['department'];
		$session = $_POST['session'];
		$passed = $_POST['passed'];
		$password = $_POST['password'];

		$sql = "INSERT INTO `students` (`id`, `name`, `username`, `email`, `phone`, `district`, `department`, `session`, `passed`, `password`)
				VALUES (NULL, '$name', '$username', '$email', '$phone', '$district', '$department', '$session', '$passed', '$password')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			$messege = "<div class='alert alert-success text-center'>Student added successfully</div>";
		}
	}
	if (isset($_POST['company'])) {
		$name = $_POST['name'];
		$type = $_POST['type'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];
		$password = $_POST['password'];

		$sql = "INSERT INTO `companies` (`id`, `name`, `type`, `location`, `phone`, `email`, `username`, `password`)
		VALUES (NULL, '$name', '$type', '$location', '$phone', '$email', '$username', '$password')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			$messege = "<div class='alert alert-success text-center'>Company added successfully</div>";
		}
	}
	if (isset($_POST['collage'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];
		$board = $_POST['board'];

		$sql = "INSERT INTO `collages` (`id`,`name`,`location`,`phone`,`email`,`url`,`board`)
							  VALUES (NULL,'$name','$location','$phone','$email','$url','$board')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			$messege = "<div class='alert alert-success text-center'>Collage added successfully</div>";
		}
	}
	if (isset($_POST['teacher'])) {
		$name = $_POST['name'];
		$title = $_POST['title'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$district = $_POST['district'];
		$department = $_POST['department'];
		$password = $_POST['password'];

		$sql = "INSERT INTO `teachers` (`id`, `name`, `username`, `district`, `department`, `title`, `phone`, `email`, `password`)
				VALUES (NULL, '$name', '$username', '$district', '$department', '$title', '$phone', '$email', '$password')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			$messege = "<div class='alert alert-success text-center'>Teacher added successfully</div>";
		}
	}
	if (isset($_POST['job'])) {
		$title = $_POST['title'];
		$company = $_POST['company'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];
		$requirement = $_POST['requirement'];
		$experience = $_POST['experience'];
		$deadline = $_POST['deadline'];
		$username = $_POST['username'];

		$sql = "INSERT INTO `joboffer` (`id`, `title`, `company`, `location`, `requirement`, `experience`, `phone`, `email`, `deadline`, `username`)
				VALUES (NULL, '$title', '$company', '$location', '$requirement', '$experience', '$phone', '$email', '$deadline', '$username')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			$messege = "<div class='alert alert-success text-center'>Offer added successfully</div>";
		}
	}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	  <h1 class="h2">Add Record</h1>
	</div>
		<h2 class="text-center"><?php echo $_GET['data'] ?></h2><hr>
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
				<?php echo $messege ?>
				<?php if ($_GET['data'] == "Job Offer"): ?>
					<form action="" method="post" class="form">
						<input type="text" class="form-control mb-2" placeholder="Job Title" name="title" required>
						<input type="text" class="form-control mb-2" placeholder="Company" name="company" required>
						<input type="text" class="form-control mb-2" placeholder="Company Username" name="username" required>
						<input type="email" class="form-control mb-2" placeholder="Email" name="email" required>
						<input type="text" class="form-control mb-2" placeholder="Contact No" name="phone" required>
						<input type="text" class="form-control mb-2" placeholder="Location" name="location" required>
						<input type="text" class="form-control mb-2" placeholder="Requirements" name="requirement" required>
						<input type="text" class="form-control mb-2" placeholder="Experience" name="experience" required>
						<input type="text" class="form-control mb-2" placeholder="Deadline" name="deadline" required>
						<input type="submit" class="form-control mb-2 btn btn-primary text-uppercase" name="job" value="submit">
						<a href="joboffer.php" class="btn btn-secondary text-uppercase form-control">Back</a>
					</form>
				<?php endif; ?>
				<?php if ($_GET['data'] == "Student"): ?>
					<form action="" method="post" class="form">
						<input type="text" class="form-control mb-2" placeholder="Name" name="name" required>
						<input type="text" class="form-control mb-2" placeholder="Username" name="username" required>
						<input type="email" class="form-control mb-2" placeholder="Email" name="email" required>
						<input type="text" class="form-control mb-2" placeholder="Phone" name="phone" required>
						<input type="text" class="form-control mb-2" placeholder="District" name="district" required>
						<input type="text" class="form-control mb-2" placeholder="Department" name="department" required>
						<input type="text" class="form-control mb-2" placeholder="Session" name="session" required>
						<input type="text" class="form-control mb-2" placeholder="Passing Year" name="passed" required>
						<input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
						<input type="submit" class="form-control mb-2 btn btn-primary text-uppercase" name="student" value="submit">
						<a href="students.php" class="btn btn-secondary text-uppercase form-control">Back</a>
					</form>
				<?php endif; ?>
				<?php if ($_GET['data'] == "Company"): ?>
					<form action="" method="post" class="form">
						<input type="text" class="form-control mb-2" placeholder="Company Name" name="name" required>
						<input type="text" class="form-control mb-2" placeholder="Company Type" name="type" required>
						<input type="text" class="form-control mb-2" placeholder="Username" name="username" required>
						<input type="email" class="form-control mb-2" placeholder="Email" name="email" required>
						<input type="text" class="form-control mb-2" placeholder="Contact No" name="phone" required>
						<input type="text" class="form-control mb-2" placeholder="Location" name="location" required>
						<input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
						<input type="submit" class="form-control mb-2 btn btn-primary text-uppercase" name="company" value="submit">
						<a href="companies.php" class="btn btn-secondary text-uppercase form-control">Back</a>
					</form>
				<?php endif; ?>
				<?php if ($_GET['data'] == "Collage"): ?>
					<form action="" method="post" class="form">
						<input type="text" class="form-control mb-2" placeholder="Collage Name" name="name" required>
						<input type="email" class="form-control mb-2" placeholder="Email" name="email" required>
						<input type="text" class="form-control mb-2" placeholder="Contact No" name="phone" required>
						<input type="text" class="form-control mb-2" placeholder="Location" name="location" required>
						<input type="text" class="form-control mb-2" placeholder="Website" name="url" required>
						<select class="form-control mb-2" name="board" required>
							<option value="" selected>Diploma/Genaral</option>
							<option value="bteb">Diploma</option>
							<option value="genaral">General</option>
						</select>
						<input type="submit" class="form-control mb-2 btn btn-primary text-uppercase" name="collage" value="submit">
						<a href="collages.php" class="btn btn-secondary text-uppercase form-control">Back</a>
					</form>
				<?php endif; ?>
				<?php if ($_GET['data'] == "Teacher"): ?>
					<form action="" method="post" class="form">
						<input type="text" class="form-control mb-2" placeholder="Teacher Name" name="name" required>
						<input type="text" class="form-control mb-2" placeholder="Username" name="username" required>
						<input type="email" class="form-control mb-2" placeholder="Email" name="email" required>
						<input type="text" class="form-control mb-2" placeholder="Contact No" name="phone" required>
						<input type="text" class="form-control mb-2" placeholder="Department" name="department" required>
						<input type="text" class="form-control mb-2" placeholder="Title" name="title" required>
						<input type="text" class="form-control mb-2" placeholder="District" name="district" required>
						<input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
						<input type="submit" class="form-control mb-2 btn btn-primary text-uppercase" name="teacher" value="submit">
						<a href="teachers.php" class="btn btn-secondary text-uppercase form-control">Back</a>
					</form>
				<?php endif; ?>
			</div>
			<div class="col-4"></div>
		</div>
		</main>
		<?php include 'include/footer.php'; ?>
