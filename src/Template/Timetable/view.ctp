<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timetable $timetable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Timetable'), ['action' => 'edit', $timetable->ID_Timetable]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Timetable'), ['action' => 'delete', $timetable->ID_Timetable], ['confirm' => __('Are you sure you want to delete # {0}?', $timetable->ID_Timetable)]) ?> </li>
        <li><?= $this->Html->link(__('List Timetable'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timetable'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Train'), ['controller' => 'Train', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Train'), ['controller' => 'Train', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timetable view large-9 medium-8 columns content">
    <h3><?= h($timetable->ID_Timetable) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= h($timetable->Source) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= h($timetable->Destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train') ?></th>
            <td><?= $timetable->has('train') ? $this->Html->link($timetable->train->ID_Train, ['controller' => 'Train', 'action' => 'view', $timetable->train->ID_Train]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Timetable') ?></th>
            <td><?= $this->Number->format($timetable->ID_Timetable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arrival Date') ?></th>
            <td><?= h($timetable->Arrival_Date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispatch Date') ?></th>
            <td><?= h($timetable->Dispatch_Date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arrival Time') ?></th>
            <td><?= h($timetable->Arrival_Time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispatch Time') ?></th>
            <td><?= h($timetable->Dispatch_Time) ?></td>
        </tr>
    </table>
</div>
