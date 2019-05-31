<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrafficDirectionParameter[]|\Cake\Collection\CollectionInterface $trafficDirectionParameters
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Traffic Direction Parameter'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trafficDirectionParameters index large-9 medium-8 columns content">
    <h3><?= __('Traffic Direction Parameters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('IDTDP') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Locomotive_Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Limitations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Maximum_Train_Length') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trafficDirectionParameters as $trafficDirectionParameter): ?>
            <tr>
                <td><?= $this->Number->format($trafficDirectionParameter->IDTDP) ?></td>
                <td><?= $this->Number->format($trafficDirectionParameter->Locomotive_Type) ?></td>
                <td><?= $this->Number->format($trafficDirectionParameter->Limitations) ?></td>
                <td><?= $this->Number->format($trafficDirectionParameter->Maximum_Train_Length) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trafficDirectionParameter->IDTDP]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trafficDirectionParameter->IDTDP]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trafficDirectionParameter->IDTDP], ['confirm' => __('Are you sure you want to delete # {0}?', $trafficDirectionParameter->IDTDP)]) ?>
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
