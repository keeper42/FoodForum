
<?php include '../link_to_food_forum.php' ?>
<?php
	  $id = $_POST['id'];
	  $name=$_POST['name'];
	  $region = $_POST['region'];
	  $grade = $_POST['grade'];
	  $santiation = $_POST['santiation'];
	  $intruduce = $_POST['intruduce'];
	$query = "INSERT INTO `carteen` (`ID`, `name`, `region`, `intruduce`, `grade`, `santiation`) VALUES ('".$id."', '".$name."', '".$region."', '".$intruduce."','".$grade."', '".$santiation."');";
	echo $query."<br>";
	mysqli_query($link,$query);

	foreach ($_FILES["carteen_picture"]["error"] as $key => $error) {
	    
	        move_uploaded_file($_FILES["carteen_picture"]["tmp_name"][$key],
	      "../image/carteen_picture/".$id.$_FILES["carteen_picture"]["name"][$key]);
	      echo "Stored in: " ."../image/carteen_picture/".$id.$_FILES["carteen_picture"]["name"][$key];

	      $query = "INSERT INTO `carteen_picture` (`carteen_ID`, `picture`, `intruduce`) VALUES ('".$id."','".$id.$_FILES["carteen_picture"]["name"][$key]."','".$name."');";
			echo $query."<br>";
			//setcookie('success_add_food',true,time()+3600,'/');
			mysqli_query($link,$query);

	    
	}
	echo $query;
	header("location:admin_carteen.php");
?>