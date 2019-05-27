
<?php
    $page_title = "Job Offers :";
    $job_offers = "active";
    require 'includes/header.php';

    // include 'includes/slider.php';

    $sql = "SELECT * FROM joboffer ORDER BY id DESC";
    $query = mysqli_query($db, $sql);
    $i = 1;

?>

<div class="contentsection">
    <div class="row mt-3">
        <div class="col-md-8 mb-4">
            <div class="maincontent fix">
                <h3 class="text-center text-uppercase text-success mt-4 mb-4">Job Offers</h3>
                <table class="table c-table">
                    <tr>
                      <th class="text-center">SL</th>
                      <th class="text-center">Job Offers</th>
                      <th class="text-center">Deadline</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td>
                            <h5><?php echo $row['title'] ?></h5>
                            <h6><?php echo $row['company'] ?></h6>
                            <p><?php echo $row['location'] ?></p>
                            <p><?php echo $row['requirement'] ?></p>
                            <p><?php echo $row['experience'] ?> experience</p>
                            <?php
                                $title = $row['title'];
                                $title = str_replace(" ","+",$title);
                            ?>
                            <?php if ($_SESSION['stu-log'] == 1): ?>
                            <a href="/apply?job=<?php echo $row['id'] ?>&company=<?php echo $row['username'] ?>&applicant=<?php echo $_SESSION['stu-username'] ?>&title=<?php echo $title ?>" class="btn btn-sm">Apply</a>
                            <?php endif; ?>
                      </td>
                      <td>
                          <div class="deadline">
                              <span>
                                  <i class="fa fa-calendar-o text-primary fa-2x"></i><br>
                                  <p class="text-danger"><?php echo $row['deadline'] ?></p>
                              </span>
                          </div>
                      </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <?php include 'notices.php'; ?>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
