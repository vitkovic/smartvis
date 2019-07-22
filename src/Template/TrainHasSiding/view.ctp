<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainHasSiding $trainHasSiding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Train Has Siding'), ['action' => 'edit', $trainHasSiding->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Train Has Siding'), ['action' => 'delete', $trainHasSiding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainHasSiding->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Train Has Siding'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Train Has Siding'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trainHasSiding view large-9 medium-8 columns content">
    <h3><?= h($trainHasSiding->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Siding') ?></th>
            <td><?= $trainHasSiding->has('siding') ? $this->Html->link($trainHasSiding->siding->IDsidings, ['controller' => 'Sidings', 'action' => 'view', $trainHasSiding->siding->IDsidings]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($trainHasSiding->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trainHasSiding->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Id') ?></th>
            <td><?= $this->Number->format($trainHasSiding->train_id) ?></td>
        </tr>
    </table>
</div>
