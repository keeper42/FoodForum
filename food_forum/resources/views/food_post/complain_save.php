<?php include '../link_to_food_forum.php' ?>
<?php
	$filename = "";
	$carteen_name = $_POST['complain_carteen_name'];

	$carteen = new my_search("*","carteen","name = '".$carteen_name."'");
	$carteen_ID = $carteen->rows[0]['ID'];
	$user_ID = $_COOKIE['user_ID'];//到时候要改
	$food_name = $_POST['complain_food_name'];
	$complain_content = $_POST['complain_details'];
	$simple_reason = $_POST['complain_reason'];
	$complain_type = $_POST['complain_type'];
	if ($_FILES["complain_picture"]["error"] == 0){
		move_uploaded_file($_FILES["complain_picture"]["tmp_name"],
	      "../image/complain_image/$user_ID".$_FILES["complain_picture"]["name"]);
		echo "save in :". "../image/complain_image/$user_ID".$_FILES["complain_picture"]["name"];
		$filename = $_FILES['complain_picture']['name'];
	}
	$query = "INSERT INTO `complain` (`user_ID`, `carteen_ID`, `time`, `content`, `food_name`, `simple_reason`, `type`, `picture`,`solve`) VALUES ('$user_ID', '$carteen_ID', CURRENT_TIMESTAMP, '$complain_content', '$food_name', '$simple_reason', '$complain_type', '$filename',0);";
	echo $query."<br>";
	mysqli_query($link,$query);
	
	header("location:../overlook_food/overlook_food.php");
?>