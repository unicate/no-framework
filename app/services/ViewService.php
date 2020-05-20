<?php

namespace nofw\services;

use nofw\services\ConfigService;
use League\Plates\Engine;

class ViewService {

    private $configService;

    function __construct(ConfigService $configService) {
        $this->configService = $configService;
    }

    /**
     * @link http://platesphp.com/
     * @return Engine
     */
    public function getRenderer() {
        $view = new Engine();
        $view->setDirectory(__DIR__ . '/../pages');
        $view->setFileExtension('php'); // Set extension manually
        $view->addData([
            "fullBasePath" => "xxx",
            "basePath" => $this->configService->basePath,
            "applicationVersion" => $this->configService->appVersion
        ]);
        return $view;
    }

    public function renderPage(string $pageName, array $data) {
        return $this->getRenderer()->render($pageName, $data);
    }

}
