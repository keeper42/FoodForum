<?php include '../link_to_food_forum.php' ?>
<?php 
    $user = $_COOKIE['user_ID'];
    $starttime = $_POST['ask_food_post_starttime'];
    $endtime = $_POST['ask_food_post_endtime'];
    $address = $_POST['ask_food_post_address'];
    $note = $_POST['ask_food_post_node'];
    $demand = $_POST['ask_food_post_demand'];

    $query = "INSERT INTO `ask_for_food` (`user_ID`,`time`,`start_time`,`end_time`,`address`,`note`,`demand`) VALUES('$user',CURRENT_TIMESTAMP,'$starttime','$endtime','$address','$note','$demand');";
    $result = mysqli_query($link,$query);
    $query = "SELECT * from user where ID = '$user'";
    $row = mysqli_fetch_array(mysqli_query($link,$query));
    $credit = $row['credit']-1;
    $query = "UPDATE `user` SET `credit` = '$credit' where ID = '$user';";
    mysqli_query($link,$query);
    $path = $_COOKIE['now_path'];
    header("location:$path");
?>
