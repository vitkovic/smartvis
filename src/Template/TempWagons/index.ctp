<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tempwagon[]|\Cake\Collection\CollectionInterface $tempwagons
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tempwagon'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Timetable'), ['controller' => 'Timetable', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timetable'), ['controller' => 'Timetable', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tempwagons index large-9 medium-8 columns content">
    <h3><?= __('Tempwagons') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Temp_Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Timetable_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tempwagons as $tempwagon): ?>
            <tr>
                <td><?= $this->Number->format($tempwagon->Temp_Id) ?></td>
                <td><?= h($tempwagon->Description) ?></td>
                <td><?= $tempwagon->has('timetable') ? $this->Html->link($tempwagon->timetable->ID_Timetable, ['controller' => 'Timetable', 'action' => 'view', $tempwagon->timetable->ID_Timetable]) : '' ?></td>
                <td class="actions" style="<?= $setvisibility; ?>">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tempwagon->Temp_Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tempwagon->Temp_Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tempwagon->Temp_Id], ['confirm' => __('Are you sure you want to delete # {0}?', $tempwagon->Temp_Id)]) ?>
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
