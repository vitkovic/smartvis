<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrafficDirection Entity
 *
 * @property int $ID_Traffic_Direction
 * @property string|null $Mass_Per_Axle
 * @property string|null $Traffic_Direction
 */
class TrafficDirection extends Entity
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
        'Mass_Per_Axle' => true,
        'Traffic_Direction' => true
    ];
}
