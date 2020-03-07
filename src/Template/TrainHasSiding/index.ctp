<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainHasSiding[]|\Cake\Collection\CollectionInterface $trainHasSiding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Train Has Siding'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?></li>
    </ul>
     <div>
    		 <?php echo $this->element('drawyard', ["wagons" => $wagons]); ?>
    	
    </div>
</nav>
<div class="trainHasSiding index large-9 medium-8 columns content">
    <h3><?= __('Train Has Siding') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('train_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('siding_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainHasSiding as $trainHasSiding): ?>
            <tr>
                <td><?= $this->Number->format($trainHasSiding->id) ?></td>
                <td><?php echo $trainHasSiding->train->Train_Number ?></td>
                <td><?= $trainHasSiding->has('siding') ? $this->Html->link($trainHasSiding->siding->IDsidings, ['controller' => 'Sidings', 'action' => 'view', $trainHasSiding->siding->IDsidings]) : '' ?></td>
                <td><?= h($trainHasSiding->description) ?></td>
                <td class="actions" style="<?= $setvisibility; ?>">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trainHasSiding->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trainHasSiding->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trainHasSiding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainHasSiding->id)]) ?>
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
