<?php //include '../link_to_food_forum.php' ?>
<?php
	$carteen_name = isset($_POST['carteen_name'])?$_POST['carteen_name']:"";
	$search = isset($_POST['search'])?$_POST['search']:"";
	if($carteen_name=="")$extra_condition1="";
	else {
		$extra_condition1 = " (";
		$flag = 0;
		foreach($carteen_name as $value ){
			if($flag) $extra_condition1.= " or ";
			$carteen = new my_search("ID","carteen","name = '$value'");
			$temp = $carteen->rows[0]['ID'];
			 $extra_condition1.=" carteen_ID = '$temp' ";
			if($flag==0)$flag=1;
		}
		$extra_condition1.=")";
	}
	if($search=="")$extra_condition2="";
	else {
		$extra_condition2 = " ( name like '%$search%' or content like '%$search%' )";
	}
	if($carteen_name==""&&$search=="")$search_condition="";
	else if($carteen_name==""&&$search!="")$search_condition = "and ".$extra_condition2;
	else if($carteen_name!=""&&$search=="")$search_condition = "and ".$extra_condition1;
	else $search_condition = "and (".$extra_condition1.$extra_condition2.")";
?>