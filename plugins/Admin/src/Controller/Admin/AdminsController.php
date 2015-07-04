<?php
namespace Admin\Controller\Admin;

use Admin\Controller\AppController;
use Cake\Event\Event;

/**
 * Admins Controller
 *
 * @property \Admin\Model\Table\AdminsTable $Admins
 */
class AdminsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['login', 'logout']);
    }

    public function login()
    {
        $this->layout = 'Admin.login';

        if ($this->request->is('post')) {
            if ($user = $this->Auth->identify()) {
                $this->Auth->setUser($user);

                $this->Admins->logLogin($user['id']);

                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Invalid email or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function add()
    {
        $this->Crud->action()->saveOptions(['validate' => 'password']);

        return $this->Crud->execute();
    }

    public function edit($id)
    {
        $this->Crud->on('beforeSave', function (Event $event) {
            if (!empty($this->request->data['password'])) {
                $this->Crud->action()->saveOptions(['validate' => 'password']);
            } else {
                $event->subject->entity->accessible('password', false);
            }
        });

        return $this->Crud->execute();
    }

    public function profile()
    {
        $admin = $this->loadModel('Admin.Admins')->get($this->Auth->user('id'));

        if ($this->request->is(['post', 'put', 'patch'])) {
            $admin->accessible('*', false);
            $admin->accessible('password', true);
            $data = $this->Admin->patchEntity($admin, $this->request->data, ['validate' => 'password_change']);
            if ($this->Admin->save($data)) {
                $this->Flash->success('The entry has been saved.');

                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error('The entry could not be saved. Please, try again.');
            }
        }

        $this->set(compact('admin'));
    }
}
