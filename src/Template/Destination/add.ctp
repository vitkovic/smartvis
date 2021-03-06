<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Destination $destination
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Destination'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wagon'), ['controller' => 'Wagon', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wagon'), ['controller' => 'Wagon', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="destination form large-9 medium-8 columns content">
    <?= $this->Form->create($destination) ?>
    <fieldset>
        <legend><?= __('Add Destination') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
