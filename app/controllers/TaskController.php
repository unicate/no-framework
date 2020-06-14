<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Nofw\Controllers;

use Nofw\Models\TaskModel;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Nofw\Services\ViewService;
use Psr\Log\LoggerInterface;


class TaskController extends AbstractController {
    private $model;
    protected $view;
    private $logger;

    public function __construct(TaskModel $model, ViewService $view, LoggerInterface $logger) {
        $this->model = $model;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list(ServerRequestInterface $request, array $args): ResponseInterface {
        $this->logger->debug('List Tasks');
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
        return $this->redirect('../../tasks');
    }
    public function done(ServerRequestInterface $request, array $args): ResponseInterface {
        $this->model->done($args['id']);
        return $this->list($request, $args);

    }

}