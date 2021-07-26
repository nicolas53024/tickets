<?php

namespace App\Routes;

return [
    '/' => [
        'method' => 'get',
        'controller' => '\App\Controllers\HomeController',
        'action' => 'indexs',
    ],
    'home' => [
        'method' => 'get',
        'controller' => '\App\Controllers\HomeController',
        'action' => 'index2',
    ],
];
