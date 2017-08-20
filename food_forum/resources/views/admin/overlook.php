<?php include '../link_to_food_forum.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>美食论坛</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/bootstrap-select.css">
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../dist/js/bootstrap-select.js"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        function rectangle(obj) {
                 console.log(obj.width);
                 obj.style.height = obj.width+'px';
                 console.log(obj.style.height);
             }     
    </script>
</head>
<body>



    <?php include '../admin/add_carteen.php'; ?>
    <?php include '../overlook_food/register.php' ;?>
    <?php include '../overlook_food/register_success.php'; ?>
    <?php include '../search/search.php' ;?>
    <?php include '../overlook_food/register_user.php'; ?>
    <?php include '../overlook_food/register_user_save_success.php' ;?>
     
    <!-- nav导航条 -->
    <nav class="navbar navbar-default" role="navigation" style="margin: 0;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">深圳大学美食论坛</a>
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
                ?>
                    <li><a href="../admin/admin_carteen.php"><span class="glyphicon glyphicon-glass"></span> 食堂</a></li>
                    <li><a href="../admin/admin_overlook.php"><span class="glyphicon glyphicon-user"></span> 预览用户</a></li> 
                    <li><a href="../admin/admin_complain.php"><span class="glyphicon glyphicon-search"></span> 查看投诉</a></li>
                    
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
                $query = "select * from carteen_picture ";
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


     <main id="mainMenu" class="container-fluid">
     <br>
        <?php
            $query = "select distinct type from food";
            $result = mysqli_query($link,$query);
            for($i=0;$i<mysqli_num_rows($result);$i++){
                $row = mysqli_fetch_assoc($result);
        ?>
        <div class="row featurette">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <h2 class="featurette-heading"><?php echo $row['type'];?><br><br></h2>
            </div>
        </div>
        
            <?php
                $type_name = $row['type'];
                $query1 = "select * from food where type = '$type_name' ".$search_condition;
                $result1 = mysqli_query($link,$query1);
                for($j=0;$j<mysqli_num_rows($result1);$j++){
                    $row1 = mysqli_fetch_assoc($result1);
                    if($j%4==0){
                        echo '<div class="row">';
                        echo '<div class="col-sm-1 col-md-1"></div>';
                        echo '<div class="col-sm-10 col-md-10">';
                     }
            ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail" style="border: none;">
                        <?php 
                            $food_ID = $row1['ID'];
                            $query2 = "select * from food_picture where food_ID = '$food_ID';";
                            $result2 = mysqli_query($link,$query2);
                            $row2 = mysqli_fetch_assoc($result2);
                        ?>
                         <a href="../food_intruduce/food_intruduce.php?food_ID=<?php echo $row1['ID'];?>">
                                <img class="img-rounded" id="<?php echo $row2['food_ID'];?>" style="width: 100%;" src="<?php echo "../image/food_image/".$type_name."/".$row2['food_ID'].$row2['picture']?>" alt="<?php echo "../image/food_image/".$type_name."/".$row2['food_ID'].$row2['picture'] ?>"
                                 onload="rectangle(this)" onresize="rectangle(this)">
                         </a>
                        <div class="caption">
                            <h3 class="text-center"><?php echo $row1['name'];?></h3>
                            <p class="text-center"><?php echo $row1['content'];?></p>
                           <!--  <p class="text-center">
                                <a href="#" class="btn btn-primary" role="button" width="">Order</a>
                                <a href="#" class="btn btn-default" role="button">Details</a>
                            </p> -->
                        </div>
                    </div>
                </div>
            <?php if(($j+1)%4==0)echo '</div>'.'<div class="col-sm-1 col-md-1"></div>'.'</div>'; } 
                     if($j%4!=0)echo '</div>'.'<div class="col-sm-1 col-md-1"></div>'.'</div>';
            ?>
        
        <hr class="featurette-divider">
        <?php } ?>
     </main>

     <?php 
        print_r($_COOKIE);
     ?>
     
</body>
</html>