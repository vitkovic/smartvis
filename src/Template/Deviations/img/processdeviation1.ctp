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

<div class="d-flex p-2" style="flex-direction: column;flex-wrap: wrap;margin:10px;border:1px solid black;">
<h2>Possible solutions</h2>
<h4>Option 1: <br>
First processing train 44707, second 56921: <br>
44707 processed at 18:58; 56921 dispatch at 20:13; 45003 dispatch at 21:18.<br>
<hr>
Option 2:
First processing train 44707, second 45003: <br>
44707 processed at 18:58; 45003 dispatch at 20:13; 56921 dispatch at 21:18.<br>
<hr>
Option 3: 
First processing train 56921, second 44707: <br>
56921 dispatch at 17:55; 44707 processed at 20:03; 45003 dispatch at 20:08.<br>
<hr>
Option 4:
First processing train 56921, second 45003: <br>
56921 dispatch at 17:55; 44707 dispatch at 19:00; 45003 processed at 21:08.<br>
<hr>
Option 5: 
First processing train 45003, second 56921: <br>
45003 dispatch at 18:30 (no deviation); 56921 dispatch at 19:35; 44707 dispatch at 21:43.<br>
<hr>
Option 6: 
First processing train 45003, second 44707: <br>
45003 dispatch at 18:30 (no deviation); 44707 processed at 20:38; 56921 processed at 21:43. <br>
</h4>
</div>


</body>
</html>
