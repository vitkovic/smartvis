<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSmart[]|\Cake\Collection\CollectionInterface $userSmart
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Smart'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSmart index large-9 medium-8 columns content">
    <h3><?= __('User Smart') ?></h3>
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
            <?php foreach ($userSmart as $userSmart): ?>
            <tr>
                <td><?= $this->Number->format($userSmart->ID_User) ?></td>
                <td><?= $this->Number->format($userSmart->Phone) ?></td>
                <td><?= $this->Number->format($userSmart->Role) ?></td>
                <td><?= $this->Number->format($userSmart->Type) ?></td>
                <td><?= $this->Number->format($userSmart->First_Name) ?></td>
                <td><?= $this->Number->format($userSmart->Last_Name) ?></td>
                <td><?= $this->Number->format($userSmart->Email) ?></td>
                <td><?= h($userSmart->username) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userSmart->ID_User]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSmart->ID_User]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSmart->ID_User], ['confirm' => __('Are you sure you want to delete # {0}?', $userSmart->ID_User)]) ?>
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
