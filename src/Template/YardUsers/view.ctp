<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YardUser $yardUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Yard User'), ['action' => 'edit', $yardUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Yard User'), ['action' => 'delete', $yardUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yardUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Yard Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Yard User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="yardUsers view large-9 medium-8 columns content">
    <h3><?= h($yardUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $yardUser->has('user') ? $this->Html->link($yardUser->user->id, ['controller' => 'Users', 'action' => 'view', $yardUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($yardUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Yard Role') ?></th>
            <td><?= $this->Number->format($yardUser->yard_role) ?></td>
        </tr>
    </table>
</div>
