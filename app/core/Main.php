<?php

declare(strict_types=1);

namespace nofw\core;

use DI\Container;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use nofw\middlewares\AuthMiddleware;
use nofw\middlewares\CorsMiddleware;
use nofw\services\RoutingService;

class Main {

    public function __construct() {
        // Setup DI Container
        $container = new Container();
        $strategy = new ApplicationStrategy();
        $strategy->setContainer($container);

        // Init Router
        $router = $container->get(Router::class);
        $router->setStrategy($strategy);

        // Add Middlewares
        $router->middlewares([
            $container->get(CorsMiddleware::class),
            $container->get(AuthMiddleware::class)->jwt(),
        ]);

        // Start routing
        $container->call([RoutingService::class, 'route'], []);
    }

}

new Main();
