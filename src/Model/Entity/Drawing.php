<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Drawing Entity
 *
 * @property int $id_draw
 * @property int|null $sidings_id
 * @property int|null $wagon_id
 * @property string|null $graphics
 * @property string|null $note
 * @property string $sidings_g_m
 * @property string $wagon_g_m
 * @property string|null $other_graphics
 * @property int|null $showgraphics
 *
 * @property \App\Model\Entity\Siding $siding
 * @property \App\Model\Entity\Wagon $wagon
 */
class Drawing extends Entity
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
        'sidings_id' => true,
        'wagon_id' => true,
        'graphics' => true,
        'note' => true,
        'sidings_g_m' => true,
        'wagon_g_m' => true,
        'other_graphics' => true,
        'showgraphics' => true,
        'siding' => true,
        'wagon' => true
    ];
}
