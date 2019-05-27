

<?php
    $page_title = "Company List :";
    require 'includes/header.php';

    // error_reporting(E_ALL);

    $sql = "SELECT * FROM collages WHERE board='bteb' ORDER BY location";
    $query = mysqli_query($db, $sql);
?>

<div class="contentsection">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="maincontent fix">
                <h3 class="text-center text-uppercase pt-3 pb-3">diploma company list</h3>
                <hr>

                <table class="table c-table">
                    <tr>
	                    <th>SL</th>
	                    <th>Collage Name</th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th>Email</th>
	                    <th>Link</th>
	                  </tr>
	                  <?php
	                  	$i = 1;
	                  	while ($row = mysqli_fetch_array($query)) {
	                  ?>
	                  <tr>
	                    <td><?php echo $i; ?></td>
	                    <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['location'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['email'] ?></td>
	                    <td><a href="<?php echo $row['url'] ?>" target="_blank">Visit</a></td>
	                  </tr>
	                  <?php
	              		$i++;
	              		}
	              	  ?>
                </table>

            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
