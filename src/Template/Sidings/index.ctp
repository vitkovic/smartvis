<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Siding[]|\Cake\Collection\CollectionInterface $sidings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Siding'), ['action' => 'add']) ?></li>
       
    </ul>
</nav>
<div class="sidings index large-9 medium-8 columns content">
    <h3><?= __('Sidings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('IDsidings') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Siding_purpose') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Siding_lenght') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Mass_per_axle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Siding_Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IDSGroup') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sidings as $siding): ?>
            <tr>
                <td><?= $this->Number->format($siding->IDsidings) ?></td>
                <td><?= h($siding->Siding_purpose) ?></td>
                <td><?= $this->Number->format($siding->Siding_lenght) ?></td>
                <td><?= h($siding->Mass_per_axle) ?></td>
                <td><?= h($siding->Siding_Type) ?></td>
                <td><?= $this->Number->format($siding->IDSGroup) ?></td>
                  <td><?= $siding->has('destination') ? $this->Html->link($siding->destination->name, ['controller' => 'Destination', 'action' => 'view', $siding->destination->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $siding->IDsidings]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $siding->IDsidings]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $siding->IDsidings], ['confirm' => __('Are you sure you want to delete # {0}?', $siding->IDsidings)]) ?>
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
