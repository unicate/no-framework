<?php

declare(strict_types=1);

namespace Nofw\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CorsMiddleware implements MiddlewareInterface {

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        $response = $handler->handle($request);

        if (in_array('application/json', $response->getHeader('content-type'))) {
            return $response
                ->withHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                ->withHeader('Pragma', 'no-cache')
                ->withHeader('Access-Control-Allow-Origin', 'http://localhost:8080')
                ->withHeader('Access-Control-Allow-Headers', 'access-control-allow-origin, X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        }

        return $response;

    }
}