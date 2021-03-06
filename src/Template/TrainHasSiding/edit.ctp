<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainHasSiding $trainHasSiding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trainHasSiding->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trainHasSiding->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Train Has Siding'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trainHasSiding form large-9 medium-8 columns content">
    <?= $this->Form->create($trainHasSiding) ?>
    <fieldset>
        <legend><?= __('Edit Train Has Siding') ?></legend>
        <?php
            echo $this->Form->control('train_id');
            echo $this->Form->control('siding_id', ['options' => $sidings]);
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
