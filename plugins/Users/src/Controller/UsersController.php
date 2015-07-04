<?php
namespace Users\Controller;

use Cake\Controller\Component\AuthComponent;
use Users\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Bake\Utility\Model\AssociationFilter;
use Hybrid_Provider_Adapter;
use Cake\Network\Exception\InternalErrorException;

/**
 * Users Controller
 *
 * @property \Users\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->deny(['profile']);
    }

    public function register()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $user = $this->Users->newEntity();
        $user->accessible('provider', true);
        $this->request->data['provider'] = '';
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'register']);
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user->toArray());
                $this->Users->logLogin($user->id);

                $this->Flash->success(__('Welcome to FaceUp!'));

                return $this->redirect($this->Auth->redirectUrl());
            }
        }

        $this->set('user', $user);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            if ($user = $this->Auth->identify()) {
                $this->Auth->setUser($user);
                $this->Users->logLogin($user['id']);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function profile()
    {
        $this->loadModel('Users.Users');
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is(['post', 'put', 'patch'])) {
            $validate = 'default';
            if ($this->request->data['change_password']) {
                $validate = 'passwordChange';
            } else {
                $user->accessible('password', false);
            }

            $data = $this->Users->patchEntity($user, $this->request->data, compact('validate'));
            if ($this->Users->save($data)) {
                $this->Flash->success('The entry has been saved.');

                $this->request->session()->write('Auth.User', $user->toArray());

                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error('The entry could not be saved. Please, try again.');
            }
        }

        $this->set(compact('user'));
    }

    public function change_password($userId, $hash)
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if (!$user = $this->Users->findByIdAndHash($userId, $hash)->first()) {
            throw new InternalErrorException();
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $user->accessible('*', false);
            $user->accessible('password', true);
            $validate = 'passwordChange';

            $data = $this->Users->patchEntity($user, $this->request->data, compact('validate'));
            if ($this->Users->save($data)) {
                $this->Flash->success(__('Password changed successfully'));

                return $this->redirect(['action' => 'login']);
            }
        }

        $this->set(compact('userId', 'hash'));
    }

    public function forgot_password()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->newEntity($this->request->data, ['validate' => 'email']);
            if (!$user->errors()) {
                if ($user = $this->Users->findByEmailAndProvider($this->request->data['email'], '')->first()) {
                    $this->Users->dispatchEvent('Model.User.passwordChangeRequested', ['entity' => $user]);

                    $this->Flash->success(__('Password change email successfully sent'));
                } else {
                    $this->Flash->error(__('User with this email doesn\'t exist'));
                }
            }
        }
    }

    public function view($id)
    {
        $user = $this->Users->get($id);

        $userVideos = $this->loadModel('Videos')
            ->findByUserId($id)
            ->order(['Videos.created' => 'DESC'])
            ->limit(6);

        $this->set(compact('user', 'userVideos'));
    }

}
