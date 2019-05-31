<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $people
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="people index large-10 medium-9 columns content">
    <h3><?= __('People') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID_User') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('First_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person): ?>
            <tr>
                <td><?= $this->Number->format($person->ID_User) ?></td>
                <td><?= $this->Number->format($person->Phone) ?></td>
                <td><?= $this->Number->format($person->Role) ?></td>
                <td><?= $this->Number->format($person->Type) ?></td>
                <td><?= $this->Number->format($person->First_Name) ?></td>
                <td><?= $this->Number->format($person->Last_Name) ?></td>
                <td><?= $this->Number->format($person->Email) ?></td>
                <td><?= h($person->username) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $person->ID_User]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->ID_User]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->ID_User], ['confirm' => __('Are you sure you want to delete # {0}?', $person->ID_User)]) ?>
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
