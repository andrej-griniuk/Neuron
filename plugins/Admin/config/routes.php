<?php
use Cake\Routing\Router;

Router::plugin('Admin', function ($routes) {
    $routes->fallbacks();

    $routes->connect('/', ['controller' => 'Admins', 'action' => 'index', 'prefix' => 'admin']);
    $routes->connect('/login', ['controller' => 'Admins', 'action' => 'login', 'prefix' => 'admin']);

    $routes->prefix('admin', function ($routes) {
        $routes->fallbacks();
    });
});
