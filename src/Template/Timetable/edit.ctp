<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timetable $timetable
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timetable->ID_Timetable],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timetable->ID_Timetable)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Timetable'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="timetable form large-10	medium-9 columns content">
    <?= $this->Form->create($timetable) ?>
    <fieldset>
        <legend><?= __('Edit Timetable') ?></legend>
        <?php
            echo $this->Form->control('ID_Sidings');
            echo $this->Form->control('IDS_Group');
            echo $this->Form->control('Siding_Purpose');
            echo $this->Form->control('Siding_Lenght');
            echo $this->Form->control('Mass_per_Axle');
            echo $this->Form->control('Siding_Type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
