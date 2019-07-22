<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WagonHasTrain Entity
 *
 * @property int $id
 * @property int $Wagon_id
 * @property int $Train_id
 *
 * @property \App\Model\Entity\Wagon $wagon
 * @property \App\Model\Entity\Train $train
 */
class WagonHasTrain extends Entity
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
        'Wagon_id' => true,
        'Train_id' => true,
        'wagon' => true,
        'train' => true
    ];
}
