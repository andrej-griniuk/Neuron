<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventor Entity.
 */
class Inventor extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'patent_id' => true,
        'pct_app' => true,
        'appln_id' => true,
        'inv_name' => true,
        'address' => true,
        'reg_code' => true,
        'ctry_code' => true,
        'reg_share' => true,
        'inv_share' => true,
        'patent' => true,
        'appln' => true,
    ];
}
