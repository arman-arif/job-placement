<?php
 	$id = $_GET['id'];
 	require '../core/db.conf.php';

 	$name = "";
	$username = "";
	$email = "";
	$password = "";
	$messege = "";
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];

		$sql = "UPDATE `user` SET `name` = '$name', `username` = '$username', `email` = '$email' WHERE `user`.`id` = $id";
		$query = mysqli_query($con, $sql);
	if ($query) {
		$messege = "<div class='alert alert-success text-center'>User successfully updated</div>";
		}
	}
	$sql = "SELECT * FROM user WHERE id=$id";
 	$query = mysqli_query($con, $sql);
 	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit User Profile</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4">
				<h2 class="pt-5 text-center mt-5">EDIT PROFILE</h2>
				<?php echo $messege ?>
				<form action="update.php?id=4" method="post" class="form">
					<input type="text" class="form-control mb-2" placeholder="Name" name="name" value="<?php echo $row['name']; ?>">
					<input type="text" class="form-control mb-2" placeholder="Username" name="username" value="<?php echo $row['username']; ?>">
					<input type="email" class="form-control mb-2" placeholder="Email" name="email" value="<?php echo $row['email']; ?>">
					<!-- <input type="password" class="form-control mb-2" placeholder="Password" name="password"> -->
					<input type="submit" class="form-control mb-2 btn btn-primary text-uppercase" name="update" value="update">
					<a href="index.php" class="btn btn-secondary text-uppercase form-control">home</a>
				</form>
			</div>
			<div class="col-4"></div>
		</div>
	</div>
</body>
</html>
