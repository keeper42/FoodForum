<?php include '../link_to_food_forum.php' ?>
<?php
	setcookie('user_ID',"",time()+3600,'/');
	setcookie('pwd',"",time()+3600,'/');
	
	//unset($_COOKIE['register_success']);
	setcookie('register_success',"",time()+3600,'/');
	setcookie('is_register',"",time()+3600,'/');
	setcookie('register_user_save_',"",time()+3600,'/');
	print_r($_COOKIE);
	header("location:../overlook_food/overlook_food.php");
?>