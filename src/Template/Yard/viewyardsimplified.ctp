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

 


<div class="container-fluid" style="width:100%">
  <div class="row">
       <div class="col-sm-12">
          <object id="marshallingyard" type="image/svg+xml" data="<?php echo $this->Url->build('/img/nis_station_v2.svg', true); ?>">
          Your browser does not support SVG
          </object>

      </div>
  </div>
  <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h5>Curent trains:</h5>
            <ul>
              <li class="list-group-item">Incoming: 2</li>
              <li class="list-group-item">Outgoing: 4</li>
              <li class="list-group-item">On Hold: 1</li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h5>Curent wagons:</h5>
            <ul>
              <li class="list-group-item">Distributed: 124</li>
              <li class="list-group-item">Broken: 5</li>
              <li class="list-group-item">On Service: 7</li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h5>People:</h5>
            <ul>
              <li class="list-group-item">Active: 50</li>
              <li class="list-group-item">Teams: 10</li>
              <li class="list-group-item">Out: 7</li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h5>Possible deviations:</h5>
            <ul>
              <li class="list-group-item">Train delay: 3</li>
              <li class="list-group-item">Lack of workers: 2</li>
              <li class="list-group-item">Locomotive regular service: 1</li>
            </ul>
          </div>
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
    <?php foreach ($wagons as $wagon):  ?>
		wagonArr.push({'ID_wagon':'<?php echo $wagon['ID_wagon']?>','label':'<?php echo $wagon['label']?>','position':'<?php echo $wagon['position']?>'});
 		 var siding = s.select("#<?php echo $wagon['label']?>");
 		 var pos = siding.attr("d").split(" ");
 		 var start = pos[1];
 		 var startcoord = start.split(",");
 		 console.log(startcoord);
 		 var r = s.rect(Number(startcoord[0])+<?php echo $wagon['position']*10?>,Number(startcoord[1])+<?php echo substr($wagon['label'],1,1)?>,10 +<?php echo $wagon['Wagon_Lenght']?> ,2);
		 r.attr('fill', 'red'); 
		 mapMatrix.append(r); 
		 console.log('startcoord[0]+<?php echo $wagon['position']*10?>,startcoord[1]+<?php echo substr($wagon['label'],1,1)?>,10 +<?php echo $wagon['Wagon_Lenght']?> ,2')
 	<?php endforeach; ?>
    
   
    
  //  console.log(s);
    function hide() {
      var incoming = s.select("#incoming");
      incoming.attr({visibility:"hidden"});
    }
    function show() {
      var onseparation = s.select("#separation");
      onseparation.attr({visibility:"visible"});
    }
    function scaleS(){

//      s.attr({width:5000});
      console.log(s);
    }

//  setTimeout(function(){   $( "#opener" ).click(); }, 3000);

$( "#dialog" ).dialog({

autoOpen: false,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
},
modal: true,
buttons: {
"PLACE IT": function() {
hide();
show();
scaleS();
$( this ).dialog( "close" );

}
}
});

$( "#opener" ).on( "click", function() {
$( "#dialog" ).dialog( "open" );
});


myMatrix = new Snap.Matrix();
mapMatrix = s.select("#map-matrix");

var a = 50, b = 0;
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
  a=50,b=0;
  break;
  case "right":
  a=-50,b=0;
  break;
  case "top":
  a=0,b=-50;
  break;
  case "down":
  a=0,b=50;
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
 a=1.2;
 break;
}
myMatrix.scale(a);
mapMatrix.animate({ transform: myMatrix.toTransformString() },10);
}

$(document).keypress(function(e){
  console.log( "Handler for .keypress() called.");
  var s;
  switch (e.which) {
    case 100:
    a=100,b=0;
    break;
    case 97:
    a=-100,b=0;
    break;
    case 119:
    a=0,b=-100;
    break;
    case 115:
    a=0,b=100;
    break;
    case 109:
    s=0.9;
    break;
    case 110:
    s=1.1;
    break;
  }
    if (typeof s == 'undefined')
      myMatrix.translate(a,b);
    else {
      myMatrix.scale(s);
    }
  mapMatrix.animate({ transform: myMatrix.toTransformString() },10);

});




  };

  </script>


</body>
</html>
