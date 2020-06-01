<?php

declare(strict_types=1);

namespace Nofw\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Nofw\Services\ViewService;


class BasicController extends AbstractController {
    private $viewService;

    public function __construct(ViewService $viewService) {
        $this->viewService = $viewService;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->basicResponse(new Response(),
            $this->viewService->renderPage(__FUNCTION__, []
            )
        );
    }

}