<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasTrain $wagonHasTrain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wagon Has Train'), ['action' => 'edit', $wagonHasTrain->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wagon Has Train'), ['action' => 'delete', $wagonHasTrain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wagonHasTrain->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Wagon Has Train'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wagon Has Train'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wagonHasTrain view large-9 medium-8 columns content">
    <h3><?= h($wagonHasTrain->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($wagonHasTrain->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wagon Id') ?></th>
            <td><?= $this->Number->format($wagonHasTrain->Wagon_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Id') ?></th>
            <td><?= $this->Number->format($wagonHasTrain->Train_id) ?></td>
        </tr>
    </table>
</div>
