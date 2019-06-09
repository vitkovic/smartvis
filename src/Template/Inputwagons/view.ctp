<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inputwagon $inputwagon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Input Wagon'), ['action' => 'edit', $inputwagon->Temp_Id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Input Wagon'), ['action' => 'delete', $inputwagon->Temp_Id], ['confirm' => __('Are you sure you want to delete # {0}?', $inputwagon->Temp_Id)]) ?> </li>
        <li><?= $this->Html->link(__('List Input Wagons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Input Wagon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Timetable'), ['controller' => 'Timetable', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timetable'), ['controller' => 'Timetable', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="inputwagons view large-9 medium-8 columns content">
    <h3><?= h($inputwagon->Temp_Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($inputwagon->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timetable') ?></th>
            <td><?= $inputwagon->has('timetable') ? $this->Html->link($inputwagon->timetable->ID_Timetable, ['controller' => 'Timetable', 'action' => 'view', $inputwagon->timetable->ID_Timetable]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temp Id') ?></th>
            <td><?= $this->Number->format($inputwagon->Temp_Id) ?></td>
        </tr>
    </table>
</div>
