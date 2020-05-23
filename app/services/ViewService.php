<?php

declare(strict_types=1);

namespace nofw\services;

use League\Plates\Engine;
use nofw\core\Constants;

class ViewService {

    private $engine;

    function __construct(ConfigService $configService) {
        $this->engine = new Engine();
        $this->engine->setDirectory(Constants::VIEWS_DIR);
        $this->engine->setFileExtension('php');
        $this->engine->addData([
            'basePath' => $configService->getBasePath(),
            'applicationVersion' => $configService->getAppVersion()
        ]);
    }

    public function renderPage(string $pageName, array $data): string {
        return $this->engine->render($pageName, $data);
    }

    public function addData(array $data) {
        $this->engine->addData($data);
    }

}
