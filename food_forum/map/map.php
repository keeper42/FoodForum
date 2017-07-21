<?php include '../link_to_food_forum.php' ?>
<!DOCTYPE html>
<html >
<head>
<meta content="text/html; charset=utf-8" />
<title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="../dist/css/bootstrap-select.css">
<link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="../dist/js/bootstrap-select.js"></script>
<script src="../js/fileinput.js" type="text/javascript"></script>
<link href="map.css" rel="stylesheet">
</head>
<body onload="mapnew()">
<nav id="nav" class="navbar navbar-default" role="navigation" style="margin: 0;position: absolute;top: 0;left: 0;width: 100%;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../overlook_food/overlook_food.php">深圳大学美食论坛</a>
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
                  <select class="selectpicker" id="select_form"  name="carteen_name[]" multiple>
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
                        $user_ID = $_COOKIE['user_ID'];
                ?>
                    <li><a href="../personal_page/personal_page.php"><span class="glyphicon glyphicon-user"></span> 我的</a></li> 
                    <li><a href="../food_post/together_eat.php"><span class="glyphicon glyphicon-heart"></span> 约饭</a></li> 
                    <li><a href="../food_post/ask_for_food.php"><span class="glyphicon glyphicon-retweet"></span> 打饭</a></li> 
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-camera"></span> 晒美食</a></li>

                    <li><a href="" data-toggle="modal" data-target="#complain"><span class="glyphicon glyphicon-comment"></span> 投诉</a></li>
                    <li><a href="../map/map.php" ><span class="glyphicon glyphicon-map-marker"></span> 地图</a></li>
                    <li><a href="../overlook_food/exit.php"><span class="glyphicon glyphicon-log-out"></span> 退出</a></li> 
                <?php include '../overlook_food/add_food.php';} ?>
                <?php include '../food_post/complain.php' ?>
                </ul> 
            </div>
     </div>
    <!-- .container-fluid -->
  </nav>
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="modal fade" id="modal-container-295092" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">
              <?php 

                  $query = "select * from carteen where ID='nanqu1'";
                  $res = mysqli_query($link,$query);
                  $dbrow = mysqli_fetch_array($res);
                  echo "食堂名称：".$dbrow['name']."<br/>";
                  echo "地点：".$dbrow['region']."<br/>";
                  echo "介绍：".$dbrow['intruduce']."<br/>";

                ?>                
              </h4>
            </div>
            <div class="modal-body">
            <h4 class="modal-title" id="myModalLabel">
            <?php 

                  $query1 = "select * from carteen where ID='nanqu2'";
                  $res1 = mysqli_query($link,$query1);
                  $dbrow1 = mysqli_fetch_array($res1);
                  echo "食堂名称：".$dbrow1['name']."<br/>";
                  echo "地点：".$dbrow1['region']."<br/>";
                  echo "介绍：".$dbrow1['intruduce']."<br/>";
                  
                ?>
            </h4>
            </div>
            <div class="modal-footer">
                           <form action="../overlook_food/overlook_food.php" method="post"> 
               <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

               <button type="submit" class="btn btn-primary" name="carteen_name[]" value="南区食堂一楼">一楼</button>
               <button type="submit" class="btn btn-primary" name="carteen_name[]" value="南区二楼食堂">二楼</button>
               </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="modal fade" id="lishan_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">
              <?php 

                  $query = "select * from carteen where ID='lishancanting'";
                  $res = mysqli_query($link,$query);
                  $dbrow = mysqli_fetch_array($res);
                  echo $dbrow['name']."<br/>";


                ?>                
              </h4>
            </div>
            <div class="modal-body">
            <h4 class="modal-title" id="myModalLabel">
            <?php 

                  echo "地点：".$dbrow['region']."<br/>";
                  echo "介绍：".$dbrow['intruduce']."<br/>";
                  
                ?>
            </h4>
            </div>
            <div class="modal-footer">
              <form action="../overlook_food/overlook_food.php" method="post"> 
               <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

               <button type="submit" class="btn btn-primary" name="carteen_name[]" value="荔山餐厅">荔山</button>
               </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="modal fade" id="shiyan_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">
              <?php 

                  $query = "select * from carteen where ID='shiyan'";
                  $res = mysqli_query($link,$query);
                  $dbrow = mysqli_fetch_array($res);
                  echo $dbrow['name']."<br/>";


                ?>                
              </h4>
            </div>
            <div class="modal-body">
            <h4 class="modal-title" id="myModalLabel">
            <?php 

                  echo "地点：".$dbrow['region']."<br/>";
                  echo "介绍：".$dbrow['intruduce']."<br/>";
                  
                ?>
            </h4>
            </div>
            <div class="modal-footer">
              <form action="../overlook_food/overlook_food.php" method="post"> 
               <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

               <button type="submit" class="btn btn-primary" name="carteen_name[]" value="实验餐厅">实验</button>
               </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <?php include '../overlook_food/register.php' ;?>
    <?php include '../overlook_food/register_success.php'; ?>
    <?php include '../search/search.php' ;?>
    <?php include '../overlook_food/register_user.php'; ?>
    <?php include '../overlook_food/register_user_save_success.php' ;?>
    
 <!--  <form class="navbar-form navbar-left"  action="../overlook_food/overlook_food.php" method="post" style="position: absolute;top: 10px;left:20px;">
      <ul class="nav navbar-nav">
      <li>
          <div class="form-group">
            <select class="selectpicker" id="select_form"  name="carteen_name[]" onchange="changeposition()">
            <option></option>
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
  </form> -->
