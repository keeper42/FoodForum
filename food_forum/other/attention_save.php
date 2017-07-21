<?php include '../link_to_food_forum.php' ?>
<?php
	$user = $_COOKIE['sent_message_target_ID'];
	$visit_ID = $_COOKIE['user_ID'];
    $attention = new my_search('*','attention',"user1_ID = '".$visit_ID."' && user2_ID = '$user'");
    print_r($attention);
    if($attention->num == 0)$query = "INSERT INTO `attention` (`user1_ID`, `user2_ID`) VALUES ('$visit_ID', '$user');";
    else $query = "DELETE FROM `attention` WHERE `user1_ID` = '$visit_ID' &&  `user2_ID`= '$user';";
    print_r($query);
   	mysqli_query($link,$query);
   	$path = $_COOKIE['now_path'];
   	header("location:$path");
?>