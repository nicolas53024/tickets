<?php

namespace App\Routes;

return [
    '/' => [
        'method' => 'get',
        'controller' => '\App\Controllers\HomeController',
        'action' => 'index',
        'auth'=>true
    ],
    '/home' => [
        'method' => 'get',
        'controller' => '\App\Controllers\HomeController',
        'action' => 'index2',
    ],
];
