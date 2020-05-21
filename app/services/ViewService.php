<?php

namespace nofw\services;

use nofw\services\ConfigService;
use League\Plates\Engine;

class ViewService {

    private $configService;
    private $engine;

    function __construct(ConfigService $configService) {
        $this->configService = $configService;
        $this->engine = new Engine();
        $this->engine->setDirectory(__DIR__ . '/../pages');
        $this->engine->setFileExtension('php'); // Set extension manually
        $this->engine->addData([
            'fullBasePath' => 'xxx',
            'basePath' => $this->configService->basePath . '/',
            'applicationVersion' => $this->configService->appVersion
        ]);
    }


    public function getEngine() {
        return $this->engine;
    }

    public function renderPage(string $pageName, array $data) {
        return $this->engine->render($pageName, $data);
    }

    public function addData(array $data) {
        $this->engine->addData($data);
    }

}
