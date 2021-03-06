<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSmart Entity
 *
 * @property int $ID_User
 * @property int|null $Phone
 * @property int|null $Role
 * @property int|null $Type
 * @property int|null $First_Name
 * @property int|null $Last_Name
 * @property int|null $Email
 * @property string|null $username
 */
class UserSmart extends Entity
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
