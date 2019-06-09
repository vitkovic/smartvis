<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WagonHasSiding Entity
 *
 * @property int $ID_wagon
 * @property string|null $Description
 * @property int|null $ID_sidings
 * @property string $label
 * @property int|null $position
 * @property int $id
 */
class WagonHasSiding extends Entity
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
        'ID_wagon' => true,
        'Description' => true,
        'ID_sidings' => true,
        'label' => true,
        'position' => true
    ];
}
