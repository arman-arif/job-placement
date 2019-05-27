
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `posts` WHERE `id`='$id'";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);

    $page_title = $row['title']." :";
    require 'includes/header.php';
?>

<div class="contentsection">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="maincontent pt-4 pb-4 fix">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="post clear">
                            <h2><a href="<?php echo($_SERVER['REQUEST_URI']); ?>" class=""><?php echo $row['title'] ?></a></h2>
                            <a href="images/<?php echo $row['images'] ?>"><img src="images/<?php echo $row['images'] ?>" class="pl-5 pr-5 pt-3 mb-3 img-fluid" alt="image" /></a><br>
                            <p>
                                <?php echo $row['content'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php'; ?>
