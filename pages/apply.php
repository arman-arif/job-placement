
<?php
    $page_title = "Application! :";
    require 'includes/header.php';

    $offer_id=$_GET['job'];
    $com_user=$_GET['company'];
    $applicant=$_GET['applicant'];
    $date = date('d M Y');
    $title = $_GET['title'];


    if (!empty($applicant)) {
    	$app_sql = "INSERT INTO `applications` (`student_username`, `company_username`, `offer_id`, `job_title`, `date`)
    									VALUES ('$applicant', '$com_user', '$offer_id', '$title', '$date')";
    	$app_query = mysqli_query($db, $app_sql);
    }

?>

<div class="contentsection mt-5 mb-5 pt-5 pb-5">
    <div class="row">
        <div class="col-md-12">
            <?php if ($app_query): ?>
                <h1 class="text-center text-success">Success!</h1>
                <h3 class="text-center text-success">Your appication is delivered.</h3>
            <?php else: ?>
                <h1 class="text-center text-danger">Failed!</h1>
                <h3 class="text-center text-warning">Your appication is not delivered.</h3>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
