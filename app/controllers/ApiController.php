<?php

declare(strict_types=1);

namespace Nofw\Controllers;

use Nofw\Services\DatabaseService;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;

use Psr\Http\Message\ResponseInterface;
use Nofw\Core\Config;

class ApiController extends AbstractController {
    private $configService;
    private $dbService;

    public function __construct(Config $configService, DatabaseService $dbService) {
        $this->configService = $configService;
        $this->dbService = $dbService;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->jsonResponse(new Response(), [
            'data' => 'some data',
            'db_data' => $this->dbService->get()->info(),
            'links' => [
                'link1' => 'http://link1.com',
                'link2' => 'http://link2.com'
            ]
        ]);
    }

    public function info(ServerRequestInterface $request, array $args): ResponseInterface {
        $data['application']['app_version'] = $this->configService->getAppVersion();
        $data['application']['php_version'] = phpversion();
        $data['application']['server_software'] = $_SERVER['SERVER_SOFTWARE'];
        $data['application']['script_name'] = $_SERVER['SCRIPT_NAME'];
        $data['application']['script_dir'] = dirname($_SERVER['SCRIPT_NAME']);
        return $this->jsonResponse(new Response(), $data);
    }

    public function poster(ServerRequestInterface $request, array $args): ResponseInterface {
        $data['aaa'] = 'aaa';
        $data['bbb'] = 'bbb';
        $data['form'] = $request->getParsedBody()['key1'];
        $data['param'] = $request->getQueryParams()['key1'];
        return $this->jsonResponse(new Response(), $data);
    }


}