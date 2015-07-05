<?php
namespace App\Model\Table;

use App\Model\Entity\Patent;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patents Model
 *
 * @property \Cake\ORM\Association\HasMany $Inventors
 */
class PatentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('patents');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Inventors', [
            'foreignKey' => 'patent_id'
        ]);
        /*
        $this->hasMany('Citing', [
            'className' => 'Citations',
            'foreignKey' => 'citing_id'
        ]);
        $this->hasMany('Cited', [
            'className' => 'Citations',
            'foreignKey' => 'cited_id'
        ]);
        */
        $this->belongsToMany('Citing', [
            'className'        => 'Patents',
            'joinTable'        => 'citations',
            'foreignKey'       => 'cited_id',
            'targetForeignKey' => 'citing_id',
        ]);
        $this->belongsToMany('Cited', [
            'className'        => 'Patents',
            'joinTable'        => 'citations',
            'foreignKey'       => 'citing_id',
            'targetForeignKey' => 'cited_id',
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

        //$validator
        //    ->requirePresence('title', 'create')
        //    ->allowEmpty();

        return $validator;
    }
}
