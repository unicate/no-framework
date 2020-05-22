<?php

declare(strict_types=1);

namespace nofw\middlewares;

use nofw\services\ConfigService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Tuupola\Middleware\JwtAuthentication;


class AuthMiddleware {

    private $configService;


    public function __construct(ConfigService $configService) {
        $this->configService = $configService;
    }

    public function jwt(): MiddlewareInterface {
        $basePath = $this->configService->getBasePath();
        return new JwtAuthentication([

            "path" => $this->basePath . "/api",
            "ignore" => [
                $basePath . "/api/info"
            ],
            "secret" => $this->configService->getAppSecret(),
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

}
