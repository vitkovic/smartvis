<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrafficDirection $trafficDirection
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Traffic Direction'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="trafficDirection form large-10 medium-9 columns content">
    <?= $this->Form->create($trafficDirection) ?>
    <fieldset>
        <legend><?= __('Add Traffic Direction') ?></legend>
        <?php
            echo $this->Form->control('Mass_Per_Axle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
