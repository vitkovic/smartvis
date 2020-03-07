<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrafficDirectionParameter $trafficDirectionParameter
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trafficDirectionParameter->IDTDP],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trafficDirectionParameter->IDTDP)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Traffic Direction Parameters'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="trafficDirectionParameters form large-10 medium-9 columns content">
    <?= $this->Form->create($trafficDirectionParameter) ?>
    <fieldset>
        <legend><?= __('Edit Traffic Direction Parameter') ?></legend>
        <?php
            echo $this->Form->control('Locomotive_Type');
            echo $this->Form->control('Limitations');
            echo $this->Form->control('Maximum_Train_Length');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),array('style'=>$setvisibility)) ?>
    <?= $this->Form->end() ?>
</div>
