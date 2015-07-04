<?php
namespace App\Model\Table;

use App\Model\Entity\Inventor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patents
 * @property \Cake\ORM\Association\BelongsTo $Applns
 */
class InventorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('inventors');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Patents', [
            'foreignKey' => 'patent_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('pct_app', 'create')
            ->notEmpty('pct_app');

        $validator
            ->requirePresence('inv_name', 'create')
            ->notEmpty('inv_name');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('reg_code', 'create')
            ->notEmpty('reg_code');

        $validator
            ->requirePresence('ctry_code', 'create')
            ->notEmpty('ctry_code');

        $validator
            ->add('reg_share', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('reg_share');

        $validator
            ->add('inv_share', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('inv_share');

        return $validator;
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
        $rules->add($rules->existsIn(['patent_id'], 'Patents'));
        return $rules;
    }
}
