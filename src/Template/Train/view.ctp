<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Train $train
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Train'), ['action' => 'edit', $train->ID_Train]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Train'), ['action' => 'delete', $train->ID_Train], ['confirm' => __('Are you sure you want to delete # {0}?', $train->ID_Train)]) ?> </li>
        <li><?= $this->Html->link(__('List Trains'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Train'), ['action' => 'add']) ?> </li>
       
    </ul>
</nav>
<div class="train view large-9 medium-8 columns content">
    <h3><?= h($train->Train_Number) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Train Type') ?></th>
            <td><?= h($train->Train_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Number') ?></th>
            <td><?= h($train->Train_Number) ?></td>
        </tr>
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
            <th scope="row"><?= __('Train Mass In Tones') ?></th>
            <td><?= $this->Number->format($train->Train_Mass_In_Tones) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Train Lenght In Meters') ?></th>
            <td><?= $this->Number->format($train->Train_Lenght_In_Meters) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Dispatch Time Starting') ?></th>
            <td><?= h($train->Dispatch_Time_Starting) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Locomotive') ?></h4>
        <?php if (is_array($train->locomotive)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('type') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trainHasLocomotives as $trainHasLocomotive): ?>
            <tr>
                <td><?= h($trainHasLocomotive->id) ?></td>
                <td><?= h($trainHasLocomotive->type) ?></td>
                <td><?= h($trainHasLocomotive->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locomotive', 'action' => 'view', $trainHasLocomotive->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locomotive', 'action' => 'edit', $trainHasLocomotive->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locomotive', 'action' => 'delete', $trainHasLocomotive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainHasLocomotive->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    
    <div class="related">
        <h4>List of wagons for train <?= h($train->Train_Number) ?></h4>
        <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                 <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Wagon Label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Wagon_Lenght') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Wagon_Mass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Break_Weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arrival_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Remark') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wagonstemp as $wagon): $tid = $wagon['Train_Number'];?>
            <tr>
                <td><?= h($wagon['ID_wagon']) ?></td>
                <td><?= h($wagon['Description']) ?></td>
                <td><?= h($wagon['Type']) ?></td>
                <td><?= $this->Number->format($wagon['Wagon_Lenght']) ?></td>
                <td><?= $this->Number->format($wagon['Wagon_Mass']) ?></td>
                 <td><?= $this->Number->format($wagon['Brake_Weight']) ?></td>
                <td><?= $this->Html->link($wagon['Destination'], ['controller' => 'Destination', 'action' => 'view', $wagon->destination->id])?></td>
                <td><?= $this->Html->link($wagon['Arrival'], ['controller' => 'Destination', 'action' => 'view', $wagon->destination->id]) ?></td>
                <td><?= h($wagon['Remark']) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wagon['Wagon_id']]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $wagon['Wagon_id']]) ?>
                    <?= $this->Html->link(Delete, ['controller' => 'WagonHasTrain', 'action' => 'delete', $wagon['wid']])?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