<div id="picview" class="picview">
<script type="text/javascript">
  var nanqu = new Array(3640,2934,3841,2935,3845,2986,3865,3081,3862,3129,3684,3239,3645,3189,3580,3222,3565,3176,3731,3016,3634,2992,3630,2966)
  var lishan = new Array(2322,2089,2370,2080,2402,2079,2447,2081,2475,2085,2499,2089,2515,2097,2520,2118,2517,2131,2517,2139,2525,2149,2533,2165,2528,2195,2465,2244,2402,2167,2376,2157,2356,2161,2333,2153,2314,2142,2304,2127,2301,2110,2311,2099)
  var shiyan = new Array(2385,1975,2409,1955,2449,1945,2483,1945,2536,1945,2565,1949,2589,1960,2602,1975,2599,1996,2587,2008,2585,2016,2617,2064,2618,2079,2628,2076,2651,2109,2649,2139,2601,2166,2583,2158,2540,2172,2524,2142,2526,2127,2526,2109,2521,2100,2509,2093,2504,2090,2502,2079,2503,2062,2502,2049,2501,2040,2510,2035,2504,2027,2489,2025,2460,2025,2420,2024,2397,2010,2386,1995,2385,1989)
  var kaifeng = new Array(1327,4925,1387,4924,1393,4920,1524,4935,1520,5005,1450,5067,1423,5146,1378,5153,1368,5124,1369,5050,1359,5042,1354,5013,1319,5013,1262,5000,1254,4972,1257,4953,1279,4939)
  var chenfeng = new Array(1503,4808,1608,4807,1662,4824,1677,4844,1673,4863,1646,4883,1621,4882,1646,4911,1649,4953,1577,5022,1526,4980,1523,4923,1560,4893,1487,4890,1448,4853,1463,4821)
  var tingli = new Array(1163,2509,1220,2503,1278,2502,1309,2505,1343,2518,1361,2532,1355,2558,1345,2576,1394,2607,1402,2660,1336,2749,1250,2710,1246,2642,1274,2611,1260,2600,1261,2583,1181,2585,1151,2576,1142,2560,1136,2545,1139,2528,1151,2519)
  var wenshanhu = new Array(1990,3912,1981,3897,2085,3829,2158,3922,2173,3955,2166,3989,2127,4001,2127,4010,2102,4033,2134,4084,2132,4144,2050,4215,1997,4144,2002,4097,1943,4155,1922,4130,1919,4081,1934,4063,1925,4057,1926,3998,1897,3978,1895,3954,1902,3938,1928,3930)
  var litian = new Array(2626,2335,2604,2343,2607,2364,2590,2378,2590,2404,2612,2417,2620,2438,2644,2460,2645,2440,2651,2413,2711,2368,2700,2348,2795,2338,2823,2314,2831,2300,2814,2278,2782,2270,2754,2264,2687,2266,2637,2271,2615,2283,2610,2301,2615,2315)
