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
<?php if ($messages!=null && count($messages)>0): ?>
<h3>Possible solutions</h3><hr>
 <?php foreach ($messages as $message): ?>
		<p><?= $message ?></p><hr>
 <?php endforeach; ?>		
<?php else: ?>
<h3>There are no solutions for the problem!</h3>
<?php endif; ?>
</body>
</html>
