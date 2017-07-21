<?php include '../link_to_food_forum.php' ?>
<?php
	$flag = $_GET['flag'];
	$user_ID = $_POST['user_ID'];
	$pwd = $_POST['pwd'];
	$result = new my_search("*","user","ID = '$user_ID' and pwd = '$pwd'");
	if($result->success == 1 &&$result->num == 1){
		if($flag == 1 && $result->rows[0]['admin']==1)
		{
			setcookie('user_ID',$user_ID,time()+3600,'/');
			setcookie('pwd',$pwd,time()+3600,'/');
			setcookie('register_success',1,time()+3600,'/');
			setcookie('register_user_save_',3,time()+3600,'/');

			header("location:../admin/admin_overlook.php");
		}
		else if($flag == 0)
		{
			setcookie('user_ID',$user_ID,time()+3600,'/');
			setcookie('pwd',$pwd,time()+3600,'/');
			setcookie('register_success',1,time()+3600,'/');
			setcookie('register_user_save_',3,time()+3600,'/');
			header("location:../overlook_food/overlook_food.php");
		}
		else
		{
			setcookie('register_success',2,time()+3600,'/');
			header("location:../overlook_food/overlook_food.php");
			echo 2;
		}
	}
	else {
		setcookie('register_success',2,time()+3600,'/');
		header("location:../overlook_food/overlook_food.php");
		echo 2;
	}
?>