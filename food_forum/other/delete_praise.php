<?php include '../link_to_food_forum.php' ?>

<?php
 	$path = $_COOKIE['now_path'];
	$user_ID=$_GET['user_ID'];
	$food_ID=$_GET['food_ID'];
	$query1 = "delete from praise where user_ID = '".$user_ID."' && food_ID = '".$food_ID."';";
	print_r($query1);
	mysqli_query($link, $query1);
	header("location:$path");
?>