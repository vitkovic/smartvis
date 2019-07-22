<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrainHasSiding Entity
 *
 * @property int $id
 * @property int $train_id
 * @property int $siding_id
 * @property string $description
 *
 * @property \App\Model\Entity\Train $train
 * @property \App\Model\Entity\Siding $siding
 */
class TrainHasSiding extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'train_id' => true,
        'siding_id' => true,
        'description' => true,
        'train' => true,
        'siding' => true
    ];
}
