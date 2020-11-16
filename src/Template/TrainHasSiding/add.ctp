<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainHasSiding $trainHasSiding
 */
?>
<div id="myModal" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <h4 class="modal-title">Station labels</h4>
      </div>
      <div class="modal-body">
       <?php echo $this->element('stationzoom'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="myModalWagons" class="modal fade" style="width:30%" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <h4 class="modal-title">Wagon labels</h4>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
      <table >
      	<?php foreach ($wagons as $wagon): ?>
      		<tr>
      			<th>Wagon ID</th>
      			<th>Wagon Description</th>
      			
      		</tr>
	    	<tr>
            	<td><?= $this->Number->format($wagon['ID_wagon']) ?></td>
	         	<td><?= h($wagon['Description']) ?></td>
	         
	    	</tr>
	    <?php endforeach; ?>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="myModalSidings" class="modal fade" style="width:30%" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Siding labels</h4>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
      <table >
      	<?php foreach ($sidings as $siding): ?>
      		<tr>
      			<th>Siding ID</th>
      			<th>Siding Label</th>
      		</tr>
	    	<tr>
            	<td><?= $siding['sidings_id'] ?></td>
	         	<td><?= $siding['sidings_g_m'] ?></td>
	    	</tr>
	    <?php endforeach; ?>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Train Has Siding'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?></li>
    </ul>
     <div>
    		 <?php echo $this->element('drawyard', ["wagons" => $wagons]); ?>
    	
    </div>
</nav>
<div class="trainHasSiding form large-9 medium-8 columns content">
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Look at station labels</button>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalWagons">Display wagon data</button>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalSidings">Display siding data</button>
    <?= $this->Form->create($trainHasSiding) ?>
    <fieldset>
        <legend><?= __('Add Train to Siding') ?></legend>
        <?php
            echo $this->Form->control('train_id');
            echo $this->Form->control('siding_id', ['options' => $sidings]);
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
