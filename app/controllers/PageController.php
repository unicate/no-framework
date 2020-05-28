<?php

declare(strict_types=1);

namespace nofw\controllers;

use nofw\core\Config;
use nofw\services\LogService;
use nofw\services\TranslationService;
use nofw\utils\LangHelper;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use nofw\services\DatabaseService;
use nofw\services\ViewService;
use nofw\utils\JWTHelper;
use Unicate\Logger\Logger;


class PageController extends AbstractController {
    private $configService;
    private $dbService;
    private $viewService;
    private $translationService;
    private $logger;

    public function __construct(Config $configService,
                                DatabaseService $dbService,
                                ViewService $viewService,
                                Logger $logger) {
        $this->configService = $configService;
        $this->dbService = $dbService;
        $this->viewService = $viewService;
        $this->logger = $logger;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function info(ServerRequestInterface $request, array $args): ResponseInterface {
        $info = print_r($this->dbService->info(), true);

        $this->logger->debug('test some very detailed debug log {data}', ['data' => '...some data...']);
        $this->logger->info('test loggin some info {kind} stuff', ['kind' => 'crazy']);
        $this->logger->notice('Just for your notification.', []);
        $this->logger->warning('Just be warned', []);
        $this->logger->error('some error: {exception}', ['exception' => 'stack trace...']);
        $this->logger->critical('A mission critical log entry!', ['exception' => new \RuntimeException('ohhh a runtime exception!')]);
        $this->logger->alert('Aleeeerrrrtt', []);
        $this->logger->emergency('Its an Emergency!!!', []);

        return $this->basicResponse(new Response(), "<h1>Info</h1><pre>$info</pre>");
    }

    public function param(ServerRequestInterface $request, array $args): ResponseInterface {
        $id = $args['id'];
        $newParam = 'new-random-param-' . rand(0, 999);
        return $this->basicResponse(new Response(), "<h1>Param</h1><p>The param is \"$id\".</p><p><a href='$newParam'>Try random param instead</a>.</p>");
    }


    public function login(ServerRequestInterface $request, array $args): ResponseInterface {
        JWTHelper::setTokenCookie($this->configService->getApiKey(), [], 'raoul@bla.com');
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function logout(ServerRequestInterface $request, array $args): ResponseInterface {
        JWTHelper::deleteTokenCookie();
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

}