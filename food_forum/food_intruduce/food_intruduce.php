<?php include '../link_to_food_forum.php' ?>
<?php 
    $user_ID = '2015150022';
    $food_ID = $_GET['food_ID'];
    $food = new my_search("*","food","ID='$food_ID'");
    $food_picture = new my_search("*","food_picture","food_ID='$food_ID'");
    $comment = new my_search("*","comment t,user u"," t.user_ID = u.ID && food_ID='$food_ID'");
    $praise = new my_search("*","praise","food_ID='$food_ID'");
    $praise_flag = -1;
    $collect_flag = -1;
    if(isset($_GET['praise_recall'])){
        if($_GET['praise_recall'] == 1)
            $praise_flag = 1;
        else $praise_flag = 0;
    }
    if(isset($_GET['collect_recall'])){
    
            $collect_flag = $_GET['collect_recall'];
            //echo "++$collect_flag++";
    }
?>
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
        document.cookie = 'now_path' + "="+ '../food_intruduce/food_intruduce.php' + ";path=/";
    </script>
</head>

<body>
    <?php include '../overlook_food/register.php' ;?>
    <?php include '../overlook_food/register_success.php'; ?>
    <?php include '../search/search.php' ;?>
    <?php include '../overlook_food/register_user.php'; ?>
    <?php include '../overlook_food/register_user_save_success.php' ;?>
    <?php include 'collect.php'; ?>
    <?php include 'praise.php';?>
    <?php include 'success_comment.php';?>
    <?php include 'comment.php' ;?>
    <?php include '../search/search.php' ?>
    <!-- nav导航条 -->
    <nav class="navbar navbar-default" role="navigation" style="margin: 0;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../overlook_food/overlook_food.php" onclick="">深圳大学美食论坛</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>  

            <div id="navbar" class="navbar-collapse collapse">

                <form class="navbar-form navbar-left" role="search" action="../overlook_food/overlook_food.php" method="post" >
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

                <ul class="nav navbar-nav navbar-right" onclick="my_onclick()"> 
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
                    <li><a href="#" data-toggle="modal" data-target="#complain"><span class="glyphicon glyphicon-comment"></span> 投诉</a></li>
                    <li><a href="../map/map.php" ><span class="glyphicon glyphicon-map-marker"></span> 地图</a></li>
                    <li><a href="../overlook_food/exit.php"><span class="glyphicon glyphicon-log-out"></span> 退出</a></li> 
                <?php include 'add_food.php';} ?>
                <?php include '../food_post/complain.php' ?>
                </ul>            </div>
     </div>
    </nav>

   <div class="container">
   <div class="row">

    <div class="row clearfix">
        <div class="col-md-12 column">
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-11 column">
            <div class="page-header">
                <h1>
                    <?php echo $food->rows[0]['name']; ?> <small><?php echo $food->rows[0]['type']; ?></small>
                </h1>
            </div>
            <div class="row clearfix">
                <div class="col-md-6 column col-sm-6">
                    <div class="carousel slide" id="carousel-575203">
                        <div class="carousel-inner">
                                <div class="item active">
                                    <img class="img-rounded" width="100%" alt="<?php echo "../image/food_image/".$food->rows[0]['type']."/".$food_ID.$food_picture->rows[0]['picture']?>" src="<?php echo "../image/food_image/".$food->rows[0]['type']."/".$food_ID.$food_picture->rows[0]['picture']?>" />
                                </div>
                            <?php
                                for($i=1;$i<$food_picture->num;$i++){

                            ?>
                                <div class="item">
                                <img class="img-rounded" width="100%" alt="<?php echo "../image/food_image/".$food->rows[0]['type']."/".$food_ID.$food_picture->rows[$i]['picture']?>" src="<?php echo "../image/food_image/".$food->rows[0]['type']."/".$food_ID.$food_picture->rows[$i]['picture']?>" />
                                </div>
                            <?php } ?>
                        </div> <a class="left carousel-control" href="#carousel-575203" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-575203" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>
                <div class="col-md-6 column col-sm-6">
                    <dl class="dl-horizontal" style="font-size: 30px;">
                        <dt>
                            美食名称
                        </dt>
                        <dd>
                            <?php echo $food->rows[0]['name']; ?>
                        </dd>
                        <dt>
                            评分
                        </dt>
                        <dd>
                            <?php 
                                //new my_search('*','')

                            echo $food->rows[0]['grade']; ?>
                        </dd>
                        <dt>
                            价格
                        </dt>
                        <dd>
                            <?php echo $food->rows[0]['price']; ?>
                        </dd>
                        <dt>
                           发布者
                        </dt>
                        <dd>
                           <a href="../personal_page/visit_page.php" onclick="set_target(<?php echo $food->rows[0]['user_ID']?>)"> 
                           <?php
                           $user_ID = $food->rows[0]['user_ID'];
                            $user = new my_search("*","user","ID = '$user_ID'");
                           echo $user->rows[0]['name']; ?>
                           </a>
                        </dd>
                        <dt>
                           所在食堂
                        </dt>
                        <dd>
                           <?php 
                           $carteen_ID = $food->rows[0]['carteen_ID'];
                           $carteen = new my_search("*","carteen","ID = '$carteen_ID'");
                            echo $carteen->rows[0]['name']; ?>
                        </dd>
                        <dt>
                            发布时间
                        </dt>
                        <dd>
                             <?php echo $food->rows[0]['time']; ?>
                        </dd>
                        <dt>
                           简介
                        </dt>
                        <dd>
                           <?php echo $food->rows[0]['content']; ?>
                        </dd>
                    </dl>
                </div>
            </div>
            <br>
            <div class="row clearfix">
                <div class="col-md-11 column">
                </div>
            </div>


            <div class="tabbable" id="tabs-791245">
                <ul class="nav nav-tabs">
                    <li class="active">
                         <a href="#panel-372241" data-toggle="tab"> <span class="badge pull-right"><?php echo $comment->num ?></span>评论&nbsp;</a>
                    </li>
                    <li >
                         <a href="#panel-224823" data-toggle="tab"> <span class="badge pull-right"><?php if($praise!=null){echo $praise->num;} ?></span>点赞&nbsp;</a>
                    </li>
                    
                </ul>
                <div class="tab-content">

                    <div class="tab-pane" id="panel-224823">

                            <?php
                                if($praise!=null)
                                for($i=0;$i<$praise->num;$i++){
                                    $praise_user_ID = $praise->rows[$i]['user_ID'];
                                    $praise_user = new my_search("*","user","ID = '$praise_user_ID'");
                            ?>
                            <br>
                            <div class="col-sm-6 col-md-3" style="text-align: center;">
                                
                                    <div>
                                         <a href="#" class="pull-left"><img src="../image/user_image/<?php echo $praise_user->rows[0]['ID'];?>.jpg" width="80%" class="img-thumbnail" alt="../image/user_image/<?php echo $praise_user->rows[0]['ID'];?>.jpg" /></a>
                                     </div>
                                    <h4 class="media-heading" >
                                        <?php echo $praise_user->rows[0]['name'];?>
                                    </h4>
                                    
                            </div>

                            <?php } ?>     
                    </div>


                    <div class="tab-pane active" id="panel-372241"><br>

                            <?php
                                
                                
                                $box_style = array( 
                                    0 =>"success",
                                    1 => "info",
                                    2 => "danger",
                                    3 => "warning");
                                for($i=0;$i<$comment->num;$i++){
                                    if($comment->rows[$i]['picture']=='default')
                                        $picture = "../image/user_image/default";
                                    else $picture = "../image/user_image/".$comment->rows[$i]['ID'].$comment->rows[$i]['picture'] ;
                            ?>

                          <div class="alert alert-<?php echo $box_style[$i%4]; ?> alert-dismissable" style="position: relative;margin-bottom: 30px;">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <div style="display: inline;">
                                    <a href="../personal_page/visit_page.php" onclick="set_target(<?php echo $comment->rows[$i]['ID']?>)">   
                                                <img class="img-rounded" id="" style="width: 20%; display:inline; " src="<?php echo $picture; ?>" alt="<?php echo $picture; ?>"
                                                 ">
                                         </a>
                                </div>
                                <div style="display:block; position: absolute;left: 23%;top: 7%; width: 75%">
                                     <h4 style="">
                                            来自<strong><?php  echo $comment->rows[$i]['name'] ?></strong>的评论
                                        </h4> 
                                        <hr>
                                        食客ID：<?php  echo $comment->rows[$i]['ID'] ?>&emsp;
                                        食客等级：<?php  echo $comment->rows[$i]['level'] ?>&emsp;
                                        打饭积分：<?php  echo $comment->rows[$i]['credit'] ?><br>
                                         评论内容：<?php  echo $comment->rows[$i]['content'] ?><br>
                                        
                                       
                                </div>   
                                <div style="display:block;position: absolute;left: 23%;bottom:  7%;width: 75%">
                                    <hr>
                                    时间：<?php  echo $comment->rows[$i]['time'] ?>
                                </div>  
                                
                           
                        </div>
                        <?php } ?>


                    </div>

                </div>
            </div>
         
        </div>

        <div class="col-md-1 column">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <ul class="nav nav-tabs nav-stacked" data-spy="affix">
                <li><a href="praise_save.php?food_ID=<?php echo $food_ID;?>" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-heart"></span>点赞</a></li>
                <li><a href="collect_save.php?food_ID=<?php echo $food_ID;?>"   class="btn btn-info btn-lg"><span class="glyphicon glyphicon-star"></span>收藏</a></li>
                <li>
                    <a href="#myModal_comment"  class="btn btn-info btn-lg" data-toggle="modal"><span class="glyphicon glyphicon-comment"></span>评论</a>
                </li>
            </ul>
        </div>
    </div>


<br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
</div>

    
</body>
</html>