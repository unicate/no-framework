<?php
return [
    [
        'method' => 'GET',
        'path' => '/',
        'handler' => 'nofw\controllers\PageController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/info',
        'handler' => 'nofw\controllers\PageController::info'
    ],
    [
        'method' => 'GET',
        'path' => '/main/{id}',
        'handler' => 'nofw\controllers\PageController::main'
    ],
    [
        'method' => 'GET',
        'path' => '/page',
        'handler' => 'nofw\controllers\PageController::page'
    ],
    [
        'method' => 'GET',
        'path' => '/login',
        'handler' => 'nofw\controllers\PageController::login'
    ],
    [
        'method' => 'GET',
        'path' => '/api',
        'handler' => 'nofw\controllers\ApiController::index'
    ],
    [
        'method' => 'GET',
        'path' => '/api/info',
        'handler' => 'nofw\controllers\ApiController::info'
    ],
    [
        'method' => 'GET',
        'path' => '/sorry',
        'handler' => 'nofw\controllers\PageController::sorry'
    ]
];


 
