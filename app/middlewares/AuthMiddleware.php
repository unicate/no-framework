<?php

declare(strict_types=1);

namespace nofw\middlewares;

use nofw\services\ConfigService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Tuupola\Middleware\JwtAuthentication;


class AuthMiddleware {

    private $jwt;

    public function __construct(ConfigService $configService) {
        $basePath = $configService->getBasePath();
        $this->jwt = new JwtAuthentication([
            "path" => $basePath . "/api",
            "ignore" => [
                $basePath . "/api/info"
            ],
            "secret" => $configService->getAppSecret(),
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
                return $response->withHeader("X-AUTH", "authenticated=true");
            }
        ]);
    }


    public function jwt(): MiddlewareInterface {
        return $this->jwt;
    }

}
