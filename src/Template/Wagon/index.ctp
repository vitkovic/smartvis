<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wagon[]|\Cake\Collection\CollectionInterface $wagon
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wagon'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wagon index large-10 medium-9 columns content">
    <h3><?= __('Wagon') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID_wagon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NumberWagonAxles') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NetMassCargo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('WagonLenght') ?></th>
                <th scope="col"><?= $this->Paginator->sort('WagonMass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BrakeWeight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TypeofCargo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wagon as $wagon): ?>
            <tr>
                <td><?= $this->Number->format($wagon->ID_wagon) ?></td>
                <td><?= $this->Number->format($wagon->NumberWagonAxles) ?></td>
                <td><?= $this->Number->format($wagon->NetMassCargo) ?></td>
                <td><?= $this->Number->format($wagon->Type) ?></td>
                <td><?= $this->Number->format($wagon->WagonLenght) ?></td>
                <td><?= $this->Number->format($wagon->WagonMass) ?></td>
                <td><?= $this->Number->format($wagon->BrakeWeight) ?></td>
                <td><?= $this->Number->format($wagon->TypeofCargo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wagon->ID_wagon]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wagon->ID_wagon]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wagon->ID_wagon], ['confirm' => __('Are you sure you want to delete # {0}?', $wagon->ID_wagon)]) ?>
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
