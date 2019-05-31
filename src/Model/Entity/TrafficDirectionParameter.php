<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrafficDirectionParameter Entity
 *
 * @property int $IDTDP
 * @property int $Locomotive_Type
 * @property int $Limitations
 * @property float $Maximum_Train_Length
 */
class TrafficDirectionParameter extends Entity
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
        'Locomotive_Type' => true,
        'Limitations' => true,
        'Maximum_Train_Length' => true
    ];
}
