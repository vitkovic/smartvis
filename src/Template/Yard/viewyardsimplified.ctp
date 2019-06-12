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

 


<div class="container-fluid" >
  <div class="row">
       <div class="col-sm-12">
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
    
    
     var siding, sidingLength, X0, X1;
   // draw wagons 
    <?php foreach ($wagons_sidings as $key=>$value):  ?>
    
    
     siding = s.select("#<?php echo $key ?>");
       sidingLength = siding.getTotalLength();
       sdattr = siding.attr('d').split(" ");
       start = sdattr[1].split(",");
       X0 = start[0];
       Y0 = start[1];
       
       var wagonStartX = X0, wagonStartY = Y0;
       var sidingScale;
      console.log(sdattr);
      
       
        <?php foreach ($value as $wagon):  ?>
          var sdlength = null;
          sdlength = "<?php echo $wagon['Siding_lenght']; ?>";
          if (sdlength != null && sdlength !="") {
            sidingScale = sidingLength / Number(sdlength);
       	   // console.log(sdlength);
            var r = s.rect(Number(wagonStartX),Number(wagonStartY), Number("<?php echo $wagon['Wagon_Lenght'];?>") * sidingScale ,2);
		    r.attr('fill', '#ffff0'+"<?php echo $wagon['Position'];?>"); 
		   }  
		   
		 mapMatrix.append(r); 
		// mapMatrix.append(text); 
		 wagonStartX = Number(wagonStartX) + Number(<?php echo $wagon['Wagon_Lenght'];?>) * sidingScale+10;
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
  a=10,b=0;
  break;
  case "right":
  a=-10,b=0;
  break;
  case "top":
  a=0,b=-10;
  break;
  case "down":
  a=0,b=10;
  break;
}
//console.log(butt);
myMatrix.translate(a,b);
mapMatrix.animate({ transform: myMatrix.toTransformString() },10);
}

function zoom(e)
{

var butt = e.srcElement.id;
console.log(butt)
switch (butt) {
 case "zin":
 a=0.90;
 break;
 case "zout":
 a=1.1;
 break;
}
myMatrix.scale(a);
mapMatrix.animate({ transform: myMatrix.toTransformString() },10);
}

};

  </script>


</body>
</html>
