<?php include '../link_to_food_forum.php' ?>
<?php 
    $user = $_COOKIE['user_ID'];
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
            //sconsole.log(argument);
            var exp = new Date();
            exp.setTime(exp.getTime() + 60*60*1000);
            document.cookie = 'sent_message_target_ID' + "="+ escape (argument) + ";expires=" + exp.toGMTString() + ";path=/";
            //document.cookie = 'sent_message_target_ID' + "="+ argument;
            
        }
        function set_name(argument) {
            //console.log(argument);
            document.getElementById('sent_message_target_name').innerHTML = argument;
        }     
        document.cookie = 'now_path' + "="+ '../personal_page/personal_page_admin.php' + ";path=/";
        function set_page_index(argument) {

            document.cookie = 'page_index' + "="+ argument + ";path=/";
        }
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
        if(empty($_COOKIE['success_add_food']));
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
                <a class="navbar-brand" href="overlook.php">深圳大学美食论坛</a>
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
                     <li><a href="../admin/admin_overlook.php"><span class="glyphicon glyphicon-user"></span> 预览用户</a></li> 
                    <li><a href="../personal_page/personal_page_admin.php"><span class="glyphicon glyphicon-user"></span> 我的</a></li> 
                    <li><a href="../food_post/together_eat.php"><span class="glyphicon glyphicon-heart"></span> 约饭</a></li> 
                    <li><a href="../food_post/ask_for_food.php"><span class="glyphicon glyphicon-retweet"></span> 打饭</a></li> 
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-camera"></span> 晒美食</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#complain"><span class="glyphicon glyphicon-comment"></span> 投诉</a></li>
                    <li><a href="../map/map.php" ><span class="glyphicon glyphicon-map-marker"></span> 地图</a></li>
                    <li><a href="../overlook_food/exit.php"><span class="glyphicon glyphicon-log-out"></span> 退出</a></li> 
                <?php include '../overlook_food/add_food.php';} ?>
                <?php include '../food_post/complain.php' ?>
                </ul> 

            </div>
     </div>
    <!-- .container-fluid -->
  </nav>


    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix" style="background: url('../image/szu/szu2.jpg') no-repeat; background-size:100%" >
                <div class="col-md-1 column">
                </div>
                <div class="col-md-10 column">
                    
                    <div class="row clearfix" >
                         
                        <?php 
                            $userinfo = new my_search('*','user'," ID = '$user'");
                            if($userinfo->rows[0]['picture']=='default')
                                $picture = "../image/user_image/default";
                            else  $picture = "../image/user_image/".$userinfo->rows[0]['ID'].$userinfo->rows[0]['picture'];
                        ?>
                        <div class="col-md-4 column">
                            <a  data-toggle="modal" href="#modify_userinfo"><img width="90%" alt="<?php echo $picture;?>" src="<?php echo $picture;?>" class="img-circle" style="margin: 5%;" /></a>
                            <?php include 'modify_userinfo.php'; ?>
                        </div>
                        <div class="col-md-8 column" style="">
                            <div class="panel panel-warning" style=" margin-top: 30px;background-color:rgba(256,210,210,0.7);">
                                <div class="panel-body" >
                                    <dl class="dl-horizontal" style="font-size: 30px;">
                                        <dt>账户ID</dt>
                                        <dd> <?php echo $userinfo->rows[0]['ID']; ?></dd>
                                        <dt>昵称</dt>
                                        <dd> <?php echo $userinfo->rows[0]['name']; ?></dd>
                                        <dt>等级</dt>
                                        <dd> <?php echo $userinfo->rows[0]['level']; ?></dd>
                                        <dt>打饭积分</dt>
                                        <dd> <?php echo $userinfo->rows[0]['credit']; ?></dd>
                                        <dt>个性签名</dt>
                                        <dd> <?php echo $userinfo->rows[0]['signature']; ?></dd>
                                    </dl>
                                </div>
                            </div> 
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-1 column">
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-1 column">
                </div>
                <div class="col-md-10 column">
                    <div class="tabbable" id="tabs-652527">
                        <ul class="nav nav-tabs">
                            <li>
                                 <a href="#panel-food" id="panel-food-tip" data-toggle="tab" onclick="set_page_index('panel-food')">我的美食</a>
                            </li>
                            <li>
                                 <a href="#panel-collect" id="panel-collect-tip" data-toggle="tab" onclick="set_page_index('panel-collect')">我的收藏</a>
                            </li>
                            <li>
                                 <a href="#panel-comment" id="panel-comment-tip" data-toggle="tab" onclick="set_page_index('panel-comment')">我的评论</a>
                            </li>
                            <li>
                                 <a href="#panel-praise" id="panel-praise-tip" data-toggle="tab" onclick="set_page_index('panel-praise')">我的点赞</a>
                            </li>
                            <li>
                                 <a href="#panel-attention" id="panel-attention-tip" data-toggle="tab" onclick="set_page_index('panel-attention')">我的关注</a>
                            </li>
                            <li>
                                 <a href="#panel-fan" id="panel-fan-tip" data-toggle="tab" onclick="set_page_index('panel-fan')">我的粉丝</a>
                            </li>
                            <li>
                                 <a href="#panel-message" id="panel-message-tip" data-toggle="tab" onclick="set_page_index('panel-message')">我的消息</a>
                            </li>
                            <li>
                                 <a href="#panel-complain" id="panel-complain-tip" data-toggle="tab" onclick="set_page_index('panel-complain')">投诉消息</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel-food"><br>
                                <?php 
                                    $myFood = new my_search('*','food',"user_ID = $user");
                                    //print_r($myFood);
                                    for($i=0;$i<$myFood->num;$i++){
                                        $myFood_picture = new my_search('*','food_picture',"food_ID = '".$myFood->rows[$i]['ID']."'");
                                        if($i%2==0)echo "<div class='row'>";
                                ?>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="panel panel-danger">
                                            
                                            <div class="panel-body">
                                                <div class="col-md-5">
                                                <?php //print_r($myFood_picture->rows[0]);print_r($myFood->rows[$i]); ?>
                                                <img  class="img-rounded" width="100%"  src="<?php echo "../image/food_image/".$myFood->rows[$i]['type']."/".$myFood->rows[$i]['ID'].$myFood_picture->rows[0]['picture']?>" onload="rectangle(this)" />
                                                </div>
                                                <div class="col-md-7">
                                                    <dl>
                                                        <dd>
                                                            <b>美食名称：</b><?php echo $myFood->rows[$i]['name']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>评分：</b>
                                                            <?php echo $myFood->rows[$i]['grade']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>价格：</b>
                                                            <?php echo $myFood->rows[$i]['price']; ?>
                                                        </dd>
                                                        <dd>
                                                           <b>所在食堂：</b>
                                                           <?php 
                                                           $carteen_ID = $myFood->rows[$i]['carteen_ID'];
                                                           $carteen = new my_search("*","carteen","ID = '$carteen_ID'");
                                                            echo $carteen->rows[0]['name']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>发布时间：</b>
                                                             <?php echo $myFood->rows[$i]['time']; ?>
                                                        </dd>
                                                        <dd>
                                                           <b>简介：</b>
                                                           <?php echo $myFood->rows[$i]['content']; ?>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="panel-heading" style="position: relative;min-height: 55px; ">
                                            
                                                <h3 class="panel-title" style="position: absolute;right: 2%;bottom: 9px;">
                                                    <a href=""><button type="button" class="btn btn-warning">修改</button></a>

                                                    <a href="../other/delete_food.php?food_ID=<?php echo $myFood->rows[$i]['ID'];?>"><button type="button" class="btn btn-warning">删除</button></a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                        
                                <?php 
                                    if($i%2!=0)echo "</div>";
                                    }
                                    if($i%2!=0)echo "</div>";
                                 ?>
                                
                                
                            </div>
                            <div class="tab-pane" id="panel-complain"><br>
                                <?php 
                                    $query2= "select * from complain;";
                                    $result2=mysqli_query($link, $query2);    
                                    $rownum2 = mysqli_num_rows($result2);
                                ?>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            用户ID
                        </th>
                        <th>
                            食堂ID
                        </th>
                        <th>
                            时间
                        </th>
                        <th>
                            内容
                        </th>
                        <th>
                            状态
                        </th>
                    </tr>
                </thead> 
                <?php

                        for($i=0; $i<$rownum2; $i++){
                            $row2 = mysqli_fetch_assoc($result2);
                                                           ?>
                        <tr>
                        <td>
                            <?php echo $row2['user_ID']; ?>
                        </td>
                        <td>
                            <?php echo $row2['carteen_ID']; ?>
                        </td>
                        <td>
                            <?php echo $row2['time']; ?>
                        </td>
                        <td>
                            <?php echo $row2['content']; ?>
                        </td>
                        <td>
                            <?php 
                            if($row2['solve']==1)
                            echo "已处理";
                            else
                            echo "未处理" ?>
                        </td>
                        <td>
                            <a href="update.php?id=<?php echo $row2['user_ID']."&cid=".$row2['carteen_ID']."&time=".$row2['time']?>"><button type="button" class="btn btn-default">处理
                        </td>
                    </tr>
                    <?php } ?>
            </table> </button>
        </div>
    </div>
