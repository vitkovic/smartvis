<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Locomotive Entity
 *
 * @property int $id
 * @property string $type
 * @property string $description
 *
 * @property \App\Model\Entity\TrainHasLocomotive[] $train_has_locomotive
 */
class Locomotive extends Entity
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
        'type' => true,
        'description' => true,
        'train_has_locomotive' => true
    ];
}
