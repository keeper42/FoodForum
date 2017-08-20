<?php include '../link_to_food_forum.php' ?>
<?php 
    $user = $_COOKIE['user_ID'];
    $starttime = $_POST['eat_together_invite_starttime'];
    $endtime = $_POST['eat_together_invite_endtime'];
    $address = $_POST['eat_together_invite_address'];
    $note = $_POST['eat_together_invite_node'];
    $query = "INSERT INTO `together_eat` (`user1_ID`,`time`,`start_time`,`end_time`,`address`,`note`) VALUES('$user',CURRENT_TIMESTAMP,'$starttime','$endtime','$address','$note');";
    $result = mysqli_query($link,$query);
    $path = $_COOKIE['now_path'];
    header("location:$path");
?>