</script>>
<img src="map.png" alt="Moving" name="viewArea" id="viewArea" usemap="#szu_map" onclick="my_onclick()" />
<map name="szu_map">
  <area id="nanqu" shape="poly" coords="3640,2934,3841,2935,3845,2986,3865,3081,3862,3129,3684,3239,3645,3189,3580,3222,3565,3176,3731,3016,3634,2992,3630,2966" href="#modal-container-295092" data-toggle="modal" alt="南区食堂">
  <area id="lishan" shape="poly" coords="2322,2089,2370,2080,2402,2079,2447,2081,2475,2085,2499,2089,2515,2097,2520,2118,2517,2131,2517,2139,2525,2149,2533,2165,2528,2195,2465,2244,2402,2167,2376,2157,2356,2161,2333,2153,2314,2142,2304,2127,2301,2110,2311,2099" href="#lishan_modal" data-toggle="modal" alt="荔山餐厅">
  <area id="shiyan" shape="poly" coords="2385,1975,2409,1955,2449,1945,2483,1945,2536,1945,2565,1949,2589,1960,2602,1975,2599,1996,2587,2008,2585,2016,2617,2064,2618,2079,2628,2076,2651,2109,2649,2139,2601,2166,2583,2158,2540,2172,2524,2142,2526,2127,2526,2109,2521,2100,2509,2093,2504,2090,2502,2079,2503,2062,2502,2049,2501,2040,2510,2035,2504,2027,2489,2025,2460,2025,2420,2024,2397,2010,2386,1995,2385,1989" href="#shiyan_modal" data-toggle="modal" alt="实验餐厅">
  <area id="kaifeng" shape="poly" coords="1327,4925,1387,4924,1393,4920,1524,4935,1520,5005,1450,5067,1423,5146,1378,5153,1368,5124,1369,5050,1359,5042,1354,5013,1319,5013,1262,5000,1254,4972,1257,4953,1279,4939" href="#modal-container-295092" data-toggle="modal" alt="凯风餐厅">
  <area id="chenfeng" shape="poly" coords="1503,4808,1608,4807,1662,4824,1677,4844,1673,4863,1646,4883,1621,4882,1646,4911,1649,4953,1577,5022,1526,4980,1523,4923,1560,4893,1487,4890,1448,4853,1463,4821" href="#modal-container-295092" data-toggle="modal" alt="晨风餐厅">
  <area id="tingli" shape="poly" coords="1163,2509,1220,2503,1278,2502,1309,2505,1343,2518,1361,2532,1355,2558,1345,2576,1394,2607,1402,2660,1336,2749,1250,2710,1246,2642,1274,2611,1260,2600,1261,2583,1181,2585,1151,2576,1142,2560,1136,2545,1139,2528,1151,2519" href="#modal-container-295092" data-toggle="modal" alt="听荔餐厅">
  <area id="wenshanhu" shape="poly" coords="1990,3912,1981,3897,2085,3829,2158,3922,2173,3955,2166,3989,2127,4001,2127,4010,2102,4033,2134,4084,2132,4144,2050,4215,1997,4144,2002,4097,1943,4155,1922,4130,1919,4081,1934,4063,1925,4057,1926,3998,1897,3978,1895,3954,1902,3938,1928,3930" href="#modal-container-295092" data-toggle="modal" alt="文山湖餐厅">
  <area id="litian" shape="poly" coords="2626,2335,2604,2343,2607,2364,2590,2378,2590,2404,2612,2417,2620,2438,2644,2460,2645,2440,2651,2413,2711,2368,2700,2348,2795,2338,2823,2314,2831,2300,2814,2278,2782,2270,2754,2264,2687,2266,2637,2271,2615,2283,2610,2301,2615,2315" href="#modal-container-295092" data-toggle="modal" alt="荔天餐厅">
