<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Nofw\Controllers;

use Nofw\models\UserModel;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;

use Psr\Http\Message\ResponseInterface;
use Nofw\Core\Config;

class ApiController extends AbstractController {
    private $model;

    public function __construct(UserModel $model) {
        $this->model = $model;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->json([
            'data' => 'some data',
            'links' => [
                'link1' => 'http://link1.com',
                'link2' => 'http://link2.com'
            ]
        ]);
    }

}