<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasTrain $wagonHasTrain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wagonHasTrain->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wagonHasTrain->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wagon Has Train'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="wagonHasTrain form large-9 medium-8 columns content">
    <?= $this->Form->create($wagonHasTrain) ?>
    <fieldset>
        <legend><?= __('Edit Wagon Has Train') ?></legend>
        <?php
            echo $this->Form->control('Wagon_id');
            echo $this->Form->control('Train_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
