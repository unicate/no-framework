<?php

namespace nofw\core;

use DI\Container;
use DI\ContainerBuilder;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use nofw\core\Constants;
use nofw\middlewares\AuthMiddleware;
use nofw\middlewares\CorsMiddleware;
use nofw\services\RoutingService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Tuupola\Middleware\JwtAuthentication;

class Main {

    public function __construct() {
        //$container = new Container();

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(__DIR__ . '/../config/dependencies.php');
        $container = $containerBuilder->build();

        $strategy = new ApplicationStrategy();
        $strategy->setContainer($container);

        $router = $container->get(Router::class);
        $router->setStrategy($strategy);

        $router->middlewares([
            $container->get(CorsMiddleware::class),
            $container->get(AuthMiddleware::class)->getInstance(),
        ]);

        $container->get(RoutingService::class);
    }

}

new Main();
