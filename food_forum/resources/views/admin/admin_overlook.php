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
	<div class="row clearfix">
		<div class="col-md-12 column">

			<table class="table table-hover"style="color:white;text-align:front;">
				<thead>
					<tr>
						<th>
							ID
						</th>
						<th>
							昵称
						</th>
						<th>
							身份
						</th>
						<th>
							Credit
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($i=0; $i<$rownum; $i++){
					$row = mysqli_fetch_assoc($result);
					?>
						<tr>
						<td>
							<?php echo $row['ID']; ?>
						</td>
						<td>
							<?php echo $row['name']; ?>
						</td>
						<td>
							<?php if($row['admin']==1)
									echo "管理员";
								else
									echo "普通用户";
							 ?>
						</td>
						<td>
							<?php echo $row['credit']; ?>
						</td>
						<td>
							<a href="edit_page_admin.php?id=<?php echo $row['ID'] ?>"><button type="button" class="btn btn-default">进入他/她的主页
						</td>
						<td>
							<a href="delete.php?id=<?php echo $row['ID'] ?>"><button type="button" class="btn btn-default">删除
						</td>
						<td>
							<a href="update_user.php?id=<?php echo $row['ID'] ?>"><button type="button" class="btn btn-default">设为管理员
						</td>
					</tr>
					<?php } ?>

				</tbody>
			</table> </button>
		</div>
	</div>
</div>
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
</body>
</html>
	
