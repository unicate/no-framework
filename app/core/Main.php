<?php

declare(strict_types=1);

namespace nofw\core;

use DI\ContainerBuilder;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use nofw\middlewares\AuthMiddleware;
use nofw\middlewares\CorsMiddleware;
use nofw\services\RoutingService;
use Psr\Container\ContainerInterface;
use Tuupola\Middleware\JwtAuthentication;

class Main {

    public function __construct() {
        // Setup DI Container
        $container = $this->initContainer();

        // Init Router
        $router = $this->initRouter($container);

        // Add Middlewares
        $this->addMiddlewares($router, $container);

        // Start routing
        $container->call([RoutingService::class, 'route'], []);
    }

    private function initContainer(): ContainerInterface {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->useAutowiring(true);
        $containerBuilder->addDefinitions(Constants::DEPENDENCY_FILE);
        return $containerBuilder->build();
    }

    private function initRouter(ContainerInterface $container): Router {
        $strategy = new ApplicationStrategy();
        $strategy->setContainer($container);
        $router = $container->get(Router::class);
        $router->setStrategy($strategy);
        return $router;
    }

    private function addMiddlewares(Router $router, ContainerInterface $container) {
        $router->middlewares([
            $container->get(CorsMiddleware::class),
            $container->get(JwtAuthentication::class),
        ]);
    }


}

new Main();
