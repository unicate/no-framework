<?php
return [
    [
        'method' => 'GET',
        'path' => '/',
        'handler' => 'Nofw\Controllers\PageController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/de',
        'handler' => 'Nofw\Controllers\PageController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/fr',
        'handler' => 'Nofw\Controllers\PageController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/{lang}/de/index',
        'handler' => 'Nofw\Controllers\PageController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/info',
        'handler' => 'Nofw\Controllers\PageController::info'
    ],
    [
        'method' => 'GET',
        'path' => '/param/{id}',
        'handler' => 'Nofw\Controllers\PageController::param'
    ],
    [
        'method' => 'GET',
        'path' => '/login',
        'handler' => 'Nofw\Controllers\PageController::login'
    ],
    [
        'method' => 'GET',
        'path' => '/logout',
        'handler' => 'Nofw\Controllers\PageController::logout'
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


 
