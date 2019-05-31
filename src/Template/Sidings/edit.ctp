<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Siding $siding
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $siding->IDsidings],
                ['confirm' => __('Are you sure you want to delete # {0}?', $siding->IDsidings)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sidings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sidings form large-10 medium-9 columns content">
    <?= $this->Form->create($siding) ?>
    <fieldset>
        <legend><?= __('Edit Siding') ?></legend>
        <?php
            echo $this->Form->control('Siding_purpose');
            echo $this->Form->control('Siding_lenght');
            echo $this->Form->control('Mass_per_axle');
            echo $this->Form->control('Siding_Type');
            echo $this->Form->control('IDSGroup');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
