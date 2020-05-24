<?php

declare(strict_types=1);

namespace nofw\services;

use League\Plates\Engine;
use nofw\core\Constants;

class ViewService {

    private $translationService;
    private $engine;

    function __construct(ConfigService $configService, TranslationService $translationService) {
        $this->engine = new Engine();
        $this->engine->setDirectory(Constants::VIEWS_DIR);
        $this->engine->setFileExtension('php');
        $this->engine->registerFunction('tlt', [$this, 'translate']);
        $this->engine->addData([
            'basePath' => $configService->getBasePath(),
            'applicationVersion' => $configService->getAppVersion()
        ]);
        $this->translationService = $translationService;
        $this->language = Constants::DEFAULT_LANG;
    }

    public function renderPage(string $pageName, array $data): string {
        return $this->engine->render($pageName, $data);
    }

    public function addData(array $data) {
        $this->engine->addData($data);
    }

    public function translate($token): string {
        $data = $this->engine->getData();
        if (array_key_exists('lang', $data)) {
            $lang = $data['lang'];
        } else if (array_key_exists('language', $data)) {
            $lang = $data['language'];
        } else {
            $lang = Constants::DEFAULT_LANG;
        }
        return $this->translationService->translate($token, $lang);
    }


}
