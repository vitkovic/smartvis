<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drawing $drawing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Drawing'), ['action' => 'edit', $drawing->id_draw]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Drawing'), ['action' => 'delete', $drawing->id_draw], ['confirm' => __('Are you sure you want to delete # {0}?', $drawing->id_draw)]) ?> </li>
        <li><?= $this->Html->link(__('List Drawing'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Drawing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="drawing view large-9 medium-8 columns content">
    <h3><?= h($drawing->id_draw) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Siding') ?></th>
            <td><?= $drawing->has('siding') ? $this->Html->link($drawing->siding->IDsidings, ['controller' => 'Sidings', 'action' => 'view', $drawing->siding->IDsidings]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sidings G M') ?></th>
            <td><?= h($drawing->sidings_g_m) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wagon G M') ?></th>
            <td><?= h($drawing->wagon_g_m) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Graphics') ?></th>
            <td><?= h($drawing->other_graphics) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Draw') ?></th>
            <td><?= $this->Number->format($drawing->id_draw) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wagon Id') ?></th>
            <td><?= $this->Number->format($drawing->wagon_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Showgraphics') ?></th>
            <td><?= $this->Number->format($drawing->showgraphics) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Graphics') ?></h4>
        <?= $this->Text->autoParagraph(h($drawing->graphics)); ?>
    </div>
    <div class="row">
        <h4><?= __('Note') ?></h4>
        <?= $this->Text->autoParagraph(h($drawing->note)); ?>
    </div>
</div>
