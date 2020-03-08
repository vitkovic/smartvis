<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $people
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="people index large-9 medium-8 columns content">
    <h3><?= __('People') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID_User') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Role') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('Type') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('First_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
             <?php if ($setvisibility != 'visibility:hidden'): ?>
                	<th scope="col" class="actions"><?= __('Actions') ?></th>
                 <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person): ?>
            <tr>
                <td><?= $this->Number->format($person->ID_User) ?></td>
                <td><?= h($person->Phone) ?></td>
                <td><?= h($person->Role) ?></td>
               <!-- <td><?= h($person->Type) ?></td>-->
                <td><?= h($person->First_Name) ?></td>
                <td><?= h($person->Last_Name) ?></td>
                <td><?= h($person->Email) ?></td>
                <td><?= h($person->username) ?></td>
                 <?php if ($setvisibility != 'visibility:hidden'): ?>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $person->ID_User]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->ID_User]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->ID_User], ['confirm' => __('Are you sure you want to delete # {0}?', $person->ID_User)]) ?>
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
