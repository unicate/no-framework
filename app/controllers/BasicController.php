<?php

declare(strict_types=1);

namespace Nofw\Controllers;

use Nofw\Core\Config;
use Nofw\models\UserModel;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Nofw\Services\ViewService;
use Nofw\Utils\JWTHelper;
use Psr\Log\LoggerInterface;


class BasicController extends AbstractController {
    private $viewService;
    private $logger;

    public function __construct(ViewService $viewService, LoggerInterface $logger) {
        $this->viewService = $viewService;
        $this->logger = $logger;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function info(ServerRequestInterface $request, array $args): ResponseInterface {
        $info = print_r($this->model->info(), true);

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




}