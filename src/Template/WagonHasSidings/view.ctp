<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasSiding $wagonHasSiding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wagon On Siding'), ['action' => 'edit', $wagonHasSiding->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wagon From Siding'), ['action' => 'delete', $wagonHasSiding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wagonHasSiding->id)]) ?> </li>
        <li><?= $this->Html->link(__('Display Wagons On Sidings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Position Wagon Ons Siding'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wagonHasSidings view large-9 medium-8 columns content">
    <h3><?= h($wagonHasSiding->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($wagonHasSiding->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($wagonHasSiding->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Wagon') ?></th>
            <td><?= $this->Number->format($wagonHasSiding->ID_wagon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Sidings') ?></th>
            <td><?= $this->Number->format($wagonHasSiding->ID_sidings) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($wagonHasSiding->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($wagonHasSiding->id) ?></td>
        </tr>
    </table>
</div>
