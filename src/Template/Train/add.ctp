<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Train $train
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Train'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="train form large-9 medium-8 columns content">
    <?= $this->Form->create($train) ?>
    <fieldset>
        <legend><?= __('Add Train') ?></legend>
        <?php
            echo $this->Form->control('Train_Weight_per_Axle');
            echo $this->Form->control('Train_Composition');
            echo $this->Form->control('Train_type');
            echo $this->Form->control('Train_Number');
            echo $this->Form->control('Dispatch_Time_Starting', ['empty' => true]);
            echo $this->Form->control('Train_Mass_In_Tones');
            echo $this->Form->control('Train_Lenght_In_Meters');
            echo $this->Form->control('In_Out_Train');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
