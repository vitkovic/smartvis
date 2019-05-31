<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Train $train
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Train'), ['action' => 'edit', $train->ID_Train]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Train'), ['action' => 'delete', $train->ID_Train], ['confirm' => __('Are you sure you want to delete # {0}?', $train->ID_Train)]) ?> </li>
        <li><?= $this->Html->link(__('List Train'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Train'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="train view large-10 medium-9 columns content">
    <h3><?= h($train->ID_Train) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Train Weight Per Axle') ?></th>
            <td><?= $this->Number->format($train->Train_Weight_per_Axle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Composition') ?></th>
            <td><?= $this->Number->format($train->Train_Composition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Train') ?></th>
            <td><?= $this->Number->format($train->ID_Train) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Type') ?></th>
            <td><?= $this->Number->format($train->Train_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Number') ?></th>
            <td><?= $this->Number->format($train->Train_Number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Mass In Tones') ?></th>
            <td><?= $this->Number->format($train->Train_Mass_In_Tones) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Lenght In Meters') ?></th>
            <td><?= $this->Number->format($train->Train_Lenght_In_Meters) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('InOut') ?></th>
            <td><?= $this->Number->format($train->InOut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispatch Time Starting') ?></th>
            <td><?= h($train->Dispatch_Time_Starting) ?></td>
        </tr>
    </table>
</div>
