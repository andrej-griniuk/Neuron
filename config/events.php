<?php
use Cake\Core\Configure;
use Cake\Log\Log;

function sendEmailTemplate($template, $to, $data, $options = []) {
    try {
        $vars = [];
        foreach ($data as $k => $v) {
            $vars[] = [
                'name' => $k,
                'content' => $v,
            ];
        }

        $to = [
            [
                'email' => $to
            ]
        ];

        $mandrill = new Mandrill(Configure::read('Mandrill.key'));
        $message = [
            //'subject'           => $subject,
            //'from_email'        => Configure::read('Mandrill.fromEmail'),
            //'from_name'         => Configure::read('Mandrill.fromName'),
            'to'                => $to,
            'headers'           => array('Reply-To' => Configure::read('Mandrill.fromEmail')),
            'important'         => false,
            'track_opens'       => true,
            //'track_clicks'      => true,
            'global_merge_vars' => $vars,
        ];

        $message = array_merge($message, $options);

        $mandrill->messages->sendTemplate($template, [], $message);
    } catch (Exception $e) {
        Log::write(
            'error',
            'Mandrill exception: ' . var_dump($e, true)
        );
    }
}
