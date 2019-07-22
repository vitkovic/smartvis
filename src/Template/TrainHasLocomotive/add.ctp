<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainHasLocomotive $trainHasLocomotive
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Train Has Locomotive'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="trainHasLocomotive form large-9 medium-8 columns content">
    <?= $this->Form->create($trainHasLocomotive) ?>
    <fieldset>
        <legend><?= __('Add Train Has Locomotive') ?></legend>
        <?php
            echo $this->Form->control('locomotive_id');
            echo $this->Form->control('train_id');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
