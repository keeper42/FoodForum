<?php include '../link_to_food_forum.php' ?>
<?php
	$food_comment = $_POST['food_comment'];
	$food_ID = $_GET['food_ID'];
	echo $food_comment;
	$grade = isset($_COOKIE['grade'])?$_COOKIE['grade']:0;
	$user_ID = $_COOKIE['user_ID'];
	$query= "INSERT INTO `comment` (`user_ID`, `food_ID`, `content`, `grade`, `time`) VALUES ('".$user_ID."', '".$food_ID."', '".$food_comment."', '".$grade."', CURRENT_TIMESTAMP);";
	echo $query;
	mysqli_query($link,$query);
	//setcookie('success_comment',1,time()+3600,'/');
	header("location:food_intruduce.php?food_ID=$food_ID");
?>