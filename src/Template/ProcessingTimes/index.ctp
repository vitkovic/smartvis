<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcessingTime[]|\Cake\Collection\CollectionInterface $processingTimes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Processing Time'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processingTimes index large-9 medium-8 columns content">
    <h3><?= __('Processing Times') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="10%"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operation') ?></th>
                <th scope="col" width="10%"><?= $this->Paginator->sort('duration') ?></th>
                <?php if ($setvisibility != 'visibility:hidden'): ?>
                
                	<th scope="col" class="actions"><?= __('Actions') ?></th>
                
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($processingTimes as $processingTime): ?>
            <tr>
                <td><?= $this->Number->format($processingTime->id) ?></td>
                <td><?= h($processingTime->operation) ?></td>
                <td><?= $this->Number->format($processingTime->duration) ?></td>
                 <?php if ($setvisibility != 'visibility:hidden'): ?>
	                <td class="actions" style="<?= $setvisibility; ?>">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $processingTime->id]) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $processingTime->id]) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $processingTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processingTime->id)]) ?>
	                </td>
	              <?php endif; ?>
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
