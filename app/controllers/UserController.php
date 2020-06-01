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


class UserController extends AbstractController {
    private $config;
    private $model;
    private $viewService;

    public function __construct(Config $config, UserModel $model, ViewService $viewService) {
        $this->config = $config;
        $this->model = $model;
        $this->viewService = $viewService;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function login(ServerRequestInterface $request, array $args): ResponseInterface {
        JWTHelper::setTokenCookie($this->config->getApiKey(), [], 'raoul@bla.com');
        //$bla = $this->model->getUserByEmail('raoul@bla.com');
        //$lol = $this->model->verifyLogin('raoul@bla.com', '123456xxxxx');
        //$lal = $this->model->find(['email' => 'raoul@bla.com', 'password'=>'raoul@bla.com']);
        $lal1 = $this->model->getOne(['email' => 'raoul@bla.comx']);
        $lal2 = $this->model->getAll(['status' => '0']);

        $data = [
            "name" => 'Test Test',
            "email" => '11sdf@asdfadsfa.com',
            "password" => md5(md5('123456')),
            "signup_token" => 'sadfasdf',
            "status" => 0,
            "date_created" => date("Y-m-d H:i:s")
        ];
        $lal3 = $this->model->insert($data);

        $lal4 = $this->model->update(['status'=> '1'], ['status' => '0']);
        $lal5 = $this->model->delete(['id'=> '17', 'status' => '1']);
        $lal6 = $this->model->hasOne(['id'=> '32', 'status' => '0']);

        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }

    public function logout(ServerRequestInterface $request, array $args): ResponseInterface {
        JWTHelper::deleteTokenCookie();
        return $this->basicResponse(new Response(), $this->viewService->renderPage(__FUNCTION__, []));
    }




}