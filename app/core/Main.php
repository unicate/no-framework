<?php

declare(strict_types=1);

namespace nofw\core;

use DI\Container;
use DI\ContainerBuilder;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use nofw\core\Config;
use nofw\middlewares\AuthMiddleware;
use nofw\middlewares\CorsMiddleware;
use nofw\services\RoutingService;
use Unicate\LanguageDetection\Detection;
use Unicate\Logger\Logger;
use Unicate\PackagistTest\Hello;
use function DI\env;
use function DI\get;
use Symfony\Component\Dotenv\Dotenv;

class Main {

    public function __construct() {
        // Setup DI Container
        $containerBuilder = new ContainerBuilder();
        $container = $containerBuilder->build();

        // Initialize Dependencies
        $container->set(Config::class,
            \DI\create()->constructor(Constants::CONFIG_DIR . '/.env')
        );

        $container->set(Logger::class,
            \DI\create()->constructor(
                $container->get(Config::class)->getLogLevel(),
                Constants::LOGS_DIR
            )
        );

        $container->set(Detection::class,
            \DI\create()->constructor(
                $container->get(Config::class)->getDefaultLang(),
                $container->get(Config::class)->getAvailableLang()
            )
        );


        // Init Router
        $strategy = new ApplicationStrategy();
        $strategy->setContainer($container);
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
