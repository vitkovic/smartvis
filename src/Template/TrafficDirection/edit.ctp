<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrafficDirection $trafficDirection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trafficDirection->ID_Traffic_Direction],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trafficDirection->ID_Traffic_Direction)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Traffic Direction'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="trafficDirection form large-9 medium-8 columns content">
    <?= $this->Form->create($trafficDirection) ?>
    <fieldset>
        <legend><?= __('Edit Traffic Direction') ?></legend>
        <?php
            echo $this->Form->control('Mass_Per_Axle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
