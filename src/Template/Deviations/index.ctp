<!DOCTYPE html>
<html lang="en">
<head>
<style>
/* The container */
.container {
  display: block;
  position: relative;
  margin-left:0;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 6px;
	left: 6px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
<script>
var mapMatrix;

 

</script>
  <title>SMART Vizualization Simulation</title>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php echo $this->Html->script('/js/dist/snap.svg-min.js',array('inline' => false)); ?>


  
</head>
<body>

 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Train & Infrastructure</a></li>
    <li><a href="#tabs-2">People</a></li>
    <li><a href="#tabs-3">Other</a></li>
  </ul>
  <div id="tabs-1">
   <table border=0 width="100%">
   <tr> 
    <td width="40%">
			 <label class="container">Time Deviation for Incoming train
			  <input type="radio" id="radiotrain1" name="radiotrain" value="time" checked="checked">
			  <span class="checkmark"></span>
			</label>
			
			<label class="container">Vagon mailfunction
			  <input type="radio" id="radiotrain2" name="radiotrain" value="wagon">
			  <span class="checkmark"></span>
			</label>
			
			<label class="container">Other
			  <input type="radio" id="radiotrain3" name="radiotrain" value="other">
			  <span class="checkmark" ></span>
			</label>
	 </td>
	 <td>
			<div id="timetablediv" class="timetablediv" >
					<div class="timetable">
					    <h4 align="center"><?= __('Timetable') ?></h4>
					    <table cellpadding="0" cellspacing="0">
					        <thead>
					            <tr>
					                <th scope="col">Source</th>
					                <th scope="col">Destination</th>
					                <th scope="col">Arrival_Date</th>
					                <th scope="col">Dispatch_Date</th>
					                <th scope="col">Arrival_Time</th>
					                <th scope="col">Dispatch_Time</th>
					                <th scope="col">ID_Timetable</th>
					            </tr>
					        </thead>
					        <tbody>
					            <?php foreach ($timetable as $timetable): ?>
					            <tr>
					                <td><?php echo $timetable['Source'] ?></td>
					                <td><?php echo $timetable['Destination'] ?></td>
					                <td><?php echo $timetable['Arrival_Date'] ?></td>
					                <td><?php echo $timetable['Dispatch_Date'] ?></td>
					                <td><?php echo $timetable['Arrival_Time'] ?></td>
					                <td><?php echo $timetable['Dispatch_Time'] ?></td>
					                <td><?php echo $timetable['ID_Timetable'] ?></td>
					               
					            </tr>
					            <?php endforeach; ?>
					        </tbody>
					    </table>
					  </div>
			<div>
		 </td>
		</tr>
	</table>	
  </div>
  <div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
 </div>

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

 $("input[name='radiotrain']").click(function () {
 	$('#timetablediv').fadeToggle();
});
 $( function() {
    $( "#tabs" ).tabs();
  } );

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
