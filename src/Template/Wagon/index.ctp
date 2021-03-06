<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wagon[]|\Cake\Collection\CollectionInterface $wagon
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wagon'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Destination'), ['controller' => 'Destination', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Destination'), ['controller' => 'Destination', 'action' => 'add']) ?></li>
        
    </ul>
</nav>
<div class="wagon index large-10 medium-9 columns content">
    <h3><?= __('List of Wagons') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID_wagon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Net_Mass_Cargo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Wagon_Lenght') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Wagon_Mass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Brake_Weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type_of_Cargo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Number_of_Axles') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('Destination_station') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Arrival_station') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('Remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arrival_id') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('people_id') ?></th>-->
                 <?php if ($setvisibility != 'visibility:hidden'): ?>
                
                	<th scope="col" class="actions"><?= __('Actions') ?></th>
                
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wagon as $wagon): ?>
            <tr>
                <td><?= $this->Number->format($wagon->ID_wagon) ?></td>
                <td><?= h($wagon->Description) ?></td>
                <td><?= $this->Number->format($wagon->Net_Mass_Cargo) ?></td>
                <td><?= h($wagon->Type) ?></td>
                <td><?= $this->Number->format($wagon->Wagon_Lenght) ?></td>
                <td><?= $this->Number->format($wagon->Wagon_Mass) ?></td>
                <td><?= $this->Number->format($wagon->Brake_Weight) ?></td>
                <td><?= h($wagon->Type_of_Cargo) ?></td>
                <td><?= $this->Number->format($wagon->Number_of_Axles) ?></td>
                <!--<td><?= h($wagon->Destination_station) ?></td>
                <td><?= h($wagon->Arrival_station) ?></td>-->
                <td><?= h($wagon->Remark) ?></td>
                <td><?= $wagon->has('destination') ? $this->Html->link($wagon->destination->name, ['controller' => 'Destination', 'action' => 'view', $wagon->destination->id]) : '' ?></td>
                <td><?= $wagon->has('destination') ? $this->Html->link($wagon->destination->name, ['controller' => 'Destination', 'action' => 'view', $wagon->destination->id]) : '' ?></td>
               <!-- <td><?= $wagon->has('person') ? $this->Html->link($wagon->person->username, ['controller' => 'People', 'action' => 'view', $wagon->person->ID_User]) : '' ?></td>-->
	             <?php if ($setvisibility != 'visibility:hidden'): ?> 
	                <td class="actions" style="<?= $setvisibility; ?>">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $wagon->ID_wagon]) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wagon->ID_wagon]) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wagon->ID_wagon], ['confirm' => __('Are you sure you want to delete # {0}?', $wagon->ID_wagon)]) ?>
	                </td>
	              <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
