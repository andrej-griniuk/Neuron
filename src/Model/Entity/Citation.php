<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Citation Entity.
 */
class Citation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'citing_id' => true,
        'cited_id' => true,
        'citing' => true,
        'cited' => true,
    ];
}
