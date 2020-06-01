<?php
return [
    /*
     * Welcome Page
     */
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
    /*
     * Login / Logout
     */
    [
        'method' => 'GET',
        'path' => '/en/demo/login',
        'handler' => 'Nofw\Controllers\UserController::login'
    ],
    [
        'method' => 'POST',
        'path' => '/en/demo/login',
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

];


 
