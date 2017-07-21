<?php include '../link_to_food_forum.php' ?>
<?php
	$ID=$_GET['id'];
	$CID=$_GET['cid'];
	$time=$_GET['time'];
	$query1 = "update  complain set solve='1' where user_ID = '".$ID."'and carteen_ID='".$CID."' and time='".$time."';";
	mysqli_query($link, $query1);
	$user = $_GET['user'];
	header("location:../admin/admin_complain.php");
?>