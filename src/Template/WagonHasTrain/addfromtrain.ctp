<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WagonHasTrain $wagonHasTrain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wagons for Trains'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="wagonHasTrain form large-9 medium-8 columns content">
     <h3><?= __('Wagons for Train') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Wagon_Lenght') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Wagon_Mass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arrival_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wagonstemp as $wagon): $tid = $wagon['Train_Number'];?>
            <tr>
                <td><?= h($wagon['Description']) ?></td>
                <td><?= h($wagon['Type']) ?></td>
                <td><?= $this->Number->format($wagon['Wagon_Lenght']) ?></td>
                <td><?= $this->Number->format($wagon['Wagon_Mass']) ?></td>
                <td><?= $this->Html->link($wagon['Destination'], ['controller' => 'Destination', 'action' => 'view', $wagon->destination->id])?></td>
                <td><?= $this->Html->link($wagon['Arrival'], ['controller' => 'Destination', 'action' => 'view', $wagon->destination->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wagon['Wagon_id']]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $wagon['Wagon_id']]) ?>
                    <?= $this->Html->link(Delete, ['controller' => 'WagonHasTrain', 'action' => 'delete', $wagon['wid']])?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
 <?= $this->Form->create($wagonHasTrain,['url' => ['action' => 'addfromtrain']]) ?>
    <fieldset>
        <legend><?= __('Add Multiple Wagons To Train') ?></legend>
        <?php
            echo $this->Form->control('Wagon_id', ['type' => 'select', 'multiple'=>'multipe']);
            echo $this->Form->control('Train_id');
            echo $this->Form->control('multi', ['type' => 'hidden', 'value'=>'m']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
