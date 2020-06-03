<?php

declare(strict_types=1);

namespace Nofw\Controllers;

use Nofw\models\UserModel;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;

use Psr\Http\Message\ResponseInterface;
use Nofw\Core\Config;

class ApiController extends AbstractController {
    private $config;
    private $model;

    public function __construct(Config $config, UserModel $model) {
        $this->config = $config;
        $this->model = $model;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->json([
            'data' => 'some data',
            'db_data' => $this->model->info(),
            'links' => [
                'link1' => 'http://link1.com',
                'link2' => 'http://link2.com'
            ]
        ]);
    }

}