<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Destination $destination
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Destination'), ['action' => 'edit', $destination->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Destination'), ['action' => 'delete', $destination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $destination->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Destination'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Destination'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sidings'), ['controller' => 'Sidings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Siding'), ['controller' => 'Sidings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wagon'), ['controller' => 'Wagon', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wagon'), ['controller' => 'Wagon', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="destination view large-9 medium-8 columns content">
    <h3><?= h($destination->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($destination->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($destination->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sidings') ?></h4>
        <?php if (!empty($destination->sidings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('IDsidings') ?></th>
                <th scope="col"><?= __('Siding Purpose') ?></th>
                <th scope="col"><?= __('Siding Lenght') ?></th>
                <th scope="col"><?= __('Mass Per Axle') ?></th>
                <th scope="col"><?= __('Siding Type') ?></th>
                <th scope="col"><?= __('IDSGroup') ?></th>
                <th scope="col"><?= __('Destination Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($destination->sidings as $sidings): ?>
            <tr>
                <td><?= h($sidings->IDsidings) ?></td>
                <td><?= h($sidings->Siding_purpose) ?></td>
                <td><?= h($sidings->Siding_lenght) ?></td>
                <td><?= h($sidings->Mass_per_axle) ?></td>
                <td><?= h($sidings->Siding_Type) ?></td>
                <td><?= h($sidings->IDSGroup) ?></td>
                <td><?= h($sidings->destination_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sidings', 'action' => 'view', $sidings->IDsidings]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sidings', 'action' => 'edit', $sidings->IDsidings]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sidings', 'action' => 'delete', $sidings->IDsidings], ['confirm' => __('Are you sure you want to delete # {0}?', $sidings->IDsidings)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Wagon') ?></h4>
        <?php if (!empty($destination->wagon)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID Wagon') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Net Mass Cargo') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Wagon Lenght') ?></th>
                <th scope="col"><?= __('Wagon Mass') ?></th>
                <th scope="col"><?= __('Brake Weight') ?></th>
                <th scope="col"><?= __('Type Of Cargo') ?></th>
                <th scope="col"><?= __('Number Of Axles') ?></th>
                <th scope="col"><?= __('Destination Station') ?></th>
                <th scope="col"><?= __('Arrival Station') ?></th>
                <th scope="col"><?= __('Remark') ?></th>
                <th scope="col"><?= __('Destination Id') ?></th>
                <th scope="col"><?= __('Arrival Id') ?></th>
                <th scope="col"><?= __('People Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($destination->wagon as $wagon): ?>
            <tr>
                <td><?= h($wagon->ID_wagon) ?></td>
                <td><?= h($wagon->Description) ?></td>
                <td><?= h($wagon->Net_Mass_Cargo) ?></td>
                <td><?= h($wagon->Type) ?></td>
                <td><?= h($wagon->Wagon_Lenght) ?></td>
                <td><?= h($wagon->Wagon_Mass) ?></td>
                <td><?= h($wagon->Brake_Weight) ?></td>
                <td><?= h($wagon->Type_of_Cargo) ?></td>
                <td><?= h($wagon->Number_of_Axles) ?></td>
                <td><?= h($wagon->Destination_station) ?></td>
                <td><?= h($wagon->Arrival_station) ?></td>
                <td><?= h($wagon->Remark) ?></td>
                <td><?= h($wagon->destination_id) ?></td>
                <td><?= h($wagon->arrival_id) ?></td>
                <td><?= h($wagon->people_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Wagon', 'action' => 'view', $wagon->ID_wagon]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Wagon', 'action' => 'edit', $wagon->ID_wagon]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Wagon', 'action' => 'delete', $wagon->ID_wagon], ['confirm' => __('Are you sure you want to delete # {0}?', $wagon->ID_wagon)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
