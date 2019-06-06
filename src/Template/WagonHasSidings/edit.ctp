<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasSiding $wagonHasSiding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wagonHasSiding->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wagonHasSiding->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wagon on Sidings'), ['action' => 'index']) ?></li>
    </ul>
    <div>
    		 <?php echo $this->element('drawyard', ["wagons" => $wagons]); ?>
    	
    </div>
</nav>
<div class="wagonHasSidings form large-9 medium-8 columns content">
    <?= $this->Form->create($wagonHasSiding) ?>
    <fieldset>
        <legend><?= __('Edit Wagon on Siding') ?></legend>
        <?php
            echo $this->Form->control('ID_wagon');
            echo $this->Form->control('ID_sidings');
            echo $this->Form->control('label');
            echo $this->Form->control('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
