<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainHasLocomotive $trainHasLocomotive
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Train Has Locomotive'), ['action' => 'edit', $trainHasLocomotive->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Train Has Locomotive'), ['action' => 'delete', $trainHasLocomotive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainHasLocomotive->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Train Has Locomotive'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Train Has Locomotive'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trainHasLocomotive view large-9 medium-8 columns content">
    <h3><?= h($trainHasLocomotive->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($trainHasLocomotive->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trainHasLocomotive->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locomotive Id') ?></th>
            <td><?= $this->Number->format($trainHasLocomotive->locomotive_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Id') ?></th>
            <td><?= $this->Number->format($trainHasLocomotive->train_id) ?></td>
        </tr>
    </table>
</div>
