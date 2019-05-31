<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Train Entity
 *
 * @property float $Train_Weight_per_Axle
 * @property int|null $Train_Composition
 * @property int $ID_Train
 * @property int|null $Train_type
 * @property int|null $Train_Number
 * @property \Cake\I18n\FrozenDate|null $Dispatch_Time_Starting
 * @property float|null $Train_Mass_In_Tones
 * @property float|null $Train_Lenght_In_Meters
 * @property int|null $InOut
 */
class Train extends Entity
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
        'Train_Weight_per_Axle' => true,
        'Train_Composition' => true,
        'Train_type' => true,
        'Train_Number' => true,
        'Dispatch_Time_Starting' => true,
        'Train_Mass_In_Tones' => true,
        'Train_Lenght_In_Meters' => true,
        'InOut' => true
    ];
}
