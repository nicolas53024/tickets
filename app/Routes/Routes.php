<?php

namespace App\Routes;

return [
    '/' => [
        'method' => 'get',
        'controller' => '\App\Controllers\HomeController',
        'action' => 'index',
    ],
    'home' => [
        'method' => 'post',
        'controller' => '\App\Controllers\HomeController',
        'action' => 'index2',
    ],
];
