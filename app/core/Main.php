<?php

namespace nofw\core;

use DI\Container;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use nofw\middlewares\AuthMiddleware;
use nofw\middlewares\CorsMiddleware;
use nofw\services\RoutingService;

class Main {
    private $container;
    private $router;

    public function __construct() {
        $this->container = new Container();
        //$this->router = new Router();
        //$routingService = $this->container->get(RoutingService::class);
        //$this->container->set('router', \DI\create(Router::class));
        //$this->container->set('routingService', \DI\create(RoutingService::class)->constructor($this->router));
        $this->router = $this->container->get(Router::class);

        $this->setupRouter();
        $this->setupMiddleware();

        $this->container->get(RoutingService::class);

    }

    private function setupRouter() {
        $strategy = new ApplicationStrategy();
        $strategy->setContainer($this->container);
        $this->router->setStrategy($strategy);

        //new RoutingService($this->router);
        //$this->container->call('routingService');
        //$this->container->get('routingService');

    }

    private function setupMiddleware() {
        $this->router->middlewares([
            new CorsMiddleware(),
            new AuthMiddleware()
        ]);
    }

}

new Main();
