<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wagon $wagon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wagon->ID_wagon],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wagon->ID_wagon)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wagon'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Destination'), ['controller' => 'Destination', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Destination'), ['controller' => 'Destination', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drawing'), ['controller' => 'Drawing', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Drawing'), ['controller' => 'Drawing', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wagon form large-9 medium-8 columns content">
    <?= $this->Form->create($wagon) ?>
    <fieldset>
        <legend><?= __('Edit Wagon') ?></legend>
        <?php
            echo $this->Form->control('Description');
            echo $this->Form->control('Net_Mass_Cargo');
            echo $this->Form->control('Type');
            echo $this->Form->control('Wagon_Lenght');
            echo $this->Form->control('Wagon_Mass');
            echo $this->Form->control('Brake_Weight');
            echo $this->Form->control('Type_of_Cargo');
            echo $this->Form->control('Number_of_Axles');
            echo $this->Form->control('Destination_station');
            echo $this->Form->control('Arrival_station');
            echo $this->Form->control('Remark');
            echo $this->Form->control('destination_id',['options' => $destination]);
            echo $this->Form->control('arrival_id', ['options' => $destination]);
            echo $this->Form->control('people_id', ['options' => $people]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
