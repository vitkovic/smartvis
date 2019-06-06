<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasSiding[]|\Cake\Collection\CollectionInterface $wagonHasSidings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wagon on Siding'), ['action' => 'add']) ?></li>
    </ul>
    <div>
    		 <?php echo $this->element('drawyard', ["wagons" => $wagons]); ?>
    	
    </div>
    
</nav>
<div class="wagonHasSidings index large-9 medium-8 columns content">
    <h3><?= __('Wagons on Sidings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID_wagon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ID_sidings') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wagonHasSidings as $wagonHasSiding): ?>
            <tr>
                <td><?= $this->Number->format($wagonHasSiding->ID_wagon) ?></td>
                <td><?= $this->Number->format($wagonHasSiding->ID_sidings) ?></td>
                <td><?= h($wagonHasSiding->label) ?></td>
                <td><?= $this->Number->format($wagonHasSiding->position) ?></td>
                <td><?= $this->Number->format($wagonHasSiding->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wagonHasSiding->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wagonHasSiding->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wagonHasSiding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wagonHasSiding->id)]) ?>
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
