<?php
	$username='root';
	$password='205113';
	$hostname = "localhost"; //主机名,可以用IP代替
	$database = "food_forum"; //数据库名
 	$link = mysqli_connect($hostname, $username, $password,$database);
 	mysqli_query($link,"set names 'utf8'");
	$query = "select * from user;";
 	$result=mysqli_query($link, $query);	
 	$rownum = mysqli_num_rows($result);	
?>
<?php
	$ID=$_GET['id'];
	$query1 = "delete from user where ID = '".$ID."';";
	print_r($query1);
	mysqli_query($link, $query1);
	header("location:admin_overlook.php");
?>