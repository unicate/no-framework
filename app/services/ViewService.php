<?php

declare(strict_types=1);

namespace nofw\services;

use League\Plates\Engine;
use nofw\core\Constants;
use nofw\utils\LangHelper;

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

    public function translate($token, $lang = null): string {
        $lang =  (isset($lang)) ? $lang : LangHelper::getLang();
        return $this->translationService->translate($token, $lang);
    }


}
