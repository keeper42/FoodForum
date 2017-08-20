<?php include '..//link_to_food_forum.php' ?>
<?php
	$food_ID = $_GET['food_ID'];
	$user_ID = '2015150022';
	$query = "DELETE FROM `praise` WHERE food_ID ='".$food_ID."' and user_ID = '".$user_ID."';";
	$result = mysqli_query($link,$query);
	setcookie('praise_recall',0,time()+3600,'/');
	echo $query;
	header("location:food_intruduce.php?food_ID=$food_ID");
?>