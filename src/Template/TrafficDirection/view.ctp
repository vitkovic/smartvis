<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrafficDirection $trafficDirection
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Traffic Direction'), ['action' => 'edit', $trafficDirection->ID_Traffic_Direction]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Traffic Direction'), ['action' => 'delete', $trafficDirection->ID_Traffic_Direction], ['confirm' => __('Are you sure you want to delete # {0}?', $trafficDirection->ID_Traffic_Direction)]) ?> </li>
        <li><?= $this->Html->link(__('List Traffic Direction'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Traffic Direction'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trafficDirection view large-10 medium-9 columns content">
    <h3><?= h($trafficDirection->ID_Traffic_Direction) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID Traffic Direction') ?></th>
            <td><?= $this->Number->format($trafficDirection->ID_Traffic_Direction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mass Per Axle') ?></th>
            <td><?= $this->Number->format($trafficDirection->Mass_Per_Axle) ?></td>
        </tr>
    </table>
</div>
