<?php

declare(strict_types=1);

namespace nofw\services;

use nofw\core\Constants;

class TranslationService {

    private $translation;

    public function __construct() {
        $this->translation = $config = require_once Constants::TRANSLATION_FILE;
    }

    public function translate(string $token, string $language = Constants::DEFAULT_LANG) {
        if (!array_key_exists($language, $this->translation)) {
            throw new \RuntimeException("Missing language \"$language\" in translation file!");
        }
        if (!array_key_exists($token, $this->translation[$language])) {
            return $token;
        } else {
            return $this->translation[$language][$token];
        }
    }

}