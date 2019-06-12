<!DOCTYPE html>
<html lang="en">
<head>
  <title>SMART Vizualization Simulation</title>
  <meta charset="utf-8">
  
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php echo $this->Html->script('/js/dist/snap.svg-min.js',array('inline' => false)); ?>


  
</head>
<body>

 


<div class="container-fluid" style="width:100%;background-color:white">
  <div class="row">
       <div  class="col-sm-12" style="margin:0;padding:0;">
          <object id="marshallingyard" type="image/svg+xml" data="<?php echo $this->Url->build('/img/nis_station_elements.svg', true); ?>">
          Your browser does not support SVG
          </object>

      </div>
  </div>
  

 
</div>
<script>
window.onload = function () {
 var myMatrix
 var mapMatrix;
 var s;
 var wagonArr = new Array();





    $( "#s1" ).on( "click", function(){   $( "#opener" ).click(); } );


    s = Snap(Snap("#marshallingyard").node); //wrap the element
    mapMatrix = s.select("#map-matrix");
    var siding, sidingLength, X0, X1,wgcolor;
   // draw wagons 
    <?php foreach ($wagons_sidings as $key=>$value):  ?>
    
    
     siding = s.select("#<?php echo $key ?>");
       sidingLength = siding.getTotalLength();
       sdattr = siding.attr('d').split(" ");
       start = sdattr[1].split(",");
       X0 = start[0];
       Y0 = start[1];
       
       var wagonStartX = X0, wagonStartY = Y0;
       var sidingScale, wagonWidth=2;
      console.log(sdattr);
      
       wgcolor = "#"+((1<<24)*Math.random()|0).toString(16);
       
        <?php foreach ($value as $wagon):  ?>
          
          var sdlength = null;
          sdlength = "<?php echo $wagon['Siding_lenght']; ?>";
          if (sdlength != null && sdlength !="") {
            sidingScale = sidingLength / Number(sdlength);
       	   // console.log(sdlength);
            var r = s.rect(Number(wagonStartX),Number(wagonStartY)-wagonWidth/2, Number("<?php echo $wagon['Wagon_Lenght'];?>") * sidingScale ,wagonWidth);
		    r.attr('fill', wgcolor); 
		  
		  	var text = s.text(Number(wagonStartX),Number(wagonStartY)-wagonWidth/2,'<?php echo $wagon['Description']?>')
        	   text.attr({
        		 	'font-size':1
      			});
		
		  
		  
		   }  
		   
		 mapMatrix.append(r); 
		 mapMatrix.append(text); 
		 wagonStartX = Number(wagonStartX) + Number(<?php echo $wagon['Wagon_Lenght'];?>) * sidingScale+1;
	   <?php endforeach; ?>
      
    
    
    <?php endforeach; ?>
   
      
   
    
 
mapMatrix = s.select("#map-matrix");
myMatrix = mapMatrix.transform().localMatrix;

var a = 10, b = 0;
var left = s.select("#left");
left.click(pan);
var right = s.select("#right");
right.click(pan);
var top = s.select("#top");
top.click(pan);
var down = s.select("#down");
down.click(pan);



var zoomplus = s.select("#zin");
zoomplus.click(zoom);
var zoomminus = s.select("#zout");
zoomminus.click(zoom);

function pan(e)
{
var butt = e.srcElement.id;
switch (butt) {
  case "left":
  a=30,b=0;
  break;
  case "right":
  a=-30,b=0;
  break;
  case "top":
  a=0,b=-30;
  break;
  case "down":
  a=0,b=30;
  break;
}
var localMatrix = mapMatrix.transform().localMatrix;
//console.log(localMatrix);
myMatrix = localMatrix;
//console.log(butt);
myMatrix.translate(a,b);
mapMatrix.animate({ transform: myMatrix.toTransformString() },10);
mapMatrix.transform(myMatrix.toTransformString());
localMatrix = mapMatrix.transform().localMatrix;
}

function zoom(e)
{

var butt = e.srcElement.id;

switch (butt) {
 case "zin":
 a=0.95;
 break;
 case "zout":
 a=1.1;
 break;
}
var localMatrix = mapMatrix.transform().localMatrix;
//console.log(localMatrix);
myMatrix = localMatrix;
myMatrix.scale(a);
mapMatrix.animate({ transform: myMatrix.toTransformString() },10);
mapMatrix.transform(myMatrix.toTransformString());
localMatrix = mapMatrix.transform().localMatrix;
//console.log(localMatrix);
}

$(window).keypress(function(e){
  console.log( "Handler for .keypress() called.");
  var s;
  switch (e.which) {
    case 100:
    a=10,b=0;
    break;
    case 97:
    a=-10,b=0;
    break;
    case 119:
    a=0,b=-10;
    break;
    case 115:
    a=0,b=10;
    break;
    case 109:
    s=0.9;
    break;
    case 110:
    s=1.1;
    break;
  }
  
  var localMatrix = mapMatrix.transform().localMatrix;
//console.log(localMatrix);
myMatrix = localMatrix;
//console.log(localMatrix);
  
  
    if (typeof s == 'undefined')
      myMatrix.translate(a,b);
    else {
     myMatrix.scale(s);
    }
    
   mapMatrix.animate({ transform: myMatrix.toTransformString() },10);

mapMatrix.transform(myMatrix.toTransformString());
localMatrix = mapMatrix.transform().localMatrix;
});

$("#marshallingyard").keypress(function(e){
  console.log( "Handler for .keypress() called.");
  var s;
  switch (e.which) {
    case 100:
    a=30,b=0;
    break;
    case 97:
    a=-30,b=0;
    break;
    case 119:
    a=0,b=-30;
    break;
    case 115:
    a=0,b=30;
    break;
    case 109:
    s=0.9;
    break;
    case 110:
    s=1.1;
    break;
  }
  
  var localMatrix = mapMatrix.transform().localMatrix;
//console.log(localMatrix);
myMatrix = localMatrix;
//console.log(localMatrix);
  
  
    if (typeof s == 'undefined')
      myMatrix.translate(a,b);
    else {
     myMatrix.scale(s);
    }
    
   mapMatrix.animate({ transform: myMatrix.toTransformString() },10);

mapMatrix.transform(myMatrix.toTransformString());
localMatrix = mapMatrix.transform().localMatrix;
});


  };

  </script>


</body>
</html>
