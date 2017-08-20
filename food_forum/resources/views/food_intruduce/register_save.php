<?php include '../link_to_food_forum.php' ?>
<?php
	$food_ID = $_GET['food_ID'];
	$user_ID = $_POST['user_ID'];
	$pwd = $_POST['pwd'];
	$result = new my_search("*","user","ID = '$user_ID' and pwd = '$pwd'");
	if($result->success == 1 &&$result->num == 1){
		setcookie('user_ID',$user_ID);
		setcookie('pwd',$pwd);
		setcookie('register_success',1,time()+3600,'/');
		if($result->rows[0]['admin']==1)header("location:../overlook_food/overlook_food_admin.php");
	}
	else {
		setcookie('register_success',2,time()+3600,'/');
	}
	echo $food_ID;
	header("location:food_intruduce.php?food_ID=$food_ID");
?>