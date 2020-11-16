<!DOCTYPE html>
<html lang="en">
<head>
<script>
var mapMatrix;
</script>
  <title>SMART Vizualization Simulation</title>
  <meta charset="utf-8">
  
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php echo $this->Html->script('/js/dist/snap.svg-min.js',array('inline' => false)); ?>


  
</head>
<body>


<div class="container-fluid" id="yard">
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

 var s;
 var wagonArr = new Array();


 var wagoncolors = ["#04ab52", "#0e5c3b", "#022639", "#023c05", "#024f62", "#0f2449", "#0b2595", "#06d972", "#02e052", "#0408f2", "#01b5c1", "#06e2af", "#02962c", "#0cd7b8", "#0e9b82", "#0da288", "#027191", "#09aebd", "#092fc1", "#0afe7c", "#061529", "#072c6f", "#062cc8", "#034c6c", "#0138c5", "#0a198b", "#0384aa", "#043874", "#0e2e9a", "#041ab8"]


    $( "#s1" ).on( "click", function(){   $( "#opener" ).click(); } );


    s = Snap(Snap("#marshallingyard").node); //wrap the element
    mapMatrix = s.select("#map-matrix");
    
    
     var siding, sidingLength, X0, X1,wgcolor;
   // draw wagons 
     var i = 0;
     
    <?php foreach ($wagons_sidings as $key=>$value):  ?>
    	//console.log($key);
       siding = s.select("#<?php echo $key ?>");
       sidingLength = siding.getTotalLength();
      
       sdattr = siding.attr('d').split(" ");
       start = sdattr[1].split(",");
       X0 = start[0];
       
       Y0 = start[1];
       
       var wagonStartX = X0, wagonStartY = Y0;
       var sidingScale, wagonWidth=2;
      //console.log(sdattr);
      
     //  wgcolor = "#"+((1<<24)*Math.random()|0).toString(16);
     
        <?php foreach ($value as $wagon):  ?>
          
          var sdlength = null;
          sdlength = "<?php echo $wagon['Siding_lenght']; ?>";
          if (sdlength != null && sdlength !="") {
            sidingScale = sidingLength / Number(sdlength);
            idw = "<?php echo $wagon['ID_wagon']; ?>";
            // console.log(idw + "  " + sidingLength + "  " + " " + sdlength+ " " + sidingScale);
       	   // console.log(sdlength);
            var r = s.rect(Number(wagonStartX),Number(wagonStartY)-wagonWidth/2, Number("<?php echo $wagon['Wagon_Lenght'];?>") * sidingScale ,wagonWidth);
		    r.attr('fill', wagoncolors[i]); 
		  
		  	var text = s.text(Number(wagonStartX),Number(wagonStartY)-wagonWidth/2,'<?php echo $wagon['Description']?>')
        	   text.attr({
        		 	'font-size':1
      			});
		
		  
		  
		   }  
		   
		 mapMatrix.append(r); 
		 mapMatrix.append(text); 
		 wagonStartX = Number(wagonStartX) + Number(<?php echo $wagon['Wagon_Lenght'];?>) * sidingScale+1;
	     
	   <?php endforeach; ?>
      
       i++;
    
    <?php endforeach; ?>
   
      
   
    
 

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
		window.focus();
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
		window.focus();
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

$(document).keypress(function(e){
  //console.log( "Handler for .keypress() called.");
  
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
	myMatrix = localMatrix;
  if (typeof s == 'undefined')
      myMatrix.translate(a,b);
    else {
     myMatrix.scale(s);
    }
    
   mapMatrix.animate({ transform: myMatrix.toTransformString() },10);

   mapMatrix.transform(myMatrix.toTransformString());
	localMatrix = mapMatrix.transform().localMatrix;
});


  </script>


</body>
</html>
