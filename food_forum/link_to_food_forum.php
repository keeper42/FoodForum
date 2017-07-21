<?php
	$username='root';
	$password='384701754';
	$hostname = "localhost"; //主机名,可以用IP代替
	$database = "food_forum"; //数据库名
 	$link = mysqli_connect($hostname, $username, $password,$database);
 	mysqli_query($link,"set names 'utf8'");

 	class my_search{
 		public $table;
 		public $codition = null;
        public static $link;
        public $num = 0;
        public $rows =array();
        public $success = true;
        public $query;
 		public function __construct($select,$table,$condition = null,$other = ""){
 			$this->table=$table;
            if($condition != null)
 			    $this->condition=" where ".$condition;
            else $this->condition = "";
            $this->query = "select ".$select." from ".$this->table.$this->condition."".$other;
            $result = mysqli_query($this::$link,$this->query);
            if($result==null) $this->success=false;
            else {
                $this->num = $num = mysqli_num_rows($result);
                for($i=0;$i<$num;$i++){
                    $row = mysqli_fetch_assoc($result);
                    array_push($this->rows, $row);
                }
           }
 		}
        
 	};
     my_search::$link = $link;    
    date_default_timezone_set("Asia/Shanghai");



    
  
?>




