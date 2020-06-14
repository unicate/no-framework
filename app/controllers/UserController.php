<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Nofw\Controllers;

use Nofw\Core\Config;
use Nofw\Models\UserModel;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Nofw\Services\ViewService;
use Nofw\Utils\JWTHelper;


class UserController extends AbstractController {
    private $config;
    private $model;
    protected $view;

    public function __construct(Config $config, UserModel $model, ViewService $view) {
        $this->config = $config;
        $this->model = $model;
        $this->view = $view;
    }

    public function register(ServerRequestInterface $request, array $args): ResponseInterface {
        $success = null;
        if ($request->getMethod() == 'POST') {
            $success = $this->model->register(
                $request->getParsedBody()['name'],
                $request->getParsedBody()['email'],
                $request->getParsedBody()['password']
            );
        }
        return $this->page('register', ['success' => $success]);
    }

    public function login(ServerRequestInterface $request, array $args): ResponseInterface {
        $success = null;
        if ($request->getMethod() == 'POST') {
            $email = $request->getParsedBody()['email'];
            $password = $request->getParsedBody()['password'];
            $success = $this->model->verifyLogin($email, $password);
            JWTHelper::setTokenCookie($this->config->getApiKey(), [], $email);
        }
        return $this->page('login', ['success' => $success]);

    }

}