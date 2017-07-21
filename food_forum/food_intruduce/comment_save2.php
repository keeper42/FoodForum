<?php
	$grade = isset($_POST['grade'])?$_POST['grade']:0;
	setcookie('grade',$grade,time()+3600,'/');
?>