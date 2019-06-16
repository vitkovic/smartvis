<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasSiding[]|\Cake\Collection\CollectionInterface $wagonHasSidings
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
        <li><?= $this->Html->link(__('New Wagon Has Siding'), ['action' => 'add']) ?></li>
    </ul>
      <div>
    		 <?php echo $this->element('drawyard', ["wagons" => $wagons]); ?>
    	
    </div>
</nav>
<div class="wagonHasSidings index large-9 medium-8 columns content">
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Look at station labels</button>
    <h3><?= __('Wagon Has Sidings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID_wagon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ID_sidings') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wagonHasSidings as $wagonHasSiding): ?>
            <?php if ($this->Number->format($wagonHasSiding->ID_wagon)==0) { ?>
             <tr style="background-color:#ff99ff;">
            <?php } else { ?>
             <tr >
            <?php }  ?>
                <td><?= $this->Number->format($wagonHasSiding->ID_wagon) ?></td>
                <td><?= h($wagonHasSiding->Description) ?></td>
                <td><?= $this->Number->format($wagonHasSiding->ID_sidings) ?></td>
                <td><?= h($wagonHasSiding->label) ?></td>
                <td><?= $this->Number->format($wagonHasSiding->position) ?></td>
                <td><?= $this->Number->format($wagonHasSiding->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wagonHasSiding->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wagonHasSiding->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wagonHasSiding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wagonHasSiding->id)]) ?>
                  <?php if ($this->Number->format($wagonHasSiding->ID_wagon)==0) { ?>
             			<br/> <?= $this->Html->link(__('Insert Wagon'), ['action' => 'insertwagon', $wagonHasSiding->id],['confirm' => __('Are you sure you want to add wagon to database # {0}?', $wagonHasSiding->id)]) ?>
           		 <?php } else { }?>
           		  
           		
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
