<?php

declare(strict_types=1);

namespace nofw\services;

use League\Plates\Engine;
use nofw\core\Constants;
use nofw\core\Config;

class ViewService {

    private $engine;

    function __construct(Config $config, TranslationService $translationService) {
        $this->engine = new Engine();
        $this->engine->setDirectory(Constants::VIEWS_DIR);
        $this->engine->setFileExtension('php');
        $this->engine->registerFunction('tlt', [$translationService, 'translate']);
        $this->engine->addData([
            'basePath' => $config->getBasePath(),
            'applicationVersion' => $config->getAppVersion()
        ]);
    }

    public function renderPage(string $pageName, array $data): string {
        return $this->engine->render($pageName, $data);
    }

    public function addData(array $data) {
        $this->engine->addData($data);
    }

}
