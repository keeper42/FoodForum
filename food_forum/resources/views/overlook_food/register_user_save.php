<?php include '../link_to_food_forum.php' ?>
<?php
    $ID = $_POST['register_user_ID'];
    $pwd = $_POST['register_pwd'];
    $name = $_POST['register_user_name'];
    $signature = $_POST['register_signature'];
    $query = "INSERT INTO `user` (`ID`, `name`, `pwd`, `exp`, `level`, `credit`, `picture`, `signature`) VALUES ('$ID', '$name', '$pwd', '0', '1', '100', 'default', '$signature');";
    //echo $query;
    $result = mysqli_query($link,$query);
    if($result){
        setcookie('register_user_save_',1,time()+3600,'/');
        setcookie('user_ID',$ID,time()+3600,'/');
        setcookie('pwd',$pwd,time()+3600,'/');
        if($result->rows[0]['admin']==1)header("location:../overlook_food/overlook_food_admin.php");
        else header("location:../overlook_food/overlook_food.php");
        echo "success";
    }
    else {
        setcookie('register_user_save_',time()+3600,'/');
        echo "fail";
        header("location:../overlook_food/overlook_food.php");
    }
    
    echo "<a href='../overlook_food/overlook_food.php'> back</a>";
    print_r($_COOKIE);
?>