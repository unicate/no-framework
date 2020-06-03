<?php

declare(strict_types=1);

namespace Nofw\Controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractController {

    protected $view;

    public function page(string $page, array $data = []): ResponseInterface {
        $response = new Response();
        $response->getBody()->write($this->view->renderPage($page, $data));
        return $response;
    }

    public function json(array $payload): ResponseInterface {
        $response = new Response();
        $response->getBody()->write(json_encode($payload));
        return $response->withAddedHeader(
            'content-type', 'application/json'
        )->withStatus(200);
    }


}