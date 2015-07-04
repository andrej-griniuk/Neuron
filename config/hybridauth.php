<?php
use Cake\Core\Configure;

$config['HybridAuth'] = [
    'providers'  => [
        "Facebook" => array( // 'key' is your twitter application consumer key
            "enabled" => true,
            "keys"    => [
                "id" => "",
                "secret" => "",
            ],
            "scope" => "email",
        ),

    ],
    'debug_mode' => Configure::read('debug'),
    'debug_file' => LOGS . 'hybridauth.log',
];
