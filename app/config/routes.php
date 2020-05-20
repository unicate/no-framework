<?php
return [
    [
        'method' => 'GET',
        'path' => '/',
        'handler' => 'nofw\controllers\MainController::index',
    ],
    [
        'method' => 'GET',
        'path' => '/test',
        'handler' => 'nofw\controllers\MainController::test',
    ],
    [
        'method' => 'GET',
        'path' => '/main/{id}',
        'handler' => 'nofw\controllers\MainController::main',
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
];


 
