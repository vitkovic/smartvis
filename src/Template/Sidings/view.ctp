<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Siding $siding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Siding'), ['action' => 'edit', $siding->IDsidings]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Siding'), ['action' => 'delete', $siding->IDsidings], ['confirm' => __('Are you sure you want to delete # {0}?', $siding->IDsidings)]) ?> </li>
        <li><?= $this->Html->link(__('List Sidings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Siding'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sidings view large-9 medium-8 columns content">
    <h3><?= h($siding->IDsidings) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IDsidings') ?></th>
            <td><?= $this->Number->format($siding->IDsidings) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siding Purpose') ?></th>
            <td><?= $this->Number->format($siding->Siding_purpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siding Lenght') ?></th>
            <td><?= $this->Number->format($siding->Siding_lenght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mass Per Axle') ?></th>
            <td><?= $this->Number->format($siding->Mass_per_axle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siding Type') ?></th>
            <td><?= $this->Number->format($siding->Siding_Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDSGroup') ?></th>
            <td><?= $this->Number->format($siding->IDSGroup) ?></td>
        </tr>
    </table>
</div>
