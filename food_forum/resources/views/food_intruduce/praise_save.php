<?php include '..//link_to_food_forum.php' ?>
<?php
	$food_ID = $_GET['food_ID'];
	$user_ID = $_COOKIE['user_ID'];
	$query = "INSERT INTO `praise` (`user_ID`, `food_ID`) VALUES ('".$user_ID."', '".$food_ID."');";
	$result = mysqli_query($link,$query);
	echo $query;
	print_r($result);
	if($result){
		//setcookie('praise_recall',1,time()+3600,'/');
		header("location:food_intruduce.php?food_ID=$food_ID&praise_recall=1");
	}
	else {
		//setcookie('praise_recall',2,time()+3600,'/');
		header("location:food_intruduce.php?food_ID=$food_ID&praise_recall=0");
	}
	
	//header("location:food_intruduce.php?food_ID=$food_ID");
?>