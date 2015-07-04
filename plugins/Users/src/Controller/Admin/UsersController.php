<?php
namespace Users\Controller\Admin;

use Admin\Controller\AppController;

/**
 * Users Controller
 *
 * @property \Users\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $components = [
        'Crud.Crud' => [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Edit',
                'Crud.Delete'
            ]
        ]
    ];

    public function active($userId, $isActive)
    {
        if ($this->request->is('post')) {
            $user = $this->Users->get($userId);
            $user->is_active = (bool) $isActive;
            $this->Users->save($user);

            $this->Flash->success(__('User updated!'));
        }

        return $this->redirect($this->referer());
    }
}
