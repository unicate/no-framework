<?php


namespace nofw\services;

use Laminas\Diactoros\Response;
use Laminas\Diactoros\ResponseFactory;
use League\Route\Http\Exception\NotFoundException;
use League\Route\Strategy\ApplicationStrategy;
use League\Route\Router;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Laminas\Diactoros\ServerRequestFactory;
use DI\Container;
use nofw\middlewares\AuthMiddleware;
use nofw\middlewares\CorsMiddleware;

class RoutingService {

    private $container;
    private $configService;

    public function __construct(Container $container) {
        $this->container = $container;
        $this->configService = $container->get(ConfigService::class);
        $this->route();
    }

    private function route() {
        $basePath = $this->configService->basePath;

        $request = ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
        $strategy = new ApplicationStrategy();
        $strategy->setContainer($this->container);

        $router = new Router();
        $router->setStrategy($strategy);
        $router->middlewares([
            new CorsMiddleware(),
            new AuthMiddleware(),
        ]);

        $routes = include(__DIR__ . '/../config/routes.php');

        foreach ($routes as $route) {
            $router->addRoute($route['method'], $basePath . $route['path'], $route['handler']);
        }
        try {
            $response = $router->dispatch($request);
        } catch (NotFoundException $exception) {
            $response = (new ResponseFactory())->createResponse()
                ->withHeader('Location', $basePath . '/sorry')
                ->withStatus(301, 'Redirect');
        }
        $emitter = new SapiEmitter();
        $emitter->emit($response);

    }
}