</map>
<map name="szu_map" id="szu_map">
<area shape="rect" coords="100,200,200,200" style="border-color: red;border-width: 20px;" href="../overlook_food/overlook_food.php">
</div>
<div id="canteen">
</div>
<img class="enlarge" src="enlarge.png" onclick="enlarge()" />
<img class="narrow" src="narrow.png" onclick="narrow()" />

<script>
  var big = 0,
           imgH,//图片的高度
           imgW,//图片的宽度
           img = document.getElementsByTagName('img')[0];
           // enlarge = document.getElementsByTagName('img')[1];
           // narrow = document.getElementsByTagName('img')[2];//图片元素
           function mapnew(){
            if (window.innerWidth)
            winWidth = window.innerWidth;
            else if ((document.body) && (document.body.clientWidth))
            winWidth = document.body.clientWidth;
            // 获取窗口高度
            if (window.innerHeight)
            winHeight = window.innerHeight;
            else if ((document.body) && (document.body.clientHeight))
            winHeight = document.body.clientHeight;
            vv.style.height = (winHeight-5)+'px';
            vv.style.width = winWidth+'px';
            imgH = img.height; //获取图片的高度
            imgW = img.width; //获取图片的宽度
            img.height = imgH/2.5;
            img.width = imgW/2.5;
            var nan_qu = document.getElementById("nanqu");
            var str="";
            nan_qu.coords="";
            for(i=0;i<nanqu.length-1;i++)
            {
              nanqu[i] = nanqu[i]/2.5;
              str+=nanqu[i]+","
            }
            nanqu[i] = nanqu[i]/2.5;
            str+=nanqu[i];
            nan_qu.coords = str;
            var li_shan = document.getElementById("lishan");
            str="";
            li_shan.coords="";
            for(i=0;i<lishan.length-1;i++)
            {
              lishan[i] = lishan[i]/2.5;
              str+=lishan[i]+","
            }
            lishan[i] = lishan[i]/2.5;
            str+=lishan[i];
            li_shan.coords = str;
            var shi_yan = document.getElementById("shiyan");
            str="";
            shi_yan.coords="";
            for(i=0;i<shiyan.length-1;i++)
            {
              shiyan[i] = shiyan[i]/2.5;
              str+=shiyan[i]+","
            }
            shiyan[i] = shiyan[i]/2.5;
            str+=shiyan[i];
            shi_yan.coords = str;
            var kai_feng = document.getElementById("kaifeng");
            str="";
            kai_feng.coords="";
            for(i=0;i<kaifeng.length-1;i++)
            {
              kaifeng[i] = kaifeng[i]/2.5;
              str+=kaifeng[i]+","
            }
            kaifeng[i] = kaifeng[i]/2.5;
            str+=kaifeng[i];
            kai_feng.coords = str;
            var chen_feng = document.getElementById("chenfeng");
            str="";
            chen_feng.coords="";
            for(i=0;i<chenfeng.length-1;i++)
            {
              chenfeng[i] = chenfeng[i]/2.5;
              str+=chenfeng[i]+","
            }
            chenfeng[i] = chenfeng[i]/2.5;
            str+=chenfeng[i];
            chen_feng.coords = str;
            var ting_li = document.getElementById("tingli");
            str="";
            ting_li.coords="";
            for(i=0;i<tingli.length-1;i++)
            {
              tingli[i] = tingli[i]/2.5;
              str+=tingli[i]+","
            }
            tingli[i] = tingli[i]/2.5;
            str+=tingli[i];
            ting_li.coords = str;
            var wen_shanhu = document.getElementById("wenshanhu");
            str="";
            wen_shanhu.coords="";
            for(i=0;i<wenshanhu.length-1;i++)
            {
              wenshanhu[i] = wenshanhu[i]/2.5;
              str+=wenshanhu[i]+","
            }
            wenshanhu[i] = wenshanhu[i]/2.5;
            str+=wenshanhu[i];
            wen_shanhu.coords = str;   
            var li_tian = document.getElementById("litian");
            str="";
            li_tian.coords="";
            for(i=0;i<litian.length-1;i++)
            {
              litian[i] = litian[i]/2.5;
              str+=litian[i]+","
            }
            litian[i] = litian[i]/2.5;
            str+=litian[i];
            li_tian.coords = str;                                 
           }

  function enlarge(){
      //图片点击事件
       imgH = img.height; //获取图片的高度
       imgW = img.width; //获取图片的宽度
       if(big<10){
           //图片为正常状态,设置图片宽高为现在宽高的2倍
           big++;//把状态设为放大状态
           img.height = imgH*1.1;
           img.width = imgW*1.1;
       }
 
   }
   function narrow(){
      //图片点击事件
       imgH = img.height; //获取图片的高度
       imgW = img.width; //获取图片的宽度
       if(big>0){
           //图片为正常状态,设置图片宽高为现在宽高的2倍
           big--;//把状态设为放大状态
           img.height = imgH/1.1;
           img.width = imgW/1.1;
       }
 
   }
