<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wagon $wagon
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wagon'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="wagon form large-10 medium-9 columns content">
    <?= $this->Form->create($wagon) ?>
    <fieldset>
        <legend><?= __('Add Wagon') ?></legend>
        <?php
            echo $this->Form->control('NumberWagonAxles');
            echo $this->Form->control('NetMassCargo');
            echo $this->Form->control('Type');
            echo $this->Form->control('WagonLenght');
            echo $this->Form->control('WagonMass');
            echo $this->Form->control('BrakeWeight');
            echo $this->Form->control('TypeofCargo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
