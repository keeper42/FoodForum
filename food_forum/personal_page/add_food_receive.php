<?php include '../link_to_food_forum.php' ?>
<?php
	$carteen_name = $_POST['carteen_name'];

	$carteen = new my_search("*","carteen","name = '".$_POST['carteen_name']."'");
	$carteen_ID = $carteen->rows[0]['ID'];
	$user_ID = "2015150022";//到时候要改
	$food_ID = $user_ID.date('YmdHis',time());
	$query = "INSERT INTO `food` (`ID`, `user_ID`, `carteen_ID`, `name`, `time`, `type`, `content`, `price`) VALUES ('".$food_ID."', '".$user_ID."', '".$carteen_ID."', '".$_POST['food_name']."',  CURRENT_TIMESTAMP,'".$_POST['food_type']."', '".$_POST['food_content']."', '".$_POST['food_price']."');";
	echo $query."<br>";
	mysqli_query($link,$query);

	$food_type = mb_convert_encoding($_POST['food_type'],"GB2312","UTF-8");
	foreach ($_FILES["food_picture"]["error"] as $key => $error) {
	    
	        move_uploaded_file($_FILES["food_picture"]["tmp_name"][$key],
	      "../image/food_image/".$food_type."/".$food_ID.$_FILES["food_picture"]["name"][$key]);
	      echo "Stored in: " ."../image/food_image/".$_POST['food_type']."/".$food_ID.$_FILES["food_picture"]["name"][$key];

	      $query = "INSERT INTO `food_picture` (`food_ID`, `picture`) VALUES ('".$food_ID."','".$_FILES["food_picture"]["name"][$key]."');";
			echo $query."<br>";
			setcookie('success_add_food',true,time()+3600,'/');
			mysqli_query($link,$query);

	    
	}

	header("location:../overlook_food/overlook_food.php");
?>