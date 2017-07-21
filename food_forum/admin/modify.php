<?php include '../link_to_food_forum.php' ?>
<?php
  $i = $_GET['i'];
  $id=$_GET['id'];
  $name=$_POST['name'.$i];
  $region = $_POST['region'.$i];
  $grade = $_POST['grade'.$i];
  $santiation = $_POST['santiation'.$i];
  $intruduce = $_POST['intruduce'.$i];
  $query="UPDATE `carteen` SET `name` = '".$name."', `region` = '".$region."', `grade` = ".$grade.", `santiation` = ".$santiation.", `intruduce` = '".$intruduce."' WHERE `id` = '".$id."';";
  echo $query;
  $result=mysqli_query($link,$query);
  if($result ) header("location:admin_carteen.php"); 
 ?>