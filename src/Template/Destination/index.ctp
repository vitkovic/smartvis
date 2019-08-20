<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Destination[]|\Cake\Collection\CollectionInterface $destination
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Destination'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wagon'), ['controller' => 'Wagon', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wagon'), ['controller' => 'Wagon', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="destination index large-9 medium-8 columns content">
    <h3><?= __('Destination') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($destination as $destination): ?>
            <tr>
                <td><?= $this->Number->format($destination->id) ?></td>
                <td><?= h($destination->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $destination->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $destination->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $destination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $destination->id)]) ?>
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
