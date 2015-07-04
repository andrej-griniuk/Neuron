<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patent Entity.
 */
class Patent extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'keyword' => true,
        'publication_date' => true,
        'inventors' => true,
    ];
}
