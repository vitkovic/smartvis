<head>
<style>
* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.HoverDiv {
  width:100%;
  position: relative;
  overflow-y: auto;
  overflow-x: auto;
  border:0px solid black;
  margin: 5px;
}

.HoverDiv img {
  max-width: 100%;
  text-align:center;
  -moz-transition: all 0.3s;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}

.HoverDiv:hover img {
  -moz-transform: scale(1.5);
  -webkit-transform: scale(1.5);
  transform: scale(1.5);
}

img {
    display: inline-block;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    transition: 0.3s;
  position:relative;
  z-index:1;
}

img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
   -webkit-transform: skewX(-20deg);
  -ms-transform: skewX(-20deg);
  transform: skewX(-20deg);
  -webkit-transform-origin:0 0;
  -ms-transform-origin:0 0;
  transform-origin:0 0;
}
</style>

</head>
<body>

	<div class="HoverDiv" >
	
	  <img id="myimage" src="img/nis_station_v2_zooming.png" >
	</div>
	<script>
		
		magnify("myimage", 10);
		 
	</script>
</body>
