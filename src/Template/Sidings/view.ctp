<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Siding $siding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Siding'), ['action' => 'edit', $siding->IDsidings]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Siding'), ['action' => 'delete', $siding->IDsidings], ['confirm' => __('Are you sure you want to delete # {0}?', $siding->IDsidings)]) ?> </li>
        <li><?= $this->Html->link(__('List Sidings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Siding'), ['action' => 'add']) ?> </li>
      </ul>
</nav>
<div class="sidings view large-9 medium-8 columns content">
    <h3><?= h($siding->IDsidings) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Siding Purpose') ?></th>
            <td><?= h($siding->Siding_purpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mass Per Axle') ?></th>
            <td><?= h($siding->Mass_per_axle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siding Type') ?></th>
            <td><?= h($siding->Siding_Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDsidings') ?></th>
            <td><?= $this->Number->format($siding->IDsidings) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siding Lenght') ?></th>
            <td><?= $this->Number->format($siding->Siding_lenght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IDSGroup') ?></th>
            <td><?= $this->Number->format($siding->IDSGroup) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination Id') ?></th>
            <td><?= $this->Number->format($siding->destination_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Train') ?></h4>
        <?php if (!empty($siding->train)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Train Weight Per Axle') ?></th>
                <th scope="col"><?= __('Train Composition') ?></th>
                <th scope="col"><?= __('ID Train') ?></th>
                <th scope="col"><?= __('Train Type') ?></th>
                <th scope="col"><?= __('Train Number') ?></th>
                <th scope="col"><?= __('Dispatch Time Starting') ?></th>
                <th scope="col"><?= __('Train Mass In Tones') ?></th>
                <th scope="col"><?= __('Train Lenght In Meters') ?></th>
                <th scope="col"><?= __('In Out Train') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($siding->train as $train): ?>
            <tr>
                <td><?= h($train->Train_Weight_per_Axle) ?></td>
                <td><?= h($train->Train_Composition) ?></td>
                <td><?= h($train->ID_Train) ?></td>
                <td><?= h($train->Train_type) ?></td>
                <td><?= h($train->Train_Number) ?></td>
                <td><?= h($train->Dispatch_Time_Starting) ?></td>
                <td><?= h($train->Train_Mass_In_Tones) ?></td>
                <td><?= h($train->Train_Lenght_In_Meters) ?></td>
                <td><?= h($train->In_Out_Train) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Train', 'action' => 'view', $train->ID_Train]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Train', 'action' => 'edit', $train->ID_Train]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Train', 'action' => 'delete', $train->ID_Train], ['confirm' => __('Are you sure you want to delete # {0}?', $train->ID_Train)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
