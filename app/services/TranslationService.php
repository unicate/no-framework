<?php

declare(strict_types=1);

namespace nofw\services;

use nofw\core\Constants;
use Unicate\LanguageDetection\Detection;

class TranslationService {

    private $translation;
    private $lang;

    public function __construct(Detection $langDetection) {
        $this->translation = require_once Constants::TRANSLATION_FILE;
        $this->setLang($langDetection->detectLang());
    }

    public function setLang($lang) {
        $this->lang = $lang;
    }

    public function getLang(): string {
        return $this->lang;
    }

    public function translate(string $token) {
        $lang = (is_null($this->lang) ? Constants::DEFAULT_LANG : $this->lang);
        if (!array_key_exists($lang, $this->translation)) {
            throw new \RuntimeException("Missing language \"$lang\" in translation file!");
        }
        if (!array_key_exists($token, $this->translation[$lang])) {
            return $token;
        } else {
            return $this->translation[$lang][$token];
        }
    }


}