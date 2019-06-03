<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrafficDirection[]|\Cake\Collection\CollectionInterface $trafficDirection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Traffic Direction'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trafficDirection index large-9 medium-8 columns content">
    <h3><?= __('Traffic Direction') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID_Traffic_Direction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Mass_Per_Axle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Traffic_Direction') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trafficDirection as $trafficDirection): ?>
            <tr>
                <td><?= $this->Number->format($trafficDirection->ID_Traffic_Direction) ?></td>
                <td><?= h($trafficDirection->Mass_Per_Axle) ?></td>
                <td><?= h($trafficDirection->Traffic_Direction) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trafficDirection->ID_Traffic_Direction]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trafficDirection->ID_Traffic_Direction]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trafficDirection->ID_Traffic_Direction], ['confirm' => __('Are you sure you want to delete # {0}?', $trafficDirection->ID_Traffic_Direction)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
