<?php
return [
    [
        'method' => 'GET',
        'path' => '/',
        'handler' => 'nofw\controllers\MainController::index',
    ],
    [
        'method' => 'GET',
        'path' => '/info',
        'handler' => 'nofw\controllers\MainController::info',
    ],
    [
        'method' => 'GET',
        'path' => '/main/{id}',
        'handler' => 'nofw\controllers\MainController::main',
    ],
    [
        'method' => 'GET',
        'path' => '/page',
        'handler' => 'nofw\controllers\MainController::page',
    ],
    [
        'method' => 'GET',
        'path' => '/api',
        'handler' => 'nofw\controllers\ApiController::index',
    ],
    [
        'method' => 'GET',
        'path' => '/api/info',
        'handler' => 'nofw\controllers\ApiController::info',
    ],
    [
        'method' => 'GET',
        'path' => '/sorry',
        'handler' => 'nofw\controllers\MainController::sorry',
    ],
];


 
