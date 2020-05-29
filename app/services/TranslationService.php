<?php

declare(strict_types=1);

namespace nofw\services;

use nofw\core\Constants;
use Unicate\LanguageDetection\Detection;
use Unicate\Translation\Translation;

class TranslationService {

    private $translation;

    public function __construct(Detection $langDetection) {
        $translationDefinition = require_once Constants::TRANSLATION_FILE;
        $lang = $langDetection->detectLang();
        $this->translation = new Translation($translationDefinition, $lang);
    }

    public function translate(string $token) {
        return $this->translation->translate($token);
    }


}