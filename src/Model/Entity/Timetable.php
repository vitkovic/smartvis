<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Timetable Entity
 *
 * @property int $ID_Sidings
 * @property int $IDS_Group
 * @property int|null $Siding_Purpose
 * @property float|null $Siding_Lenght
 * @property float|null $Mass_per_Axle
 * @property int|null $Siding_Type
 * @property int $ID_Timetable
 */
class Timetable extends Entity
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
        'ID_Sidings' => true,
        'IDS_Group' => true,
        'Siding_Purpose' => true,
        'Siding_Lenght' => true,
        'Mass_per_Axle' => true,
        'Siding_Type' => true
    ];
}