</div>
                               
                            </div>
                            <div class="tab-pane active"" id="panel-collect"><br>
                                    <?php 
                                    $myCollect = new my_search('*','collect',"user_ID = $user");
                                    for($i=0;$i<$myCollect->num;$i++){
                                        
                                        if($i%2==0)echo "<div class='row'>";
                                        $myFood = new my_search('*','food',"ID = '".$myCollect->rows[$i]['food_ID']."'");
                                        $myFood_picture = new my_search('*','food_picture',"food_ID = '".$myFood->rows[0]['ID']."'");
                                ?>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="panel panel-danger">
                                            
                                            <div class="panel-body">
                                                <div class="col-md-5">
                                                <?php //print_r($myFood_picture->rows[0]);print_r($myFood->rows[$i]); ?>
                                                <img  class="img-rounded" width="100%"  src="<?php echo "../image/food_image/".$myFood->rows[0]['type']."/".$myFood->rows[0]['ID'].$myFood_picture->rows[0]['picture']?>" onload="rectangle(this)" />
                                                </div>
                                                <div class="col-md-7">
                                                    <dl>
                                                        <dd>
                                                            <b>美食名称：</b><?php echo $myFood->rows[0]['name']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>评分：</b>
                                                            <?php echo $myFood->rows[0]['grade']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>价格：</b>
                                                            <?php echo $myFood->rows[0]['price']; ?>
                                                        </dd>
                                                        <dd>
                                                           <b>所在食堂：</b>
                                                           <?php 
                                                           $carteen_ID = $myFood->rows[0]['carteen_ID'];
                                                           $carteen = new my_search("*","carteen","ID = '$carteen_ID'");
                                                            echo $carteen->rows[0]['name']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>发布时间：</b>
                                                             <?php echo $myFood->rows[0]['time']; ?>
                                                        </dd>
                                                        <dd>
                                                           <b>简介：</b>
                                                           <?php echo $myFood->rows[0]['content']; ?>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="padding-left: 85%;">
                                                    <a href="../other/delete_collect?food_ID=<?php echo $myCollect->rows[$i]['food_ID']; ?>&user_ID=<?php echo $myCollect->rows[$i]['user_ID']; ?>"><button type="button" class="btn btn-warning">取消收藏</button></a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                        
                                <?php 
                                    if($i%2!=0)echo "</div>";
                                    }
                                    if($i%2!=0)echo "</div>";
                                 ?>
                            </div>

                            <div class="tab-pane active" id="panel-comment"><br>
                                <?php 
                                    $myComment = new my_search('*','comment',"user_ID = $user");
                                    for($i=0;$i<$myComment->num;$i++){
                                        
                                        if($i%2==0)echo "<div class='row'>";
                                        $myFood = new my_search('*','food',"ID = '".$myComment->rows[$i]['food_ID']."'");
                                        $myFood_picture = new my_search('*','food_picture',"food_ID = '".$myFood->rows[0]['ID']."'");
                                ?>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="panel panel-danger">
                                            <div class="panel-body">

                                                <div class="col-md-5">
                                                <?php //print_r($myFood_picture->rows[0]);print_r($myFood->rows[$i]); ?>
                                                <img  class="img-rounded" width="100%"  src="<?php echo "../image/food_image/".$myFood->rows[0]['type']."/".$myFood->rows[0]['ID'].$myFood_picture->rows[0]['picture']?>" onload="rectangle(this)" />
                                                </div>
                                                <div class="col-md-7">
                                                    <dl>
                                                        <dd>
                                                            <b>美食名称：</b><?php echo $myFood->rows[0]['name']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>评分：</b>
                                                            <?php echo $myFood->rows[0]['grade']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>价格：</b>
                                                            <?php echo $myFood->rows[0]['price']; ?>
                                                        </dd>
                                                        <dd>
                                                           <b>所在食堂：</b>
                                                           <?php 
                                                           $carteen_ID = $myFood->rows[0]['carteen_ID'];
                                                           $carteen = new my_search("*","carteen","ID = '$carteen_ID'");
                                                            echo $carteen->rows[0]['name']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>发布时间：</b>
                                                             <?php echo $myFood->rows[0]['time']; ?>
                                                        </dd>
                                                        <dd>
                                                           <b>简介：</b>
                                                           <?php echo $myFood->rows[0]['content']; ?>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="panel-heading" style="position: relative;">
                                                <h3 class="panel-title" style="margin: 5px;">
                                                    <?php echo $myComment->rows[$i]['content']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                        
                                <?php 
                                    if($i%2!=0)echo "</div>";
                                    }
                                    if($i%2!=0)echo "</div>";
                                 ?>
                            </div>

                            <div class="tab-pane active" id="panel-praise"><br>
                                <?php 
                                    $myPraise = new my_search('*','praise',"user_ID = $user");
                                    for($i=0;$i<$myPraise->num;$i++){
                                        
                                        if($i%2==0)echo "<div class='row'>";
                                        $myFood = new my_search('*','food',"ID = '".$myPraise->rows[$i]['food_ID']."'");
                                        $myFood_picture = new my_search('*','food_picture',"food_ID = '".$myFood->rows[0]['ID']."'");
                                ?>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="panel panel-danger">
                                            
                                            <div class="panel-body">
                                                <div class="col-md-5">
                                                <?php //print_r($myFood_picture->rows[0]);print_r($myFood->rows[$i]); ?>
                                                <img  class="img-rounded" width="100%"  src="<?php echo "../image/food_image/".$myFood->rows[0]['type']."/".$myFood->rows[0]['ID'].$myFood_picture->rows[0]['picture']?>" onload="rectangle(this)" />
                                                </div>
                                                <div class="col-md-7">
                                                    <dl>
                                                        <dd>
                                                            <b>美食名称：</b><?php echo $myFood->rows[0]['name']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>评分：</b>
                                                            <?php echo $myFood->rows[0]['grade']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>价格：</b>
                                                            <?php echo $myFood->rows[0]['price']; ?>
                                                        </dd>
                                                        <dd>
                                                           <b>所在食堂：</b>
                                                           <?php 
                                                           $carteen_ID = $myFood->rows[0]['carteen_ID'];
                                                           $carteen = new my_search("*","carteen","ID = '$carteen_ID'");
                                                            echo $carteen->rows[0]['name']; ?>
                                                        </dd>
                                                        <dd>
                                                            <b>发布时间：</b>
                                                             <?php echo $myFood->rows[0]['time']; ?>
                                                        </dd>
                                                        <dd>
                                                           <b>简介：</b>
                                                           <?php echo $myFood->rows[0]['content']; ?>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="padding-left: 85%;">
                                                     <a href="../other/delete_praise?food_ID=<?php echo $myPraise->rows[$i]['food_ID']; ?>&user_ID=<?php echo $myPraise->rows[$i]['user_ID']; ?>"><button type="button" class="btn btn-warning">取消点赞</button></a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                        
                                <?php 
                                    if($i%2!=0)echo "</div>";
                                    }
                                    if($i%2!=0)echo "</div>";
                                 ?>
                            </div>
                            <div class="tab-pane" id="panel-message"><br>
                            <?php 
                                    $myMessage = new my_search('*','message m,user u',"user2_ID = $user && m.user1_ID = u.ID ORDER BY time DESC");
                                    $box_style = array( 
                                        0 =>"success",
                                        1 => "info",
                                        2 => "danger",
                                        3 => "warning");
                                    for($i=0;$i<$myMessage->num;$i++){
                                        if($myMessage->rows[$i]['picture']=='default')
                                            $picture = "../image/user_image/default";
                                        else $picture = "../image/user_image/".$myMessage->rows[$i]['ID'].$myMessage->rows[$i]['picture'] ;

                                ?>
                               
                            
                              <div class="alert alert-<?php echo $box_style[$i%4]; ?> alert-dismissable" style="position: relative;">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <div style="display: inline;">
                                        <a href="../personal_page/visit_page.php" onclick="set_target(<?php echo $myMessage->rows[$i]['ID']?>)">
                                                    <img class="img-rounded" id="" style="width: 20%; display:inline; " src="<?php echo $picture; ?>" alt="<?php echo $picture; ?>"
                                                     ">
                                             </a>
                                    </div>
                                    <div style="display:block; position: absolute;left: 23%;top: 7%; width: 75%">
                                         <h4 style="">
                                                来自<strong><?php  echo $myMessage->rows[$i]['name'] ?></strong>的消息
                                            </h4> 
                                            <hr>
                                            消息内容：<?php  echo $myMessage->rows[$i]['content'] ?>
                                    </div>   
                                    <div style="display:block;position: absolute;left: 23%;bottom:  7%;width: 75%">
                                        <hr>
                                        时间：<?php  echo $myMessage->rows[$i]['time'] ?>
                                    </div>  
                                    <div style="display: inline;position: absolute;right:2%;bottom: 5%;">
                                        <button  class="btn btn-warning" role="button"  data-toggle="modal" data-target="#sent_message"   onclick="set_target(<?php echo $myMessage->rows[$i]['user1_ID']; ?>);set_name('<?php echo $myMessage->rows[$i]['name']; ?>')">回复</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-warning" data-dismiss="alert" aria-hidden="true">删除</button>
                                    </div>  
                               
                            </div>
                            <br>
                            <?php } ?>
                            </div>
                            <div class="tab-pane" id="panel-attention"><br>
                                <?php 
                                    $myAttention = new my_search('*','attention a,user u',"user1_ID = $user && a.user2_ID = u.ID ");
                                   // print_r($myAttention);
                                    for($i = 0;$i<$myAttention->num;$i++){
                                        if($myAttention->rows[$i]['picture']=='default')
                                            $picture = "../image/user_image/default";
                                        else $picture = "../image/user_image/".$myAttention->rows[$i]['ID'].$myAttention->rows[$i]['picture'] ;
                                        if($i%4==0){
                                            echo '<div class="row">';
                                            // echo '<div class="col-sm-1 col-md-1"></div>';
                                            echo '<div class="col-sm-12 col-md-12">';

                                         }
                                ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail" style="border: none;">
                                         <a href="">
                                                <img class="img-rounded" id="" style="" src="<?php echo $picture; ?>" alt="<?php echo $picture; ?>"
                                                 ">
                                         </a>
                                        <div class="caption">
                                            <h3 class="text-center"><?php echo $myAttention->rows[$i]['name'];?></h3>
                                            <!-- <p class="text-center"><?php echo $row1['content'];?></p> -->
                                            <p class="text-center">
                                                <button  data-toggle="modal" data-target="#sent_message"   onclick="set_target(<?php echo $myAttention->rows[$i]['user1_ID']; ?>);set_name('<?php echo $myAttention->rows[$i]['name']; ?>')" class="btn btn-primary" role="button" >发送消息</button>
                                                <a href="../other/delete_attention?user1=<?php echo $user; ?>&user2=<?php echo $myAttention->rows[$i]['ID']; ?>" class="btn btn-default" role="button">取消关注</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <?php if(($j+1)%4==0)echo '</div></div>'; }  
                                if($j%4!=0)echo '<br></div></div>'; ?>
                            </div>
                            <div class="tab-pane" id="panel-fan"><br>
                                <?php 
                                    $myFans = new my_search('*','attention a,user u',"user2_ID = $user && a.user1_ID = u.ID ");
                                    //print_r($myFans);

                                    for($i = 0;$i<$myFans->num;$i++){
                                            if($myFans->rows[$i]['picture']=='default')
                                                $picture = "../image/user_image/default";
                                            else $picture = "../image/user_image/".$myFans->rows[$i]['ID'].$myFans->rows[$i]['picture'] ;
                                            if($i%4==0){
                                                echo '<div class="row">';
                                                // echo '<div class="col-sm-1 col-md-1"></div>';
                                                echo '<div class="col-sm-12 col-md-12">';

                                             }
                                    ?>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="thumbnail" style="border: none;">
                                             <a href="">
                                                    <img class="img-rounded" id="" style="width: 100%;" src="<?php echo $picture; ?>" alt="<?php echo $picture; ?>"
                                                     ">
                                             </a>
                                            <div class="caption">
                                                <h3 class="text-center"><?php echo $myFans->rows[$i]['name'];?></h3>
                                                <!-- <p class="text-center"><?php echo $row1['content'];?></p> -->
                                                <p class="text-center">
                                                    <button  class="btn btn-primary" role="button"  data-toggle="modal" data-target="#sent_message"   onclick="set_target(<?php echo $myFans->rows[$i]['user1_ID']; ?>);set_name('<?php echo $myFans->rows[$i]['name']; ?>')">发送消息</button>
                                                    <a href="../other/delete_attention?user1=<?php echo $myFans->rows[$i]['ID']; ?>&user2=<?php echo $user; ?>" class="btn btn-default" role="button">移除粉丝</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if(($j+1)%4==0)echo '</div></div>'; }  
                                    if($j%4!=0)echo '<br></div></div>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 column">
                </div>
            </div>
        </div>
    </div>
    <?php include '../other/sent_message.php'; ?>
    <br>
    <br>

    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-1 column">
                </div>
                <div class="col-md-10 column">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="v3/default4.jpg" />
                                <div class="caption">
                                    <h3>
                                        Thumbnail label
                                    </h3>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                    <p>
                                         <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="v3/default5.jpg" />
                                <div class="caption">
                                    <h3>
                                        Thumbnail label
                                    </h3>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                    <p>
                                         <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="300x200" src="v3/default6.jpg" />
                                <div class="caption">
                                    <h3>
                                        Thumbnail label
                                    </h3>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                    <p>
                                         <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 column">
                </div>
            </div>
        </div>
    </div>

<?php 
	 	print_r($_COOKIE);
        if(isset($_COOKIE['page_index']))
            $page = $_COOKIE['page_index'];
        else $page = 'panel-food';
        $pagetip = $page.'-tip';
	 ?>
    <script type="text/javascript">
        document.getElementById('panel-food').className = 'tab-pane';
        document.getElementById('panel-praise').className = 'tab-pane';
        document.getElementById('panel-comment').className = 'tab-pane';
        document.getElementById('panel-collect').className = 'tab-pane';
        document.getElementById('<?php echo $page; ?>').className = 'tab-pane active';
    </script>
</body>
</html>
