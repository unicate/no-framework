<?php

use League\Plates\Engine;
use Medoo\Medoo;
use nofw\core\Config;
use nofw\core\Constants;
use nofw\services\TranslationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Tuupola\Middleware\JwtAuthentication;
use Unicate\LanguageDetection\Detection;
use Unicate\Logger\Logger;
use \Psr\Log\LoggerInterface;

return [

    Config::class =>
        \DI\autowire()->constructor(Constants::CONFIG_FILE),

    LoggerInterface::class => function (Config $config) {
        return new Logger($config->getLogLevel(), Constants::LOGS_DIR);
    },

    Detection::class => function (Config $config) {
        return new Detection($config->getDefaultLang(), $config->getAvailableLang());
    },

    JwtAuthentication::class => function (Config $config) {
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
    },

    Medoo::class => function (Config $config) {
        $dbConfig = [
            'database_type' => 'mysql',
            'server' => $config->getDbHost(),
            'port' => $config->getDbPort(),
            'database_name' => $config->getDbName(),
            'username' => $config->getDbUser(),
            'password' => $config->getDbPassword(),
            'charset' => 'utf8',
            "logging" => true,
            'prefix' => 'wy_',
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ];
        return new Medoo($dbConfig);
    },

    Engine::class => function (Config $config, TranslationService $translationService) {
        $provider = new Engine(Constants::VIEWS_DIR);
        $provider->setFileExtension('php');
        $provider->registerFunction('tlt', [$translationService, 'translate']);
        $provider->addData([
            'basePath' => $config->getBasePath()
        ]);
        return $provider;
    },


];


 
