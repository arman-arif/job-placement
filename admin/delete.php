<?php
 	$id = $_GET['id'];
    $table = $_GET['table'];
 	require '../core/db.conf.php';

 	$sql = "DELETE FROM $table WHERE id='$id'";
 	$query = mysqli_query($db, $sql);
?>
<script>
// alert("Record has been deleted");
// window.location="index.php";
window.history.back();
</script>
