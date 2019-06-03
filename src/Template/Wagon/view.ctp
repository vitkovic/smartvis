<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wagon $wagon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wagon'), ['action' => 'edit', $wagon->ID_wagon]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wagon'), ['action' => 'delete', $wagon->ID_wagon], ['confirm' => __('Are you sure you want to delete # {0}?', $wagon->ID_wagon)]) ?> </li>
        <li><?= $this->Html->link(__('List Wagon'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wagon'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wagon view large-9 medium-8 columns content">
    <h3><?= h($wagon->ID_wagon) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($wagon->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($wagon->Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Of Cargo') ?></th>
            <td><?= h($wagon->Type_of_Cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination Station') ?></th>
            <td><?= h($wagon->Destination_station) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arrival Station') ?></th>
            <td><?= h($wagon->Arrival_station) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($wagon->Remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Wagon') ?></th>
            <td><?= $this->Number->format($wagon->ID_wagon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Net Mass Cargo') ?></th>
            <td><?= $this->Number->format($wagon->Net_Mass_Cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wagon Lenght') ?></th>
            <td><?= $this->Number->format($wagon->Wagon_Lenght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wagon Mass') ?></th>
            <td><?= $this->Number->format($wagon->Wagon_Mass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brake Weight') ?></th>
            <td><?= $this->Number->format($wagon->Brake_Weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Axles') ?></th>
            <td><?= $this->Number->format($wagon->Number_of_Axles) ?></td>
        </tr>
    </table>
</div>
