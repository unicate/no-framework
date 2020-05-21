<?php


namespace nofw\middlewares;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;


class AuthMiddleware implements MiddlewareInterface {

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        // invoke the rest of the middleware stack and your controller resulting
        // in a returned response object
        $response = $handler->handle($request);

        error_log("Hello from AuthMiddleware");
        // ...
        // do something with the response
        return $response;
    }
}