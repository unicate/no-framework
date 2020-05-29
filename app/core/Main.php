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
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Tuupola\Middleware\JwtAuthentication;
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
        $containerBuilder->useAutowiring(true);
        $containerBuilder->addDefinitions([
            /*
            OrderService::class => DI\create()
                ->constructor(DI\get(SomeOtherService::class), 'a value'),
            */
            
            Config::class =>
                \DI\autowire()->constructor(Constants::CONFIG_DIR . '/.env'),
/*
            Logger::class =>
                \DI\autowire()->constructor(
                    'debug',
                    Constants::LOGS_DIR
                ),
*/
            Logger::class => \DI\factory(function (Config $config) {
                return new Logger($config->getLogLevel(), Constants::LOGS_DIR);
            }),

            Detection::class => \DI\factory(function (Config $config) {
                return new Detection($config->getDefaultLang(), $config->getAvailableLang());
            }),
/*
            Detection::class =>
                \DI\autowire()->constructor(
                    'de',
                    array('en', 'de', 'fr')
                ),
*/
            MiddlewareInterface::class => \DI\factory(function (Config $config) {
                //$config = get(Config::class);
                $basePath = $config->getBasePath();
                $jwtConfig = [
                    "path" => $basePath . "/api",
                    "ignore" => [
                        $basePath . "/api/info"
                    ],
                    "secret" => $config->getApiKey(),
                    "attribute" => 'jwt',
                    "relaxed" => ["127.0.0.1", "localhost", "unicate.local", "silver.local"],
                    "error" => function (Response $response) use ($basePath) {
                        $response->getBody()->write("<h1>401 Not authorized</h1><p><a href='$basePath/login'>Login</a></p>");
                        return $response->withStatus(401);
                    },
                    "before" => function (Request $request, $arguments) {
                        return $request->withAttribute("authenticated", "true");
                    },
                    "after" => function ($response, $arguments) {
                        return $response->withHeader("X-AUTH", "authenticated=true");
                    }
                ];

                return new JwtAuthentication($jwtConfig);

            }),

        ]);
        $container = $containerBuilder->build();


        // Init Router
        $strategy = new ApplicationStrategy();
        $strategy->setContainer($container);
        $router = $container->get(Router::class);
        $router->setStrategy($strategy);

        // Add Middlewares
        $router->middlewares([
            $container->get(CorsMiddleware::class),
            //$container->get(JwtAuthentication::class),
        ]);


        // Start routing
        $container->call([RoutingService::class, 'route'], []);
    }



}

new Main();
