<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSmart $userSmart
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userSmart->ID_User],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userSmart->ID_User)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Smart'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userSmart form large-9 medium-8 columns content">
    <?= $this->Form->create($userSmart) ?>
    <fieldset>
        <legend><?= __('Edit User Smart') ?></legend>
        <?php
            echo $this->Form->control('Phone');
            echo $this->Form->control('Role');
            echo $this->Form->control('Type');
            echo $this->Form->control('First_Name');
            echo $this->Form->control('Last_Name');
            echo $this->Form->control('Email');
            echo $this->Form->control('username');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
