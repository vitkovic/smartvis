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
        <li><?= $this->Html->link(__('List Train'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Train'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Train Has Locomotive'), ['controller' => 'TrainHasLocomotive', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Train Has Locomotive'), ['controller' => 'TrainHasLocomotive', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="train view large-9 medium-8 columns content">
    <h3><?= h($train->ID_Train) ?></h3>
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
            <th scope="row"><?= __('In Out Train') ?></th>
            <td><?= $this->Number->format($train->In_Out_Train) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispatch Time Starting') ?></th>
            <td><?= h($train->Dispatch_Time_Starting) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Train Has Locomotive') ?></h4>
        <?php if (!empty($train->train_has_locomotive)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Locomotive Id') ?></th>
                <th scope="col"><?= __('Train Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($train->train_has_locomotive as $trainHasLocomotive): ?>
            <tr>
                <td><?= h($trainHasLocomotive->id) ?></td>
                <td><?= h($trainHasLocomotive->locomotive_id) ?></td>
                <td><?= h($trainHasLocomotive->train_id) ?></td>
                <td><?= h($trainHasLocomotive->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TrainHasLocomotive', 'action' => 'view', $trainHasLocomotive->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TrainHasLocomotive', 'action' => 'edit', $trainHasLocomotive->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TrainHasLocomotive', 'action' => 'delete', $trainHasLocomotive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainHasLocomotive->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
