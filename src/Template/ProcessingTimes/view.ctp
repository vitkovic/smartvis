<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcessingTime $processingTime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Processing Time'), ['action' => 'edit', $processingTime->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Processing Time'), ['action' => 'delete', $processingTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processingTime->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Processing Times'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processing Time'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="processingTimes view large-9 medium-8 columns content">
    <h3><?= h($processingTime->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Operation') ?></th>
            <td><?= h($processingTime->operation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($processingTime->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($processingTime->duration) ?></td>
        </tr>
    </table>
</div>
