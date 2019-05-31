<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSmart $userSmart
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Smart'), ['action' => 'edit', $userSmart->ID_User]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Smart'), ['action' => 'delete', $userSmart->ID_User], ['confirm' => __('Are you sure you want to delete # {0}?', $userSmart->ID_User)]) ?> </li>
        <li><?= $this->Html->link(__('List User Smart'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Smart'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userSmart view large-9 medium-8 columns content">
    <h3><?= h($userSmart->ID_User) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($userSmart->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID User') ?></th>
            <td><?= $this->Number->format($userSmart->ID_User) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $this->Number->format($userSmart->Phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $this->Number->format($userSmart->Role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($userSmart->Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= $this->Number->format($userSmart->First_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= $this->Number->format($userSmart->Last_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= $this->Number->format($userSmart->Email) ?></td>
        </tr>
    </table>
</div>
