<?php include '../link_to_food_forum.php' ?>

<?php
 	$path = $_COOKIE['now_path'];
	$ID=$_GET['food_ID'];
	$query1 = "delete from food where ID = '".$ID."';";
	print_r($query1);
	mysqli_query($link, $query1);
	header("location:$path");
?>