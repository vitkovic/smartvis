<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Train $train
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $train->ID_Train],
                ['confirm' => __('Are you sure you want to delete # {0}?', $train->ID_Train)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trains'), ['action' => 'index']) ?></li>
       
    </ul>
</nav>
<div class="train form large-9 medium-8 columns content">
    <?= $this->Form->create($train) ?>
    <fieldset>
        <legend><?= __('Edit Train') ?></legend>
        <?php
           
            echo $this->Form->control('Train_Composition');
            echo $this->Form->control('Train_Number');
            echo $this->Form->control('Dispatch_Time_Starting', ['empty' => true]);
         
           
           
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
