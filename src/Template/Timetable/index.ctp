<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timetable[]|\Cake\Collection\CollectionInterface $timetable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Timetable'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Train'), ['controller' => 'Train', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Train'), ['controller' => 'Train', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timetable index large-9 medium-8 columns content">
    <h3><?= __('Timetable') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Source') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Destination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Arrival_Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Dispatch_Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Arrival_Time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Dispatch_Time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Train_id') ?></th>
                 <?php if ($setvisibility != 'visibility:hidden'): ?>
                	<th scope="col" class="actions"><?= __('Actions') ?></th>
                 <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timetable as $timetable): ?>
            <tr>
                <td><?= h($timetable->Source) ?></td>
                <td><?= h($timetable->Destination) ?></td>
                <td><?= h($timetable->Arrival_Date) ?></td>
                <td><?= h($timetable->Dispatch_Date) ?>(<?php echo date('l', strtotime(h($timetable->Dispatch_Date))); ?>)</td>
                <td><?= date('H:i:s',strtotime($timetable->Arrival_Time)) ?></td>
                <td><?= date('H:i:s',strtotime($timetable->Dispatch_Time))?></td>
                <td><?= $timetable->has('train') ? $this->Html->link($timetable->train->Train_Number, ['controller' => 'Train', 'action' => 'view', $timetable->train->ID_Train]) : '' ?></td>
	             <?php if ($setvisibility != 'visibility:hidden'): ?>   
	                <td class="actions" style="<?= $setvisibility; ?>">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $timetable->ID_Timetable]) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timetable->ID_Timetable]) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timetable->ID_Timetable], ['confirm' => __('Are you sure you want to delete # {0}?', $timetable->ID_Timetable)]) ?>
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
