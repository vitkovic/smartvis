<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Siding Entity
 *
 * @property int $IDsidings
 * @property string|null $Siding_purpose
 * @property float|null $Siding_lenght
 * @property string|null $Mass_per_axle
 * @property string|null $Siding_Type
 * @property int $IDSGroup
 */
class Siding extends Entity
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
        'Siding_purpose' => true,
        'Siding_lenght' => true,
        'Mass_per_axle' => true,
        'Siding_Type' => true,
        'IDSGroup' => true
    ];
}
