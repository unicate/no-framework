<?php


namespace nofw\controllers;

use nofw\services\DatabaseService;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use nofw\services\ConfigService;


class ApiController extends AbstractController {
    private $configService;
    private $dbService;

    public function __construct(ConfigService $configService, DatabaseService $dbService) {
        $this->configService = $configService;
        $this->dbService = $dbService;
    }

    public function index(ServerRequestInterface $request, array $args) {
        return $this->jsonResponse(new Response(), [
            "data" => "some data",
            "db_data" => $this->dbService->info(),
            "links" => [
                "link1" => "http://link1.com",
                "link2" => "http://link2.com"
            ]
        ]);
    }

    public function info(ServerRequestInterface $request, array $args) {
        $data["application"]["app_version"] = $this->configService->appVersion;
        $data["application"]["php_version"] = phpversion();
        $data["application"]["server_software"] = $_SERVER["SERVER_SOFTWARE"];
        $data["application"]["script_name"] = $_SERVER["SCRIPT_NAME"];
        $data["application"]["redirect_url"] = $_SERVER["REDIRECT_URL"];
        return $this->jsonResponse(new Response(), $data);
    }


}