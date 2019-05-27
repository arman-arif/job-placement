
<?php
    $sql = "SELECT * FROM `posts` WHERE `position`='home' AND `visibility`='1'";
    $query = mysqli_query($db, $sql);
?>

<div class="maincontent fix">
    <?php
        while($row = mysqli_fetch_array($query)) {
            $str = str_replace(" ","-",$row['title']);
            $str = strtolower($str);
    ?>
    <div class="post clear">
        <h2 class="post-title">
            <a href="/post?id=<?php echo $row['id'] ?>&title=<?php echo $str; ?>">
                <?php echo $row['title'] ?>
            </a>
        </h2>
        <a href="/post?id=<?php echo $row['id'] ?>&title=<?php echo $str; ?>">
            <img src="images/<?php echo $row['images'] ?>" class="img" alt="image" />
        </a>
        <p>
            <?php echo $row['content'] ?>
        </p>
        <div class="readmore clear">
            <a href="/post?id=<?php echo $row['id'] ?>&title=<?php echo $str; ?>" class="btn btn-outline-secondary btn-sm float-right"> Read More </a>
        </div>
    </div>
    <?php } ?>
</div>
