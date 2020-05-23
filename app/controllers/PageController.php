<?php

declare(strict_types=1);

namespace nofw\controllers;

use nofw\services\ConfigService;
use nofw\services\LogService;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use nofw\services\DatabaseService;
use nofw\services\ViewService;
use nofw\utils\JWTHelper;


class PageController extends AbstractController {
    private $configService;
    private $dbService;
    private $viewService;
    private $logService;

    public function __construct(ConfigService $configService, DatabaseService $dbService,
                                ViewService $viewService, LogService $logService) {
        $this->configService = $configService;
        $this->dbService = $dbService;
        $this->viewService = $viewService;
        $this->logService = $logService;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        $this->viewService->addData([
            "lang" => 'de',
            'title' => 'Welcome!',
            'text' => 'Attention: This is not a framework.'
        ]);
        $this->logService->info('test loggin some info stuff', []);
        $this->logService->debug('test some very detailed debug log', []);
        $this->logService->warning('test just a warning', []);
        $this->logService->critical('test wow a critical log entry... never seen before', []);
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function info(ServerRequestInterface $request, array $args): ResponseInterface {
        $info = print_r($this->dbService->info(), true);
        return $this->basicResponse(new Response(), "<h1>Info</h1><pre>$info</pre>");
    }

    public function param(ServerRequestInterface $request, array $args): ResponseInterface {
        $id = $args['id'];
        $newParam = 'new-random-param-' . rand(0, 999);
        return $this->basicResponse(new Response(), "<h1>Param</h1><p>The param is \"$id\".</p><p><a href='$newParam'>Try random param instead</a>.</p>");
    }


    public function login(ServerRequestInterface $request, array $args): ResponseInterface {
        JWTHelper::setTokenCookie($this->configService->getAppSecret(), [], 'raoul@bla.com');
        $this->viewService->addData([
            "lang" => 'de',
            'title' => 'Login',
            'text' => 'Congratulations you are logged in.'
        ]);
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function logout(ServerRequestInterface $request, array $args): ResponseInterface {
        JWTHelper::deleteTokenCookie();
        $this->viewService->addData([
            "lang" => 'de',
            'title' => 'Logout',
            'text' => 'You are logged out!'
        ]);
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function sorry(ServerRequestInterface $request, array $args): ResponseInterface {
        $this->viewService->addData([
            "lang" => 'de',
            "title" => 'Sorry'
        ]);
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }
}