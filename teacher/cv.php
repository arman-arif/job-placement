<?php
 	$id = $_GET['id'];
 	require '../core/db.conf.php';
	$sql = "SELECT * FROM user WHERE id=$id";
 	$query = mysqli_query($con, $sql);
 	$row = mysqli_fetch_array($query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Profile</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2 class="text-center mt-5">PROFILE</h2><hr>
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4 text-center pt-5">
				<span>Your Name</span>
				<h3><?php echo $row['name'] ?></h3>
				<span>Username</span>
				<h4><?php echo $row['username'] ?></h4>
				<span>Email</span>
				<h4><?php echo $row['email'] ?></h4>
			</div>
			<div class="col-4"></div>
		</div>
	</div>
</body>
</html>
