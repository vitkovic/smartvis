<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wagon Entity
 *
 * @property int $ID_wagon
 * @property string $Description
 * @property float|null $Net_Mass_Cargo
 * @property string|null $Type
 * @property float $Wagon_Lenght
 * @property float|null $Wagon_Mass
 * @property float $Brake_Weight
 * @property string|null $Type_of_Cargo
 * @property int|null $Number_of_Axles
 * @property string|null $Destination_station
 * @property string|null $Arrival_station
 * @property string|null $Remark
 * @property int $destination_id
 * @property int $arrival_id
 * @property int $people_id
 *
 * @property \App\Model\Entity\Destination $destination
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Drawing[] $drawing
 */
class Wagon extends Entity
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
        'Description' => true,
        'Net_Mass_Cargo' => true,
        'Type' => true,
        'Wagon_Lenght' => true,
        'Wagon_Mass' => true,
        'Brake_Weight' => true,
        'Type_of_Cargo' => true,
        'Number_of_Axles' => true,
        'Destination_station' => true,
        'Arrival_station' => true,
        'Remark' => true,
        'destination_id' => true,
        'arrival_id' => true,
        'people_id' => true,
        'destination' => true,
        'person' => true,
        'drawing' => true
    ];
}
