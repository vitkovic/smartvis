<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Train[]|\Cake\Collection\CollectionInterface $train
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Train'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="train index large-9 medium-8 columns content">
    <h3><?= __('Train') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Train_Weight_per_Axle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Train_Composition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ID_Train') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Train_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Train_Number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Dispatch_Time_Starting') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Train_Mass_In_Tones') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Train_Lenght_In_Meters') ?></th>
                <th scope="col"><?= $this->Paginator->sort('InOut') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($train as $train): ?>
            <tr>
                <td><?= $this->Number->format($train->Train_Weight_per_Axle) ?></td>
                <td><?= $this->Number->format($train->Train_Composition) ?></td>
                <td><?= $this->Number->format($train->ID_Train) ?></td>
                <td><?= $this->Number->format($train->Train_type) ?></td>
                <td><?= $this->Number->format($train->Train_Number) ?></td>
                <td><?= h($train->Dispatch_Time_Starting) ?></td>
                <td><?= $this->Number->format($train->Train_Mass_In_Tones) ?></td>
                <td><?= $this->Number->format($train->Train_Lenght_In_Meters) ?></td>
                <td><?= $this->Number->format($train->InOut) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $train->ID_Train]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $train->ID_Train]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $train->ID_Train], ['confirm' => __('Are you sure you want to delete # {0}?', $train->ID_Train)]) ?>
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