<?php

declare(strict_types=1);

namespace nofw\middlewares;

use nofw\core\Config;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Tuupola\Middleware\JwtAuthentication;


class AuthMiddleware {

    private $configService;


    public function __construct(Config $configService) {
        $this->configService = $configService;
    }

    public function jwt(): MiddlewareInterface {
        $basePath = $this->configService->getBasePath();
        $appSecret = $this->configService->getApiKey();
        return new JwtAuthentication([

            "path" => $basePath . "/api",
            "ignore" => [
                $basePath . "/api/info"
            ],
            "secret" => $appSecret,
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
        ]);
    }

}
