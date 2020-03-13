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
          <object id="marshallingyard" type="image/svg+xml" data="<?php echo $this->Url->build('/img/working.svg', true); ?>">
          Your browser does not support SVG
          </object>

      </div>
  </div>
  <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h5>Wagons:</h5>
            <ul>
              <li class="list-group-item">Wagons: <?= $wagonsnum; ?></li>
              <li class="list-group-item">Mailfunction wagons: <?= $wagonserror; ?></li>
              
            </ul>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h5>Locomotives</h5>
            <ul>
              <li class="list-group-item">Shunting locomotives: 1</li>
              <li class="list-group-item">Locomotives: <?= $loc; ?></li>
              </ul>
          </div>
        </div>
        
      
	<div class="col-sm-3">
          <div class="well">
            <h5>Workers</h5>
            <ul>
              <li class="list-group-item">Operators per function: <?= $opfun; ?></li>
              <li class="list-group-item">Operators at workplace: <?= $opwp; ?></li>
              </ul>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h5>Sidings</h5>
            <ul>
              <li class="list-group-item">Receiving: 9</li>
              <li class="list-group-item">Classification-departure: 19</li>
              </ul>
          </div>
        </div>
        
     
 </div>
</div>
<script>
window.onload = function () {
    $( "#s1" ).on( "click", function(){   $( "#opener" ).click(); } );


    var s = Snap(Snap("#marshallingyard").node); //wrap the element
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


var myMatrix = new Snap.Matrix();
var mapMatrix = s.select("#map-matrix");

var a = 1500, b = 0;
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
  a=1500,b=0;
  break;
  case "right":
  a=-1500,b=0;
  break;
  case "top":
  a=0,b=-1500;
  break;
  case "down":
  a=0,b=1500;
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
    a=1500,b=0;
    break;
    case 97:
    a=-1500,b=0;
    break;
    case 119:
    a=0,b=-1500;
    break;
    case 115:
    a=0,b=1500;
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