</script>
</body>
</html>
<script language="javascript">
var rate = 0.2;
var pp = document.getElementById("viewArea");
var vv = document.getElementById("picview");
var sel = document.getElementById("select_form");
var ie=document.all;
var nn6=document.getElementById&&!document.all;
var isdrag=false;
var y,x;
var st,sl;
function changeposition(){
  var time = big;
  if(sel.value == "荔山餐厅")
  {
    
    //通过Canvas Dom对象获取Context的对象
    var image = new Image();
    image.src = "荔山餐厅.png";//设置图片的路径
    var imgh = image.height;
    var imgw = image.width;
    imgh = imgh/2.5;
    imgw = imgw/2.5;
    var ht = 680;
    var wt = 700;
    while(time--)
    {
      ht*=1.1;
      wt*=1.1;
      imgh*=1.1;
      imgw*=1.1;

    } 
      vv.scrollLeft = wt;
      vv.scrollTop = ht;
  }
   else if(sel.value == "南区食堂一楼" || sel.value == "南区二楼食堂")
  {
    var canvasDom = document.getElementById("demoCanvas");
    //通过Canvas Dom对象获取Context的对象
    var context = canvasDom.getContext("2d");
    var image = new Image();//创建一张图片
    image.src = "南区.png";//设置图片的路径
    var imgh = image.height;
    var imgw = image.width;
    imgh = imgh/2.5;
    imgw = imgw/2.5;
    var ht = 1000;
    var wt = 1200;
    while(time--)
    {
      ht*=1.1;
      wt*=1.1;
      imgh*=1.1;
      imgw*=1.1;

    }
      image.height = imgh;
      image.width = imgw;
      context.drawImage(image,wt,ht);
      vv.scrollLeft = wt;
      vv.scrollTop = ht;
  }
}
function moveMouse(e) {
 if (isdrag) {
 var mouseX = nn6 ? e.clientX : event.clientX;
 var mouseY = nn6 ? e.clientY : event.clientY;
 
 vv.scrollTop = st+(y-mouseY);
 vv.scrollLeft = sl+(x-mouseX);
 return false;
 }
}

function initDrag(e) {
 var oDragHandle = nn6 ? e.target : event.srcElement;
 isdrag = true;
 x = nn6 ? e.clientX : event.clientX;
 y = nn6 ? e.clientY : event.clientY;
 
 st = vv.scrollTop;
 sl = vv.scrollLeft;
 pp.style.cursor = "url(closedhand.cur),auto";
 document.onmousemove = moveMouse;
 return false;
}
pp.onmousedown=initDrag;
pp.onmouseup=new Function("isdrag=false;pp.style.cursor=\"url(openhand.cur),auto\";");
pp.onmousewheel = function(){
  var zoom = event.wheelDelta;
  var i;
  if(zoom>0)
  {
    i = zoom/120;
    while(i--)
      enlarge();
  }
  else
  {
    i = -zoom/120;
    while(i--)
      narrow();
  }
}

</script>