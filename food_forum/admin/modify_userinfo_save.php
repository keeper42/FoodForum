<?php include '../link_to_food_forum.php' ?>
<?php
	$user_ID = $_GET['user_ID'];
	$name = $_POST['modify_name'];
	$signature  = $_POST['modify_signature'];
	$filename = "";
	if ($_FILES["modify_user_picture"]["error"] == 0){
		move_uploaded_file($_FILES["modify_user_picture"]["tmp_name"],
	      "../image/user_image/$user_ID".$_FILES["modify_user_picture"]["name"]);
		echo "save in :". "../image/user_image/$user_ID".$_FILES["modify_user_picture"]["name"];
		$filename = $_FILES['modify_user_picture']['name'];
	}
	if($filename=="")  $query = "UPDATE `user` SET `name` = '$name', `signature` = '$signature' WHERE `user`.`ID` = '$user_ID';";
	else  $query = "UPDATE `user` SET `name` = '$name', `picture` = '".$filename."', `signature` = '$signature' WHERE `user`.`ID` = '$user_ID';";
	echo $query."<br>";
	mysqli_query($link,$query);

	//$food_type = mb_convert_encoding($_POST['food_type'],"GB2312","UTF-8");
	print_r($_FILES);
	$path = $_COOKIE['now_path'];
	print_r($path);
	print_r($_COOKIE);
	header("location:$path");
?>