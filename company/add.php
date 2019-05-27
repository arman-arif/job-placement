<?php
	require '../core/db.conf.php';
	session_start();
	if ($_SESSION['com_log'] != 1) {
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


	if (isset($_POST['job'])) {
		$title = $_POST['title'];
		$company = $_POST['company'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];
		$requirement = $_POST['requirement'];
		$experience = $_POST['experience'];
		$deadline = $_POST['deadline'];
		$username = $_SESSION['com_username'];

		$sql = "INSERT INTO `joboffer` (`id`, `title`, `company`, `location`, `requirement`, `experience`, `phone`, `email`, `deadline`,`username`)
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
						<input type="hidden" value="<?php echo $_SESSION['com_name'] ?>" name="company" required>
						<input type="hidden" value="<?php echo $_SESSION['com_email'] ?>" name="email" required>
						<input type="hidden" value="<?php echo $_SESSION['com_phone'] ?>" name="phone" required>
						<input type="text" class="form-control mb-2" placeholder="Location" name="location" required>
						<input type="text" class="form-control mb-2" placeholder="Requirements" name="requirement" required>
						<input type="text" class="form-control mb-2" placeholder="Experience" name="experience" required>
						<input type="text" class="form-control mb-2" placeholder="Deadline" name="deadline" required>
						<input type="submit" class="form-control mb-2 btn btn-primary text-uppercase" name="job" value="submit">
						<a href="joboffer.php" class="btn btn-secondary text-uppercase form-control">Back</a>
					</form>
				<?php endif; ?>
			</div>
			<div class="col-4"></div>
		</div>
		</main>
		<?php include 'include/footer.php'; ?>
