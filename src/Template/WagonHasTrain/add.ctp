<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasTrain $wagonHasTrain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wagon Has Train'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="wagonHasTrain form large-9 medium-8 columns content">
    <?= $this->Form->create($wagonHasTrain) ?>
    <fieldset>
        <legend><?= __('Add Wagon To Train') ?></legend>
        <?php
           // echo $this->Form->control('Wagon_id', ['type' => 'select', 'multiple'=>'multipe']);
            echo $this->Form->control('Wagon_id');
            echo $this->Form->control('Train_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>

 
 <?= $this->Form->create($wagonHasTrain) ?>
    <fieldset>
        <legend><?= __('Add Multiple Wagons To Train') ?></legend>
        <?php
            echo $this->Form->control('Wagon_id', ['type' => 'select', 'multiple'=>'multipe']);
            echo $this->Form->control('Train_id');
            echo $this->Form->control('multi', ['type' => 'hidden', 'value'=>'m']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
