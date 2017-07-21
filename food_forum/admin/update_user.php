<?php include '../link_to_food_forum.php' ?>
<?php
	$ID=$_GET['id'];
	$query1 = "update  user set admin='1' where ID = '".$ID."';";
	mysqli_query($link, $query1);
	header("location:admin_overlook.php");
?>