<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drawing $drawing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Drawing'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="drawing form large-9 medium-8 columns content">
    <?= $this->Form->create($drawing) ?>
    <fieldset>
        <legend><?= __('Add Drawing') ?></legend>
        <?php
            echo $this->Form->control('sidings_id', ['options' => $sidings, 'empty' => true]);
            echo $this->Form->control('wagon_id');
            echo $this->Form->control('graphics');
            echo $this->Form->control('note');
            echo $this->Form->control('sidings_g_m');
            echo $this->Form->control('wagon_g_m');
            echo $this->Form->control('other_graphics');
            echo $this->Form->control('showgraphics');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
