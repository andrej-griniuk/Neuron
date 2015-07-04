<?php
namespace Users\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\Entity;
use Cake\Event\Event;
use Cake\Validation\Validator;
use Users\Model\Entity\User;
use Cake\I18n\Time;
use Cake\Core\Configure;
use Hybrid_Auth;
use Users\Event\UserEventListener;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('full_name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        //$this->belongsTo('Teams', [
        //    'className' => 'Incidents.Teams'
        //]);

        $this->eventManager()->on(new UserEventListener());
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->add('email', 'valid', ['rule' => 'email', 'last' => true])
            ->add('email', 'unique', [
                'rule' => ['validateUnique', ['scope' => 'provider']],
                'provider' => 'table',
                'message' => __('This email is already in use'),
            ])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        return $validator;
    }

    public function validationEmail(Validator $validator)
    {
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        return $validator;
    }

    public function validationRegister(Validator $validator)
    {
        $validator = $this->validationDefault($validator);
        $validator = $this->validationPasswordChange($validator);

        return $validator;
    }

    public function validationPassword(Validator $validator)
    {
        $validator
            ->requirePresence('password')
            ->add('password', 'valid', [
                'rule'    => ['custom', '/^[\w\d_\s]{7,255}$/'],
                'last'    => true,
                'message' => 'Please enter valid password (min 7 characters)'
            ]);

        return $validator;
    }

    public function validationPasswordChange(Validator $validator)
    {
        $validator = $this->validationPassword($validator);

        $validator
            ->requirePresence('password_repeat')
            ->add('password', 'repeat', [
                'rule'    => function ($value, $context) {
                    return ($value == $context['data']['password_repeat']);
                },
                'message' => 'The passwords do not match'
            ]);

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
        //$rules->add($rules->isUnique(['email']));
        //$rules->add($rules->existsIn(['team_id'], 'Teams'));
        return $rules;
    }

    public function logLogin($id)
    {
        $user = $this->get($id);
        $user->last_login_date = new Time();
        $user->last_login_ip = $_SERVER['REMOTE_ADDR'];
        $user->hash = sha1(date('Y-m-d H:i:s'));

        return $this->save($user);
    }

    public function registerCallback($provider, $profile)
    {
        $ha = new Hybrid_Auth(Configure::read('HybridAuth'));
        $adapter = $ha->getAdapter($provider);
        $accessToken = $adapter->getAccessToken();

        $user = $this->newEntity();
        $user->provider = $provider;
        $user->provider_uid = $profile->identifier;
        $user->name = "{$profile->firstName} {$profile->lastName}";
        $user->email = $profile->email;
        $user->image = $profile->photoURL;
        $user->token = $accessToken['access_token'];
        $user->token_secret = $accessToken['access_token_secret'];
        $this->save($user);

        return $user;
    }

    public function reloadSessionData($session, $userId)
    {
        $user = $this->get($userId);
        $session->write('Auth.User', $user->toArray());
    }
}
