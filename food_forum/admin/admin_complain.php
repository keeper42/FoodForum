<?php
    $username='root';
    $password='384701754';
    $hostname = "localhost"; //主机名,可以用IP代替
    $database = "food_forum"; //数据库名
    $link = mysqli_connect($hostname, $username, $password,$database);
    mysqli_query($link,"set names 'utf8'");
    $query = "select * from user;";
    $result=mysqli_query($link, $query);    
    $rownum = mysqli_num_rows($result); 
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
    <style type="text/css">
        body{
            margin:0;
        }
        video{
            position: fixed;
            right:0;
            bottom:0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -9999;
        }
    </style>
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
    <video autoplay loop style="widows:100%;">
        <source  src="The-Poyke.mp4" >
    </video>
    <!-- nav导航条 -->
    

<div class="container" style="margin-top: 80px;">
    <h1 align="center"><strong style="color: white;">欢迎来到管理者界面</strong></h1>
                    <div class="tab-pane" id="panel-complain"><br>
                    <?php 
                        $query2= "select * from complain;";
                        $result2=mysqli_query($link, $query2);    
                        $rownum2 = mysqli_num_rows($result2);
                    ?>

                    <div class="row clearfix">
                        <div class="col-md-12 column">

                            <table class="table table-hover">
                                <thead>
                                    <tr style="color: white;">
                                        <th>
                                            用户ID
                                        </th>
                                        <th>
                                            食堂名称
                                        </th>
                                        <th>
                                            菜式名称
                                        </th>
                                        <th>
                                            类型
                                        </th>
                                        <th>
                                            原因
                                        </th>
                                        <th>
                                            时间
                                        </th>
                                        <th>
                                            内容
                                        </th>
                                        <th>
                                            具体图片
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
                                        <tr style="color: white">
                                        <td>
                                            <?php echo $row2['user_ID']; ?>
                                        </td>
                                        <td>
                                            <?php
                                                $query3 = "SELECT * from carteen WHERE ID='".$row2['carteen_ID']."';";
                                                $row3 = mysqli_fetch_assoc(mysqli_query($link,$query3));
                                                
                                            echo $row3['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['food_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['type']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['simple_reason']; ?>
                                        </td>

                                        <td>
                                            <?php echo $row2['time']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['content']; ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($row2['picture']!="")
                                                {
                                                    echo "<img id=\"img".$i."\" onclick=\"img_enlarge(".$i.")\" style=\"width:40px;\" src=\"../image/complain_image/".$row2['user_ID']."".$row2['picture']."\">";
                                                }
                                                else
                                                    echo "暂无图片";
                                            ?>
                                            
                                        </td>
                                        <td>
                                            <?php 
                                            if($row2['solve']==1)
                                            echo "已处理";
                                            else
                                            echo "未处理" ?>
                                        </td>
                                        <td>
                                            <a href="update.php?id=<?php echo $row2['user_ID']."&cid=".$row2['carteen_ID']."&time=".$row2['time']."&user=".$row2['user_ID']?>"><button type="button" class="btn btn-default" <?php if($row2['solve']) echo "disabled=\"disabled\" >已处理"; else echo ">处理" ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </table> </button>
                        </div>
                    </div>

                               
                </div>
    </div>
    

    <script type="text/javascript">
        var flag = 1;
        
        function img_enlarge(obj)
        {
            var img = document.getElementById("img"+obj);
            if(flag)
            {
                img.style.width = "100%";
                flag = 0;
            }
            else
            {
                flag = 1;
                img.style.width = "40px";
            }
        }
    </script>
    <nav class="navbar navbar-default" role="navigation" style="margin: 0;position: absolute;top: 0;width: 100%;">
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

                <form class="navbar-form navbar-left"  action="" method="post">
                    <ul class="nav navbar-nav">
                    <li>
                        
                    </li>
                    <li>
                        <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="搜索用户" name="q">

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
</body>
</html>



