<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tempwagon $tempwagon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tempwagon'), ['action' => 'edit', $tempwagon->Temp_Id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tempwagon'), ['action' => 'delete', $tempwagon->Temp_Id], ['confirm' => __('Are you sure you want to delete # {0}?', $tempwagon->Temp_Id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tempwagons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tempwagon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Timetable'), ['controller' => 'Timetable', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timetable'), ['controller' => 'Timetable', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tempwagons view large-9 medium-8 columns content">
    <h3><?= h($tempwagon->Temp_Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($tempwagon->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timetable') ?></th>
            <td><?= $tempwagon->has('timetable') ? $this->Html->link($tempwagon->timetable->ID_Timetable, ['controller' => 'Timetable', 'action' => 'view', $tempwagon->timetable->ID_Timetable]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temp Id') ?></th>
            <td><?= $this->Number->format($tempwagon->Temp_Id) ?></td>
        </tr>
    </table>
</div>
