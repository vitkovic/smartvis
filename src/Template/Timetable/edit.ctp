<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timetable $timetable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timetable->ID_Timetable],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timetable->ID_Timetable)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Timetable'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Train'), ['controller' => 'Train', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Train'), ['controller' => 'Train', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timetable form large-9 medium-8 columns content">
    <?= $this->Form->create($timetable) ?>
    <fieldset>
        <legend><?= __('Edit Timetable') ?></legend>
        <?php
            echo $this->Form->control('Source');
            echo $this->Form->control('Destination');
            echo $this->Form->control('Arrival_Date', ['empty' => true]);
            echo $this->Form->control('Dispatch_Date', ['empty' => true]);
            echo $this->Form->control('Arrival_Time', ['empty' => true]);
            echo $this->Form->control('Dispatch_Time', ['empty' => true]);
            echo $this->Form->control('Train_id', ['options' => $train, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
