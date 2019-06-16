<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $ID_User
 * @property string|null $Phone
 * @property string|null $Role
 * @property string|null $Type
 * @property string|null $First_Name
 * @property string|null $Last_Name
 * @property string|null $Email
 * @property string|null $username
 */
class Person extends Entity
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
        'Phone' => true,
        'Role' => true,
        'Type' => true,
        'First_Name' => true,
        'Last_Name' => true,
        'Email' => true,
        'username' => true
    ];
}
