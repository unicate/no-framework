<?php

declare(strict_types=1);

namespace nofw\controllers;

use nofw\services\ConfigService;
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

    public function __construct(ConfigService $configService, DatabaseService $dbService, ViewService $viewService) {
        $this->configService = $configService;
        $this->dbService = $dbService;
        $this->viewService = $viewService;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        $this->viewService->addData([
            "lang" => 'de',
            'title' => 'Welcome!',
            'text' => 'Attention: This is not a framework.'
        ]);
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function info(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->basicResponse(new Response(), '<h1>DB Version ' . $this->dbService->info()['version'] . '</h1>');
    }

    public function param(ServerRequestInterface $request, array $args): ResponseInterface {
        $id = $args['id'];
        return $this->basicResponse(new Response(), '<h1>Param is "' . $id . '"</h1>');
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