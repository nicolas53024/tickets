<?php

namespace App\Routes;

return [
    '/' => [
        'method' => 'get',
        'controller' => '\App\Controllers\HomeController',
        'action' => 'index',
        'auth'=>true
    ],
    '/login' => [
        'method' => 'post',
        'controller' => '\App\Controllers\LoginController',
        'action' => 'login',
    ],
];
