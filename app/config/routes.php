<?php
return [
    [
        'method' => 'GET',
        'path' => '/',
        'handler' => 'Nofw\Controllers\BasicController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/de',
        'handler' => 'Nofw\Controllers\BasicController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/fr',
        'handler' => 'Nofw\Controllers\BasicController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/{lang}/de/index',
        'handler' => 'Nofw\Controllers\BasicController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/info',
        'handler' => 'Nofw\Controllers\BasicController::info'
    ],
    [
        'method' => 'GET',
        'path' => '/param/{id}',
        'handler' => 'Nofw\Controllers\BasicController::param'
    ],
    [
        'method' => 'GET',
        'path' => '/login',
        'handler' => 'Nofw\Controllers\UserController::login'
    ],
    [
        'method' => 'GET',
        'path' => '/logout',
        'handler' => 'Nofw\Controllers\UserController::logout'
    ],
    [
        'method' => 'GET',
        'path' => '/api',
        'handler' => 'Nofw\Controllers\ApiController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/api/info',
        'handler' => 'Nofw\Controllers\ApiController::info'
    ],
    [
        'method' => 'POST',
        'path' => '/api/poster',
        'handler' => 'Nofw\Controllers\ApiController::poster'
    ]
];


 
