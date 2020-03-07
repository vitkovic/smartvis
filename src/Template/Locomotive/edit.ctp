<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Locomotive $locomotive
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $locomotive->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $locomotive->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Locomotives'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trains With Locomotive'), ['controller' => 'TrainHasLocomotive', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Train With Locomotive'), ['controller' => 'TrainHasLocomotive', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locomotive form large-9 medium-8 columns content">
    <?= $this->Form->create($locomotive) ?>
    <fieldset>
        <legend><?= __('Edit Locomotive') ?></legend>
        <?php
            echo $this->Form->control('type');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
