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
        'path' => '/en',
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
    /*
     * Register
     */
    [
        'method' => 'GET',
        'path' => '/en/demo/register',
        'handler' => 'Nofw\Controllers\UserController::register'
    ],
    [
        'method' => 'POST',
        'path' => '/en/demo/register',
        'handler' => 'Nofw\Controllers\UserController::register'
    ],
    [
        'method' => 'GET',
        'path' => '/en/demo/tasks',
        'handler' => 'Nofw\Controllers\TaskController::list'
    ],
    [
        'method' => 'POST',
        'path' => '/en/demo/tasks',
        'handler' => 'Nofw\Controllers\TaskController::add'
    ],
    [
        'method' => 'GET',
        'path' => '/en/demo/task/{id}/delete',
        'handler' => 'Nofw\Controllers\TaskController::delete'
    ],
    [
        'method' => 'GET',
        'path' => '/en/demo/task/{id}/done',
        'handler' => 'Nofw\Controllers\TaskController::done'
    ],
    /*
     * API
     */
    [
        'method' => 'GET',
        'path' => '/api',
        'handler' => 'Nofw\Controllers\ApiController::index'
    ],

];


 
