<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wagon Entity
 *
 * @property int $ID_wagon
 * @property int|null $NumberWagonAxles
 * @property float|null $NetMassCargo
 * @property int|null $Type
 * @property float|null $WagonLenght
 * @property float|null $WagonMass
 * @property float|null $BrakeWeight
 * @property int|null $TypeofCargo
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
        'NumberWagonAxles' => true,
        'NetMassCargo' => true,
        'Type' => true,
        'WagonLenght' => true,
        'WagonMass' => true,
        'BrakeWeight' => true,
        'TypeofCargo' => true
    ];
}
