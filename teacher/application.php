<?php
	session_start();
	if ($_SESSION['admin_log'] != 1) {
		header("location: login.php");
	}
	require '../core/db.conf.php';
	$pagetitle = "Application";
	$app = "active";
	require 'include/header.php';
	$i = 1;
	$sql = "SELECT * FROM applications ORDER BY id DESC";
	$query = mysqli_query($db, $sql);
?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		  <h1 class="h2">Student Application</h1>
		  <div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
			  <!-- <a class="btn btn-sm btn-outline-secondary" href="add.php?data=Job+Offer">Add Offer</a> -->
			</div>
		  </div>
		</div>

		<div class="table-responsive">
			<table class="table table-striped table-sm">
				<thead>
					<tr class="text-center">
						<th>SL</th>
						<th>Job Title</th>
						<th>Offer ID</th>
						<th>Company Username</th>
						<th>Student Username</th>
						<th>Application Date</th>
						<th>Recommandation</th>
						<th>Approval</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php while ($row = mysqli_fetch_array($query)) { ?>
				<tr>
					<td class="text-center"><?php echo $i++ ?></td>
					<td><?php echo $row['job_title'] ?></td>
                    <td class="text-center"><?php echo $row['offer_id'] ?></td>
					<td class="text-center"><?php echo $row['company_username'] ?></td>
					<td class="text-center"><?php echo $row['student_username'] ?></td>
					<td class="text-center"><?php echo $row['date'] ?></td>
					<td class="text-center"><?php echo $row['teacher_username'] ?></td>
					<td class="text-center"><?php echo $row['approval'] ?></td>
					<td class="text-center">
						<a class="text text-danger" href="delete.php?id=<?php echo $row['id'] ?>&table=application">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</main>
<?php include 'include/footer.php'; ?>
