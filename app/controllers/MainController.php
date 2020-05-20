<?php


namespace nofw\controllers;

use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use nofw\services\DatabaseService;


class MainController extends AbstractController {
    private $dbService;


    public function __construct(DatabaseService $dbService) {
        $this->dbService = $dbService;
    }



    public function index(ServerRequestInterface $request, array $args) {
        return $this->basicResponse(new Response(), '<h1>index</h1>');
    }

    public function info(ServerRequestInterface $request, array $args) {
        return $this->basicResponse(new Response(), '<h1>DB Version ' . $this->dbService->info()['version'] . '</h1>');
    }

    public function main(ServerRequestInterface $request, array $args) {
        $id = $args["id"];
        return $this->basicResponse(new Response(), '<h1>Main ID ' . $id . '</h1>');
    }
}