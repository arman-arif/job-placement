
<?php
    $msg = $_GET['msg'];

    if ($msg == "logged-in") {
        $title = "Already Logged in";
        $text = "You are already Logged in!";
    } elseif ($msg == "not-logged-in") {
        // code...
    }

    $page_title = "Error - ".$title." :";
    require 'includes/header.php';

?>

<div class="contentsection mt-5 mb-5 pt-5 pb-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-danger">Error!</h1>
            <h3 class="text-center text-danger"><?php echo $text ?></h3>
        </div>
    </div>
</div>

<?php
    require 'includes/footer.php';
?>
