<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcessingTime $processingTime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Processing Times'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="processingTimes form large-9 medium-8 columns content">
    <?= $this->Form->create($processingTime) ?>
    <fieldset>
        <legend><?= __('Add Processing Time') ?></legend>
        <?php
            echo $this->Form->control('operation');
            echo $this->Form->control('duration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
