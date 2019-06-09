<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Timetable Entity
 *
 * @property string|null $Source
 * @property string $Destination
 * @property \Cake\I18n\FrozenDate|null $Arrival_Date
 * @property \Cake\I18n\FrozenDate|null $Dispatch_Date
 * @property \Cake\I18n\FrozenTime|null $Arrival_Time
 * @property \Cake\I18n\FrozenTime|null $Dispatch_Time
 * @property int|null $Train_id
 * @property int $ID_Timetable
 *
 * @property \App\Model\Entity\Train $train
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
        'Source' => true,
        'Destination' => true,
        'Arrival_Date' => true,
        'Dispatch_Date' => true,
        'Arrival_Time' => true,
        'Dispatch_Time' => true,
        'Train_id' => true,
        'train' => true
    ];
}
