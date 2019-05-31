<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timetable[]|\Cake\Collection\CollectionInterface $timetable
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Timetable'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timetable index large-10 medium-9 columns content">
    <h3><?= __('Timetable') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID_Sidings') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IDS_Group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Siding_Purpose') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Siding_Lenght') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Mass_per_Axle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Siding_Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ID_Timetable') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timetable as $timetable): ?>
            <tr>
                <td><?= $this->Number->format($timetable->ID_Sidings) ?></td>
                <td><?= $this->Number->format($timetable->IDS_Group) ?></td>
                <td><?= $this->Number->format($timetable->Siding_Purpose) ?></td>
                <td><?= $this->Number->format($timetable->Siding_Lenght) ?></td>
                <td><?= $this->Number->format($timetable->Mass_per_Axle) ?></td>
                <td><?= $this->Number->format($timetable->Siding_Type) ?></td>
                <td><?= $this->Number->format($timetable->ID_Timetable) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timetable->ID_Timetable]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timetable->ID_Timetable]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timetable->ID_Timetable], ['confirm' => __('Are you sure you want to delete # {0}?', $timetable->ID_Timetable)]) ?>
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
