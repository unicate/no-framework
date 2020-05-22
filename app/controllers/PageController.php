<?php


namespace nofw\controllers;

use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use nofw\services\DatabaseService;
use nofw\services\ViewService;
use nofw\utils\JWTHelper;


class PageController extends AbstractController {
    private $dbService;
    private $viewService;

    public function __construct(DatabaseService $dbService, ViewService $viewService) {
        $this->dbService = $dbService;
        $this->viewService = $viewService;
    }

    public function index(ServerRequestInterface $request, array $args) {
        return $this->basicResponse(new Response(), '<h1>index</h1>');
    }

    public function info(ServerRequestInterface $request, array $args) {
        return $this->basicResponse(new Response(), '<h1>DB Version ' . $this->dbService->info()['version'] . '</h1>');
    }

    public function main(ServerRequestInterface $request, array $args) {
        $id = $args['id'];
        return $this->basicResponse(new Response(), '<h1>Main ID ' . $id . '</h1>');
    }

    public function page(ServerRequestInterface $request, array $args) {
        $this->viewService->addData([
            "lang" => 'de',
            'title' => 'No Framework',
            'text' => 'Attention: This is not a framework.'
        ]);
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function login(ServerRequestInterface $request, array $args) {

        JWTHelper::setTokenCookie('somesecret', [], 'raoul@bla.com');

        $this->viewService->addData([
            "lang" => 'de',
            'title' => 'Login',
            'text' => 'Congratulations you are logged in.'
        ]);
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function sorry(ServerRequestInterface $request, array $args) {
        $this->viewService->addData([
            "lang" => 'de',
            "title" => 'Sorry'
        ]);
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }
}