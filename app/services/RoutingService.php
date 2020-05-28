<?php

declare(strict_types=1);

namespace nofw\services;

use Laminas\Diactoros\Response;
use Laminas\Diactoros\ResponseFactory;
use League\Route\Http\Exception\NotFoundException;
use League\Route\RouteGroup;
use League\Route\Router;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Laminas\Diactoros\ServerRequestFactory;
use nofw\core\NofwApp;
use nofw\core\Constants;
use nofw\core\Config;

class RoutingService {

    private $configService;
    private $router;

    public function __construct(Config $configService, Router $router) {
        $this->configService = $configService;
        $this->router = $router;
    }

    public function route() {
        $basePath = $this->configService->getBasePath();

        $request = ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );

        $routes = require_once(Constants::ROUTING_FILE);
        foreach ($routes as $route) {
            $this->router->map($route['method'], $basePath . $route['path'], $route['handler']);
        }

        try {
            $response = $this->router->dispatch($request);
        } catch (NotFoundException $exception) {
            $response = (new ResponseFactory())->createResponse();
            $uri = $request->getUri();
            $response->getBody()->write("<h1>404 Not found</h1><p>Requested URL: $uri.</p><p><a href='$basePath'>Try this instead</a></p>");
            $response = $response->withStatus(404);
        }
        $emitter = new SapiEmitter();
        $emitter->emit($response);

    }
}