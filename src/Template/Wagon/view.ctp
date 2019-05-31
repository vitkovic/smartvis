<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wagon $wagon
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wagon'), ['action' => 'edit', $wagon->ID_wagon]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wagon'), ['action' => 'delete', $wagon->ID_wagon], ['confirm' => __('Are you sure you want to delete # {0}?', $wagon->ID_wagon)]) ?> </li>
        <li><?= $this->Html->link(__('List Wagon'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wagon'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wagon view large-10 medium-9 columns content">
    <h3><?= h($wagon->ID_wagon) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID Wagon') ?></th>
            <td><?= $this->Number->format($wagon->ID_wagon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumberWagonAxles') ?></th>
            <td><?= $this->Number->format($wagon->NumberWagonAxles) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NetMassCargo') ?></th>
            <td><?= $this->Number->format($wagon->NetMassCargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($wagon->Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WagonLenght') ?></th>
            <td><?= $this->Number->format($wagon->WagonLenght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WagonMass') ?></th>
            <td><?= $this->Number->format($wagon->WagonMass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BrakeWeight') ?></th>
            <td><?= $this->Number->format($wagon->BrakeWeight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TypeofCargo') ?></th>
            <td><?= $this->Number->format($wagon->TypeofCargo) ?></td>
        </tr>
    </table>
</div>
