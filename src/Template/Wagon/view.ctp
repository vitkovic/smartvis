<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wagon $wagon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wagon'), ['action' => 'edit', $wagon->ID_wagon]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wagon'), ['action' => 'delete', $wagon->ID_wagon], ['confirm' => __('Are you sure you want to delete # {0}?', $wagon->ID_wagon)]) ?> </li>
        <li><?= $this->Html->link(__('List Wagon'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wagon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Destination'), ['controller' => 'Destination', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Destination'), ['controller' => 'Destination', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drawing'), ['controller' => 'Drawing', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Drawing'), ['controller' => 'Drawing', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wagon view large-9 medium-8 columns content">
    <h3><?= h($wagon->ID_wagon) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($wagon->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($wagon->Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Of Cargo') ?></th>
            <td><?= h($wagon->Type_of_Cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination Station') ?></th>
            <td><?= h($wagon->Destination_station) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arrival Station') ?></th>
            <td><?= h($wagon->Arrival_station) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remark') ?></th>
            <td><?= h($wagon->Remark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= $wagon->has('destination') ? $this->Html->link($wagon->destination->name, ['controller' => 'Destination', 'action' => 'view', $wagon->destination->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= $wagon->has('person') ? $this->Html->link($wagon->person->ID_User, ['controller' => 'People', 'action' => 'view', $wagon->person->ID_User]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID Wagon') ?></th>
            <td><?= $this->Number->format($wagon->ID_wagon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Net Mass Cargo') ?></th>
            <td><?= $this->Number->format($wagon->Net_Mass_Cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wagon Lenght') ?></th>
            <td><?= $this->Number->format($wagon->Wagon_Lenght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wagon Mass') ?></th>
            <td><?= $this->Number->format($wagon->Wagon_Mass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brake Weight') ?></th>
            <td><?= $this->Number->format($wagon->Brake_Weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Axles') ?></th>
            <td><?= $this->Number->format($wagon->Number_of_Axles) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination Id') ?></th>
            <td><?= $this->Number->format($wagon->destination_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Drawing') ?></h4>
        <?php if (!empty($wagon->drawing)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Draw') ?></th>
                <th scope="col"><?= __('Sidings Id') ?></th>
                <th scope="col"><?= __('Wagon Id') ?></th>
                <th scope="col"><?= __('Graphics') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Sidings G M') ?></th>
                <th scope="col"><?= __('Wagon G M') ?></th>
                <th scope="col"><?= __('Other Graphics') ?></th>
                <th scope="col"><?= __('Showgraphics') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($wagon->drawing as $drawing): ?>
            <tr>
                <td><?= h($drawing->id_draw) ?></td>
                <td><?= h($drawing->sidings_id) ?></td>
                <td><?= h($drawing->wagon_id) ?></td>
                <td><?= h($drawing->graphics) ?></td>
                <td><?= h($drawing->note) ?></td>
                <td><?= h($drawing->sidings_g_m) ?></td>
                <td><?= h($drawing->wagon_g_m) ?></td>
                <td><?= h($drawing->other_graphics) ?></td>
                <td><?= h($drawing->showgraphics) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Drawing', 'action' => 'view', $drawing->id_draw]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Drawing', 'action' => 'edit', $drawing->id_draw]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Drawing', 'action' => 'delete', $drawing->id_draw], ['confirm' => __('Are you sure you want to delete # {0}?', $drawing->id_draw)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
