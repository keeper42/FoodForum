<?php
	if(!empty($_COOKIE['register_success']))$is_register = $_COOKIE['register_success'];
    else $is_register=0;
    echo $is_register;
?>