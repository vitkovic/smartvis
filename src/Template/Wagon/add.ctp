<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wagon $wagon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wagon'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="wagon form large-9 medium-8 columns content">
    <?= $this->Form->create($wagon) ?>
    <fieldset>
        <legend><?= __('Add Wagon') ?></legend>
        <?php
            echo $this->Form->control('Description');
            echo $this->Form->control('Net_Mass_Cargo');
            echo $this->Form->control('Type');
            echo $this->Form->control('Wagon_Lenght');
            echo $this->Form->control('Wagon_Mass');
            echo $this->Form->control('Brake_Weight');
            echo $this->Form->control('Type_of_Cargo');
            echo $this->Form->control('Number_of_Axles');
            echo $this->Form->control('Destination_station');
            echo $this->Form->control('Arrival_station');
            echo $this->Form->control('Remark');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
