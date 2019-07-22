<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Locomotive[]|\Cake\Collection\CollectionInterface $locomotive
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Locomotive'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Train Has Locomotive'), ['controller' => 'TrainHasLocomotive', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Train Has Locomotive'), ['controller' => 'TrainHasLocomotive', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locomotive index large-9 medium-8 columns content">
    <h3><?= __('Locomotive') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locomotive as $locomotive): ?>
            <tr>
                <td><?= $this->Number->format($locomotive->id) ?></td>
                <td><?= h($locomotive->type) ?></td>
                <td><?= h($locomotive->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $locomotive->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $locomotive->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $locomotive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locomotive->id)]) ?>
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
