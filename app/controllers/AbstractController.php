<?php

declare(strict_types=1);

namespace nofw\controllers;

use Psr\Http\Message\ResponseInterface;

abstract class AbstractController {

    public function jsonResponse(ResponseInterface $response, array $payload): ResponseInterface {
        $response->getBody()->write(json_encode($payload));
        return $response->withAddedHeader(
            'content-type', 'application/json'
        )->withStatus(200);
    }

    public function basicResponse(ResponseInterface $response, string $str): ResponseInterface {
        $response->getBody()->write($str);
        return $response;
    }


}