<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

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
    private $model;
    protected $view;

    public function __construct(TaskModel $model, ViewService $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function list(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->page('tasks', [
            'tasks' => $this->model->list()
        ]);
    }

    public function add(ServerRequestInterface $request, array $args): ResponseInterface {
        $this->model->add(
            $request->getParsedBody()['name'],
            $request->getParsedBody()['text']
        );
        return $this->list($request, $args);
    }


    public function delete(ServerRequestInterface $request, array $args): ResponseInterface {
        $this->model->delete($args['id']);
        return $this->list($request, $args);
    }
    public function done(ServerRequestInterface $request, array $args): ResponseInterface {
        $this->model->done($args['id']);
        return $this->list($request, $args);

    }

}