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
use nofw\core\NofwApp;

class RoutingService {

    private $configService;
    private $router;

    public function __construct(Router $router) {
        //$this->configService = $configService;
        $this->router = $router;
        $this->route();
    }

    private function route() {
        $basePath = '/unicate/no-framework/public';//$this->configService->basePath;

        $request = ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
        $routes = include(__DIR__ . '/../config/routes.php');

        foreach ($routes as $route) {
            $this->router->addRoute($route['method'], $basePath . $route['path'], $route['handler']);
        }
        try {
            $response = $this->router->dispatch($request);
        } catch (NotFoundException $exception) {
            $response = (new ResponseFactory())->createResponse()
                ->withHeader('Location', $basePath . '/sorry')
                ->withStatus(301, 'Redirect');
        }
        $emitter = new SapiEmitter();
        $emitter->emit($response);

    }
}