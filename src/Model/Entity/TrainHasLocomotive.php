<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrainHasLocomotive Entity
 *
 * @property int $id
 * @property int $locomotive_id
 * @property int $train_id
 * @property string $description
 *
 * @property \App\Model\Entity\Locomotive $locomotive
 * @property \App\Model\Entity\Train $train
 */
class TrainHasLocomotive extends Entity
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
        'locomotive_id' => true,
        'train_id' => true,
        'description' => true,
        'locomotive' => true,
        'train' => true
    ];
}
