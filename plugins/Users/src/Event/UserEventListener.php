<?php
namespace Users\Event;

use Cake\Event\EventListenerInterface;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class UserEventListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Model.User.passwordChangeRequested' => 'sendPasswordChangeLink',
        ];
    }

    public function sendPasswordChangeLink($event)
    {
        $user = $event->data['entity'];

        $data = [
            'user_name' => $user->full_name,
            'url'       => Router::url([
                'controller' => 'Users',
                'action'     => 'change_password',
                $user->id,
                $user->hash,
                'plugin'     => 'Users'
            ], true)
        ];

        sendEmailTemplate(
            'password-change-request',
            $user->email,
            $data
        );
    }

}
