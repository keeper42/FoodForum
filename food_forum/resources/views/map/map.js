var widthFrame = 800;  
var heightFrame = 500;  
var widthMax;  
var heightMax;  
var widthMap;  
var heightMap;  
var map;  
var mapLayer;  
var centerX;  
var centerY;  
var mousex;  
var mousey;  
function init(m,ml){  
  map = m;    
  map.onmousemove = mouseMove;  
  mapLayer = ml;  
  widthMax = map.width;  
  heightMax = map.height;  
  widthMap = map.width;  
  heightMap = map.height;  
  centerX = widthMap/2;  
  centerY = heightMap/2;  
  toCenter();  
}  
function showParam(){  
  document.getElementById("widthMax").innerText=widthMax;  
  document.getElementById("heightMax").innerText=heightMax;  
  document.getElementById("widthMap").innerText=widthMap;  
  document.getElementById("heightMap").innerText=heightMap;  
  document.getElementById("centerX").innerText=centerX;  
  document.getElementById("centerY").innerText=centerY;  
  document.getElementById("mousex").innerText=mousex;  
  document.getElementById("mousey").innerText=mousey;  
}  
function toCenter(){  
  if(centerX< widthFrame/2){  
    centerX = widthFrame/2;  
  }  
  if(centerX>widthMap-widthFrame/2){  
    centerX = widthMap-widthFrame/2;  
  }  
  if(centerY< heightFrame/2){  
    centerY = heightFrame/2;  
  }  
  if(centerY> heightMap-heightFrame/2){  
    centerY = heightMap-heightFrame/2;  
  }  
  showParam();  
  mapLayer.style.left=-1*(centerX-widthFrame/2)+"px";  
  mapLayer.style.top=-1*(centerY-heightFrame/2)+"px";  
}  
function resizeTo(w,h){  
  widthMap = map.width = w;  
  heightMap = map.height = h;  
  toCenter();  
}  
function bigger(){  
  var w = widthMap*1.2;  
  if(w>widthMax){  
    w= widthMax;  
  }    
    
  var h = heightMap*1.2;  
  if(h>heightMax){  
    h = heightMax;  
  }  
  centerX = centerX*w/widthMap;  
  centerY = centerY*h/heightMap;  
  resizeTo(w,h);  
}  
function smaller(){  
  var w = widthMap*0.8;  
  var h = heightMap*0.8;  
  // 保证不会缩小到屏幕放不下了  
  if(w<widthFrame){  
    w = widthFrame;  
    h = heightMax*w/widthMax; // 保证缩放比例  
  }else if(h<heightFrame){  
    h = heightFrame;  
    w = widthMax*h/heightMax; // 保证缩放比例  
  }  
  centerX = centerX*w/widthMap;  
  centerY = centerY*h/heightMap;  
  resizeTo(w,h);  
}  
function doRightClick(){  
  var x = mousex-300;  
  var y = mousey-100;  
  if(x>widthFrame/2+50){  
    centerX+=20;  
  }else if(x<widthFrame/2-50){  
    centerX-=20;  
  }  
  if(y>heightFrame/2+50){  
    centerY += 20;      
  }else if(y<heightFrame/2-50){  
    centerY -=20;  
  }  
  toCenter();  
}  
function moveButton(x,y){  
  if(x==0 && y==0){  
    centerX = widthMap/2;  
    centerY = heightMap/2;  
  }else{  
    centerX += x;  
    centerY += y;  
  }  
  toCenter();  
}  
function mouseMove(ev){  
  ev = ev || window.event;  
  var mousePos = mouseCoords(ev);  
  mousex = mousePos.x;  
  mousey = mousePos.y;  
    //判断鼠标已被按下且onmouseover和onmousedown事件发生在同一对象上  
  if(down&&event.srcElement==obj){  
    centerX -= (mousex-x)*1;  
    centerY -= (mousey-y)*1;  
    toCenter();  
    x = mousex;  
    y = mousey;  
  }  
  showParam();  
}  
function mouseCoords(ev){  
  if(ev.pageX || ev.pageY){  
    return {x:ev.pageX, y:ev.pageY};  
  }  
  return {  
    x:ev.clientX + document.body.scrollLeft - document.body.clientLeft,  
    y:ev.clientY + document.body.scrollTop - document.body.clientTop  
  };  
}  
// 鼠标拖动效果  
var x,y,z,down=false,obj;   
function initMouseDrag(ev){  
  ev = ev || window.event;  
  obj=ev.srcElement       //事件触发对象  
  obj.setCapture()              //设置属于当前对象的鼠标捕捉  
  z=obj.style.zIndex            //获取对象的z轴坐标值  
  //设置对象的z轴坐标值为100，确保当前层显示在最前面  
  obj.style.zIndex=100  
  x=mousex     //获取鼠标指针位置相对于触发事件的对象的X坐标  
  y=mousey     //获取鼠标指针位置相对于触发事件的对象的Y坐标  
  down=true           //布尔值，判断鼠标是否已按下，true为按下，false为未按下  
  obj.style.cursor='move';  
}  
function moveit(){  
}   
function stopdrag(){  
  //onmouseup事件触发时说明鼠标已经松开，所以设置down变量值为false  
  down=false    
  obj.style.zIndex=z         //还原对象的Z轴坐标值  
  obj.releaseCapture() //释放当前对象的鼠标捕捉  
  obj.style.cursor='normal';  
}   
var scrolling = false;  
function scrollIt(){  
  if(scrolling){  
    return true;  
  }  
  scrolling = true;  
  if(event.wheelDelta>0){  
    bigger();  
  }else{  
    smaller();  
  }    
  scrolling = false;  
  event.returnValue = false;  
}