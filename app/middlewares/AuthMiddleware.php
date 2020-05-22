<?php


namespace nofw\middlewares;

use nofw\services\ConfigService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tuupola\Middleware\JwtAuthentication;


class AuthMiddleware {

    private $configService;
    private $auth;

    public function __construct(ConfigService $configService) {
        $basePath = $configService->basePath;
        $this->auth = new JwtAuthentication([
            "path" => $basePath . "/api",
            "ignore" => [
                $basePath . "/api/info"
            ],
            "secret" => 'somesecret',
            "attribute" => true,
            "relaxed" => ["127.0.0.1", "localhost", "unicate.local", "silver.local"],
            "error" => function (Response $response) use ($basePath) {
                $response->getBody()->write("Unauthorized: <a href='" . $basePath . "/login'>Login</a>");
                return $response->withStatus(401);
            },
            "before" => function (Request $request, $arguments) {
                return $request->withAttribute("authenticated", "true");
            },
            "after" => function ($response, $arguments) {
                return $response->withHeader("X-AUTH", "authenticated");
            }
        ]);
    }


    /**
     * @return mixed
     */
    public function getInstance() {
        return $this->auth;
    }

}
