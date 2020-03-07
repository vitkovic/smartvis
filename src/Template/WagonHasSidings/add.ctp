<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasSiding $wagonHasSiding
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
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Display Wagon On Sidings'), ['action' => 'index']) ?></li>
    </ul>
     <div>
    		 <?php echo $this->element('drawyard', ["wagons" => $wagons]); ?>
    	
    </div>
</nav>
<div class="wagonHasSidings form large-9 medium-8 columns content">
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Look at station labels</button>
    <?= $this->Form->create($wagonHasSiding) ?>
    <fieldset>
        <legend><?= __('Add Wagon Has Siding') ?></legend>
        <?php
            echo $this->Form->control('ID_wagon');
            echo $this->Form->control('Description');
            echo $this->Form->control('ID_sidings');
            echo $this->Form->control('label');
            echo $this->Form->control('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
