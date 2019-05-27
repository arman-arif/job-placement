<?php
	session_start();
	if ($_SESSION['com_log'] != 1) {
		header("location: login.php");
	}
	require '../core/db.conf.php';
	$pagetitle = "Job Offers";
	$job = "active";
	$company = $_SESSION['com_name'];
	require 'include/header.php';
	$i = 1;
	$sql = "SELECT * FROM joboffer WHERE company='$company' ORDER BY id DESC";
	$query = mysqli_query($db, $sql);
?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		  <h1 class="h2">Job Offers</h1>
		  <div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
			  <a class="btn btn-sm btn-outline-secondary" href="add.php?data=Job+Offer">Add Offer</a>
			</div>
		  </div>
		</div>

		<div class="table-responsive">
			<table class="table table-striped table-sm">
				<thead>
					<tr class="text-center">
						<th>SL</th>
						<th>Job Title</th>
						<th>Company</th>
						<th>Location</th>
						<th>Requirement</th>
						<th>Experience</th>
						<th>Deadline</th>
						<th>Contact No</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php while ($row = mysqli_fetch_array($query)) { ?>
				<tr>
					<td class="text-center"><?php echo $i++ ?></td>
					<td><?php echo $row['title'] ?></td>
                    <td class="text-center"><?php echo $row['company'] ?></td>
					<td class="text-center"><?php echo $row['location'] ?></td>
					<td class="text-center"><?php echo $row['requirement'] ?></td>
					<td class="text-center"><?php echo $row['experience'] ?></td>
					<td class="text-center"><?php echo $row['deadline'] ?></td>
					<td class="text-center"><?php echo $row['phone'] ?></td>
					<td class="text-center"><?php echo $row['email'] ?></td>
					<td class="text-center">
						<a class="text text-primary" href="update.php?id=<?php echo $row['id'] ?>">Edit</a> |
						<a class="text text-danger" href="delete.php?id=<?php echo $row['id'] ?>&table=joboffer">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</main>
<?php include 'include/footer.php'; ?>
