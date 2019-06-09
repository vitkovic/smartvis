<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tempwagon $tempwagon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tempwagon->Temp_Id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tempwagon->Temp_Id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tempwagons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Timetable'), ['controller' => 'Timetable', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timetable'), ['controller' => 'Timetable', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tempwagons form large-9 medium-8 columns content">
    <?= $this->Form->create($tempwagon) ?>
    <fieldset>
        <legend><?= __('Edit Tempwagon') ?></legend>
        <?php
            echo $this->Form->control('Description');
            echo $this->Form->control('Timetable_id', ['options' => $timetable]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
