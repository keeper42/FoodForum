<?php include '../link_to_food_forum.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>美食论坛</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/bootstrap-select.css">
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../dist/js/bootstrap-select.js"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        function rectangle(obj) {
                 console.log(obj.width);
                 obj.style.height = obj.width+'px';
                 console.log(obj.style.height);
             }     
              function set_target(argument) {
            console.log(argument);
            var exp = new Date();
            exp.setTime(exp.getTime() + 60*60*1000);
            document.cookie = 'sent_message_target_ID' + "="+ escape (argument) + ";expires=" + exp.toGMTString() + ";path=/";
            //document.cookie = 'sent_message_target_ID' + "="+ argument;
            
        }
        function set_name(argument) {
            console.log(argument);
            document.getElementById('sent_message_target_name').innerHTML = argument;
        }
        document.cookie = 'now_path' + "="+ '../food_post/together_eat.php' + ";path=/";
    </script>
</head>
<body>
   <?php include '../overlook_food/register.php' ;?>
    <?php include '../overlook_food/register_success.php'; ?>
    <?php include '../search/search.php' ;?>
    <?php include '../overlook_food/register_user.php'; ?>
    <?php include '../overlook_food/register_user_save_success.php' ;?>
    <?php
        $page = '/overlook_food/overlook_food.php';
        if(!isset($_COOKIE['success_add_food']));
        else if($_COOKIE['success_add_food']==true) {
        echo "<script type='text/javascript'>alert('成功晒上美食')";
        setcookie('success_add_food',false,time()+3600,'/');
        echo "</script>";
        }
     ?>
    <!-- nav导航条 -->
    <nav class="navbar navbar-default" role="navigation" style="margin: 0;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../overlook_food/overlook_food.php">深圳大学美食论坛</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>  

            <div id="navbar" class="navbar-collapse collapse">

                <form class="navbar-form navbar-left"  action="../overlook_food/overlook_food.php" method="post">
                    <ul class="nav navbar-nav">
                    <li>
                        <div class="form-group">
                          <select class="selectpicker"  name="carteen_name[]" multiple>
                        <?php

                                $query = "select distinct region from carteen";
                                $result = mysqli_query($link,$query);
                                $num = mysqli_num_rows($result);
                                for($i=0;$i<$num;$i++){
                                $row = mysqli_fetch_assoc($result);
                                $region = $row['region'];
                                echo '<optgroup label='.$region.'>';

                                    $query2 = "select * from carteen where region = '$region'";
                                    $result2 = mysqli_query($link,$query2);
                                    $num2 = mysqli_num_rows($result2);
                                    for($j=0;$j<$num2;$j++){
                                        $row2 = mysqli_fetch_assoc($result2);
                                       echo '<option>'.$row2['name'].'</option>';
                                     } 
                                echo '</optgroup>';
                         } ?>
                        </optgroup>
                          </select>
                        </div>
                     &nbsp; &nbsp; &nbsp; &nbsp; 
                    </li>
                    <li>
                        <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="搜搜想要的美食吧" name="q">

                        <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                    </div>
                    </li>
                    </ul>
                </form>

                <ul class="nav navbar-nav navbar-right"> 
                <?php

                     $is_register = isset($_COOKIE['register_success'])?$_COOKIE['register_success']:0;
                     
                     if($is_register==0||$is_register==2){
                ?>
                    <li><a data-toggle="modal" href="#modal_register_user"><span class="glyphicon glyphicon-user"></span> 注册</a></li> 
                    <li><a href="#" data-toggle="modal" data-target="#modal_register"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li> 
                    <li><a href="../map/map.php" ><span class="glyphicon glyphicon-map-marker"></span> 地图</a></li>
                <?php } 
                    else if($is_register==3||$is_register==1){
                        $user_ID = $_COOKIE['user_ID'];
                ?>
                    <li><a href="../personal_page/personal_page.php"><span class="glyphicon glyphicon-user"></span> 我的</a></li> 
                    <li><a href="../food_post/together_eat.php"><span class="glyphicon glyphicon-heart"></span> 约饭</a></li> 
                    <li><a href="../food_post/ask_for_food.php"><span class="glyphicon glyphicon-retweet"></span> 打饭</a></li> 
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-camera"></span> 晒美食</a></li>

                    <li><a href="" data-toggle="modal" data-target="#complain"><span class="glyphicon glyphicon-comment"></span> 投诉</a></li>
                    <li><a href="../map/map.php" ><span class="glyphicon glyphicon-map-marker"></span> 地图</a></li>
                    <li><a href="../overlook_food/exit.php"><span class="glyphicon glyphicon-log-out"></span> 退出</a></li> 
                <?php include '../overlook_food/add_food.php';} ?>
                <?php include '../food_post/complain.php' ?>
                </ul> 
            </div>
     </div>
    <!-- .container-fluid -->
  </nav>

    <!-- 轮播 -->
    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
           <?php
                $carteen = 'nanqu1';
                $query = "select * from carteen_picture where carteen_ID = '$carteen'";
                $result = mysqli_query($link,$query);
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="item active" >
                <img style="width: 100%;" src="<?php echo  '../image/carteen_picture/'.$row['picture'] ;?>" >
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php echo $row['intruduce'] ;?></h1>
                    </div>
                </div>
            </div>
            <?php
                for($i=1;$i<mysqli_num_rows($result);$i++){
                    $row = mysqli_fetch_assoc($result);
            ?>
            <div class="item" >
                <img style="width: 100%;" src="<?php echo  '../image/carteen_picture/'.$row['picture'] ;?>" >
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php echo $row['intruduce'] ;?></h1>
                    </div>
                </div>
            </div>
             <?php } ?>

        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>


    <div class="container" style="position: relative;">
        <br><h2>欢迎来到约饭吧</h2>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#together_eat_Modal" style="position: absolute;right: 2%;bottom: 40px;" >发约饭贴</button>
        <?php include '../other/eat_together_invite.php'; ?>
        <hr>
    </div>
    <main id="mainMenu" class="container">
    <?php include '../other/sent_message.php'; ?>
     <div class="tab-pane" id="panel-message">
    <?php 
            $myFoodPost = new my_search('*','together_eat t,user u'," t.user1_ID = u.ID ");
            //print_r($myFoodPost);
            $box_style = array( 
                0 =>"success",
                1 => "info",
                2 => "danger",
                3 => "warning");
            for($i=0;$i<$myFoodPost->num;$i++){
                if($myFoodPost->rows[$i]['picture']=='default')
                    $picture = "../image/user_image/default";
                else $picture = "../image/user_image/".$myFoodPost->rows[$i]['ID'].$myFoodPost->rows[$i]['picture'] ;
        ?>
       
    
      <div class="alert alert-<?php echo $box_style[$i%4]; ?> alert-dismissable" style="position: relative;margin-bottom: 30px;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <div style="display: inline;">
               <a href="../personal_page/visit_page.php" onclick="set_target(<?php echo $myFoodPost->rows[$i]['ID']?>)">
                            <img class="img-rounded" id="" style="width: 20%; display:inline; " src="<?php echo $picture; ?>" alt="<?php echo $picture; ?>"
                             ">
                     </a>
            </div>
            <div style="display:block; position: absolute;left: 23%;top: 7%; width: 75%">
                 <h4 style="">
                        来自<strong><?php  echo $myFoodPost->rows[$i]['name'] ?></strong>的共餐邀请
                    </h4> 
                    <hr>
                    食客ID：<?php  echo $myFoodPost->rows[$i]['ID'] ?>&emsp;
                    食客等级：<?php  echo $myFoodPost->rows[$i]['level'] ?><br>
                    消息内容：<?php  echo $myFoodPost->rows[$i]['note'] ?><br>
                    约饭地点：<?php  echo $myFoodPost->rows[$i]['address'] ?><br>
                    约饭时间：<?php  echo $myFoodPost->rows[$i]['start_time'] ?>到<?php  echo $myFoodPost->rows[$i]['end_time'] ?>之间<br>
            </div>   
            <div style="display:block;position: absolute;left: 23%;bottom:  7%;width: 75%">
                <hr>
                发帖时间：<?php  echo $myFoodPost->rows[$i]['time'] ?>
            </div>  
            <div style="display: inline;position: absolute;right:2%;bottom: 5%;">
                <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#sent_message" onclick="set_target(<?php echo $myFoodPost->rows[$i]['ID']; ?>);set_name('<?php echo $myFoodPost->rows[$i]['name']; ?>')">发送消息</button>
                &nbsp;
                <button type="button" data-dismiss="alert" aria-hidden="true"  class="btn btn-warning">拒绝</button>
            </div>  
       
    </div>
    <?php } ?>
    </div>

    </main>

    <?php 
        print_r($_COOKIE);
    ?>




</body>
</html>