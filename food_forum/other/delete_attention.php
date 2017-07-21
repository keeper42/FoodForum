<?php include '../link_to_food_forum.php' ?>

<?php
 	$path = $_COOKIE['now_path'];
	$user1=$_GET['user1'];
	$user2=$_GET['user2'];
	$query1 = "delete from attention where user1_ID = '".$user1."' && user2_ID = '".$user2."' ;";
	print_r($query1);
	mysqli_query($link, $query1);
	header("location:$path");
?>