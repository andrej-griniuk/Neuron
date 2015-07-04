<?php
namespace App\Model\Table;

use App\Model\Entity\Citation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Citations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Citings
 * @property \Cake\ORM\Association\BelongsTo $Citeds
 */
class CitationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('citations');
        $this->belongsTo('Citings', [
            'foreignKey' => 'citing_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Citeds', [
            'foreignKey' => 'cited_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['citing_id'], 'Citings'));
        $rules->add($rules->existsIn(['cited_id'], 'Citeds'));
        return $rules;
    }
}
