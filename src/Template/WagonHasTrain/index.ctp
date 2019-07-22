<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasTrain[]|\Cake\Collection\CollectionInterface $wagonHasTrain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wagon Has Train'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wagonHasTrain index large-9 medium-8 columns content">
    <h3><?= __('Wagon Has Train') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Wagon_Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Train_Number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wagonHasTrain as $wagonHasTrain): ?>
            <tr>
                <td><?= $this->Number->format($wagonHasTrain->id) ?></td>
                <td><?php echo $wagonHasTrain->wagon->Description ?></td>
                <td><?php echo $wagonHasTrain->train->Train_Number ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wagonHasTrain->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wagonHasTrain->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wagonHasTrain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wagonHasTrain->id)]) ?>
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
