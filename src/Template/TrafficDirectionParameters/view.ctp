<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrafficDirectionParameter $trafficDirectionParameter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Traffic Direction Parameter'), ['action' => 'edit', $trafficDirectionParameter->IDTDP]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Traffic Direction Parameter'), ['action' => 'delete', $trafficDirectionParameter->IDTDP], ['confirm' => __('Are you sure you want to delete # {0}?', $trafficDirectionParameter->IDTDP)]) ?> </li>
        <li><?= $this->Html->link(__('List Traffic Direction Parameters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Traffic Direction Parameter'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trafficDirectionParameters view large-9 medium-8 columns content">
    <h3><?= h($trafficDirectionParameter->IDTDP) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IDTDP') ?></th>
            <td><?= $this->Number->format($trafficDirectionParameter->IDTDP) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locomotive Type') ?></th>
            <td><?= $this->Number->format($trafficDirectionParameter->Locomotive_Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Limitations') ?></th>
            <td><?= $this->Number->format($trafficDirectionParameter->Limitations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Maximum Train Length') ?></th>
            <td><?= $this->Number->format($trafficDirectionParameter->Maximum_Train_Length) ?></td>
        </tr>
    </table>
</div>
