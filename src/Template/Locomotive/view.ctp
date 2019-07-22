<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Locomotive $locomotive
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Locomotive'), ['action' => 'edit', $locomotive->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Locomotive'), ['action' => 'delete', $locomotive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locomotive->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locomotive'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Locomotive'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Train Has Locomotive'), ['controller' => 'TrainHasLocomotive', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Train Has Locomotive'), ['controller' => 'TrainHasLocomotive', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locomotive view large-9 medium-8 columns content">
    <h3><?= h($locomotive->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($locomotive->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($locomotive->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($locomotive->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Train Has Locomotive') ?></h4>
        <?php if (!empty($locomotive->train_has_locomotive)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Locomotive Id') ?></th>
                <th scope="col"><?= __('Train Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($locomotive->train_has_locomotive as $trainHasLocomotive): ?>
            <tr>
                <td><?= h($trainHasLocomotive->id) ?></td>
                <td><?= h($trainHasLocomotive->locomotive_id) ?></td>
                <td><?= h($trainHasLocomotive->train_id) ?></td>
                <td><?= h($trainHasLocomotive->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TrainHasLocomotive', 'action' => 'view', $trainHasLocomotive->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TrainHasLocomotive', 'action' => 'edit', $trainHasLocomotive->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TrainHasLocomotive', 'action' => 'delete', $trainHasLocomotive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainHasLocomotive->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
