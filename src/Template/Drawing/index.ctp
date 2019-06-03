<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drawing[]|\Cake\Collection\CollectionInterface $drawing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Drawing'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="drawing index large-9 medium-8 columns content">
    <h3><?= __('Drawing') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_draw') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sidings_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wagon_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sidings_g_m') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wagon_g_m') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_graphics') ?></th>
                <th scope="col"><?= $this->Paginator->sort('showgraphics') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($drawing as $drawing): ?>
            <tr>
                <td><?= $this->Number->format($drawing->id_draw) ?></td>
                <td><?= $drawing->has('siding') ? $this->Html->link($drawing->siding->IDsidings, ['controller' => 'Sidings', 'action' => 'view', $drawing->siding->IDsidings]) : '' ?></td>
                <td><?= $this->Number->format($drawing->wagon_id) ?></td>
                <td><?= h($drawing->sidings_g_m) ?></td>
                <td><?= h($drawing->wagon_g_m) ?></td>
                <td><?= h($drawing->other_graphics) ?></td>
                <td><?= $this->Number->format($drawing->showgraphics) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $drawing->id_draw]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $drawing->id_draw]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $drawing->id_draw], ['confirm' => __('Are you sure you want to delete # {0}?', $drawing->id_draw)]) ?>
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
