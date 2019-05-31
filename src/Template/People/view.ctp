<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->ID_User]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->ID_User], ['confirm' => __('Are you sure you want to delete # {0}?', $person->ID_User)]) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="people view large-10 medium-9 columns content">
    <h3><?= h($person->ID_User) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($person->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID User') ?></th>
            <td><?= $this->Number->format($person->ID_User) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $this->Number->format($person->Phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $this->Number->format($person->Role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($person->Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= $this->Number->format($person->First_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= $this->Number->format($person->Last_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= $this->Number->format($person->Email) ?></td>
        </tr>
    </table>
</div>
