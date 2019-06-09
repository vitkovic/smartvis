<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TempWagon Entity
 *
 * @property int $Temp_Id
 * @property int $Wagon_id
 * @property string $Description
 * @property int $Timetable_id
 *
 * @property \App\Model\Entity\Wagon $wagon
 * @property \App\Model\Entity\Timetable $timetable
 */
class TempWagon extends Entity
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
        'Description' => true,
        'Timetable_id' => true,
        'wagon' => true,
        'timetable' => true
    ];
}
