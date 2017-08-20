<?php include '../link_to_food_forum.php' ?>
<?php
   $target_ID = $_COOKIE['sent_message_target_ID'] ;
   $user_ID = $_COOKIE['user_ID'];
   $content = $_POST['sent_message_content'];
   $path = $_COOKIE['now_path'];
    $query = "INSERT INTO `message` (`user1_ID`, `user2_ID`, `time`, `content`) VALUES ('$user_ID ', '$target_ID', CURRENT_TIMESTAMP, '$content');";
    echo $query;
    $result = mysqli_query($link,$query);

    header("location:$path");
    echo "<a href='../overlook_food/overlook_food.php'> back</a>";
    print_r($_COOKIE);
?>