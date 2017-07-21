<?php include '..//link_to_food_forum.php' ?>
<?php
	$food_ID = $_GET['food_ID'];
	$user_ID = $_COOKIE['user_ID'];
	$query = "INSERT INTO `collect` (`user_ID`, `food_ID`) VALUES ('".$user_ID."', '".$food_ID."');";
	$result = mysqli_query($link,$query);
	echo $query;
	print_r($result);
	if($result){
		//setcookie('collect',1);
		header("location:food_intruduce.php?food_ID=$food_ID&collect_recall=1");
		echo "success";
	}
	else {
		//setcookie('collect',2);
		header("location:food_intruduce.php?food_ID=$food_ID&collect_recall=0");
		echo "fail";
	}
	//echo $query;
	
?>