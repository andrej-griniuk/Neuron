<?php

namespace Admin\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    public $layout = 'Admin.default';

    use \Crud\Controller\ControllerTrait;

    public $components = [
        'Crud.Crud' => [
            'actions' => [
                'add' => ['className' => 'Crud.Add', 'view' => 'edit'],
                'Crud.Index',
                'Crud.Edit',
                'Crud.Delete'
            ]
        ]
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth', [
            'authenticate'   => [
                'Form' => [
                    'userModel'  => 'Admin.Admins',
                    'fields'     => ['username' => 'email'],
                    'scope'      => [
                        'is_active' => 1
                    ],
                    'sessionKey' => true,
                ]
            ],
            'loginAction'    => [
                'controller' => 'Admins',
                'action'     => 'login',
                'plugin'     => 'Admin',
                'prefix'     => 'admin'
            ],
            'loginRedirect'  => [
                'controller' => 'Studios',
                'action'     => 'index',
                'plugin'     => 'Studios',
                'prefix'     => 'admin'
            ],
            'logoutRedirect' => [
                'controller' => 'Admins',
                'action'     => 'login',
                'plugin'     => 'Admin',
                'prefix'     => 'admin'
            ],
        ]);

        $this->Auth->deny();

        $this->set('userInfo', $this->Auth->user());
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Crud->on('setFlash', function(Event $event) {
            $event->subject()->params['class'] = str_replace(
                'message ',
                'alert alert-dismissible fade in alert-',
                $event->subject()->params['class']
            );
        });
    }
}
