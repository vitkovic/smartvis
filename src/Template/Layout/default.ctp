<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '';
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    	<?php $this->assign('title', 'SMARTVIS'); ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
 <style>
 .myModal {
    text-align: center;
}
.modal-dialog {
    text-align: left; /* you'll likely want this */
    max-width: 100%;
    width: auto !important;
    display: inline-block;
    overflow-y: auto;
}
 </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="/smartvis/"><?php echo $this->Html->image("logo.png", ['fullBase' => true]);?></a>

  <!-- Links -->
  <ul class="navbar-nav">
  <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Infrastructure
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/smartvis/wagon-has-sidings">Wagon distribution</a>
       <a class="dropdown-item" href="/smartvis/wagon-has-sidings/add">Add Wagons to sidings</a>
        <a class="dropdown-item" href="/smartvis/wagon-has-train/add">Add Wagons to trains</a>
          <a class="dropdown-item" href="/smartvis/train-has-siding/add">Add Trains to sidings</a>
        
       </div>
    </li>
   <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Visualization
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/smartvis/yard/viewyardsimplified">Display Yard diagram</a>
        <a class="dropdown-item" href="/smartvis/yard/viewyard">Yard Info</a>
      </div>
    </li>
    <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Deviations/Recommendations
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/smartvis/deviations/">Train & Infrastructure</a>
        <a class="dropdown-item" href="/smartvis/deviations/">People</a>
        <a class="dropdown-item" href="/smartvis/deviations/">Other</a>
       
      </div>
    </li>
     <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Yard Elements
      </a>
      <div class="dropdown-menu">
		<a class="dropdown-item" href="/smartvis/timetable"><span style="font-size:medium">Timetable</span></a>
    	<a class="dropdown-item" href="/smartvis/inputwagons"><span style="font-size:medium">Temporary Distribution</span></a>
    	<a class="dropdown-item" href="/smartvis/train/"><span style="font-size:medium">Train</a>
    	<a class="dropdown-item" href="/smartvis/wagon"><span style="font-size:medium">Wagon</a>
    	<a class="dropdown-item" href="/smartvis/locomotive/"><span style="font-size:medium">Locomotive</a>
     	<a class="dropdown-item" href="/smartvis/sidings"><span style="font-size:medium">Sidings</a>
        <a class="dropdown-item" href="/smartvis/people"><span style="font-size:medium">People</a>
     	<a class="dropdown-item" href="/smartvis/processing-times"><span style="font-size:medium">Processing times</a>
      </div>
    </li>
     <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Users
      </a>
      <div class="dropdown-menu">
		<a class="dropdown-item" href="/smartvis/users"><span style="font-size:medium">View</span></a>
    	<a class="dropdown-item" href="/smartvis/users/add"><span style="font-size:medium">Add</span></a>
    	<a class="dropdown-item" href="/smartvis/roles"><span style="font-size:medium">Roles</span></a>
      </div>
    </li>
    <!--
    <li class="dropdown">
	      		<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        		Yard Users
	      		</a>
	      <div class="dropdown-menu">
			<a class="dropdown-item" href="/smartvis/yard-users"><span style="font-size:medium">View yard users</span></a>
	    	<a class="dropdown-item" href="/smartvis/yard-users/add"><span style="font-size:medium">Add yard users</span></a>
	    	
	      </div>
	      </li>
    -->
     <li class="nav-item"><a class="nav-link" href="/smartvis/users/contact">Project information</a></li>
 	 <li class="nav-item"><a class="nav-link" href="/smartvis/users/login"><span style="font-size:medium">Login <span style="font-size:medium;color:#e60000">(<?= $setusertype ?>)</a></span></li>
 	 <li class="nav-item"><a class="nav-link" href="/smartvis/users/logout"><span style="font-size:medium">Logout</a></span></li>
 	 
  </ul>
</nav>


    
    <?= $this->Flash->render() ?>
    <div class="container-fluid" style="width:100%">
        <?= $this->fetch('content') ?>
    </div>
    
    
 
  

    <footer>
     
    </footer>

</body>
</html>
