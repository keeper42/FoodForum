<?php include '../link_to_food_forum.php' ?>
<?php 
    $user = $_COOKIE['sent_message_target_ID'];
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

                 obj.style.height = obj.width+'px';

             }     
        document.cookie = 'now_path' + "="+ '../personal_page/visit_page.php' + ";path=/";
    </script>
</head>
<body>

    <?php include '../overlook_food/register.php' ;?>
    <?php include '../overlook_food/register_success.php'; ?>
    <?php include '../search/search.php' ;?>
    <?php include '../overlook_food/register_user.php'; ?>
    <?php include '../overlook_food/register_user_save_success.php' ;?>
    <?php include '../other/sent_message.php' ?>
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
                ?>
                    <li><a href="../personal_page/personal_page.php"><span class="glyphicon glyphicon-user"></span> 我的</a></li> 
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
                            <a  ><img width="90%" alt="<?php echo $picture;?>" src="<?php echo $picture;?>" class="img-circle" style="margin: 5%;" /></a>
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
    

    <div class="container" style="position: relative;">
        <br><h2><?php echo $userinfo->rows[0]['name']; ?>发布过的美食</h2>
        <div style="position: absolute;right: 2%;bottom: 40px;">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#sent_message"  onclick="attention_change(this)" >发消息</button>
            <a href="../other/attention_save.php"><button type="button" class="btn btn-warning" id="is_attention"  onclick="attention_change(this)" >加为关注</button></a>  

        </div>
        
        <hr>
    </div>
    <div class="container">
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
                                           
                                        </div>
                                    </div>
                                        
                                <?php 
                                    if($i%2!=0)echo "</div>";
                                    }
                                    if($i%2!=0)echo "</div>";
                                 ?>
    </div>
    <?php 
       
        $visit_ID = $_COOKIE['user_ID'];
        $attention = new my_search('*','attention',"user1_ID = '".$visit_ID."' && user2_ID = '$user'");
        
        if($attention->num==1){
            ?>
            <script type="text/javascript">
                document.getElementById('is_attention').innerHTML = '取消关注';
            </script>
            <?php
        }
        else {
            ?>
            <script type="text/javascript">
                document.getElementById('is_attention').innerHTML = '加为关注';
            </script>
            <?php
            echo "<br><br>";
            
        }
    ?>
    <script type="text/javascript">
        document.getElementById('sent_message_target_name').innerHTML = "<?php echo $userinfo->rows[0]['name']; ?>" ;
    </script>
    </body>
</html>