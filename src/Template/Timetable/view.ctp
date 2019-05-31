<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timetable $timetable
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Timetable'), ['action' => 'edit', $timetable->ID_Timetable]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Timetable'), ['action' => 'delete', $timetable->ID_Timetable], ['confirm' => __('Are you sure you want to delete # {0}?', $timetable->ID_Timetable)]) ?> </li>
        <li><?= $this->Html->link(__('List Timetable'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timetable'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timetable view large-10 medium-9 columns content">
    <h3><?= h($timetable->ID_Timetable) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID Sidings') ?></th>
            <td><?= $this->Number->format($timetable->ID_Sidings) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDS Group') ?></th>
            <td><?= $this->Number->format($timetable->IDS_Group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siding Purpose') ?></th>
            <td><?= $this->Number->format($timetable->Siding_Purpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siding Lenght') ?></th>
            <td><?= $this->Number->format($timetable->Siding_Lenght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mass Per Axle') ?></th>
            <td><?= $this->Number->format($timetable->Mass_per_Axle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siding Type') ?></th>
            <td><?= $this->Number->format($timetable->Siding_Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Timetable') ?></th>
            <td><?= $this->Number->format($timetable->ID_Timetable) ?></td>
        </tr>
    </table>
</div>
