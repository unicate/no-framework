<?php

declare(strict_types=1);

namespace Nofw\Controllers;

use Nofw\Core\Config;
use Nofw\models\TaskModel;
use Nofw\models\UserModel;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Nofw\Services\ViewService;
use Nofw\Utils\JWTHelper;
use Psr\Log\LoggerInterface;


class TaskController extends AbstractController {
    private $config;
    private $model;
    protected $view;

    public function __construct(Config $config, TaskModel $model, ViewService $view) {
        $this->config = $config;
        $this->model = $model;
        $this->view = $view;
    }

    public function list(ServerRequestInterface $request, array $args): ResponseInterface {
        $tasks = $this->model->list();
        return $this->page('tasks', ['tasks' => $tasks]);
    }

    public function add(ServerRequestInterface $request, array $args): ResponseInterface {
        $name = $request->getParsedBody()['name'];
        $text = $request->getParsedBody()['text'];
        $success = $this->model->add($name, $text);
        return $this->list($request, $args);
    }

}