<?php

declare(strict_types=1);

namespace nofw\services;

use Laminas\Diactoros\ServerRequestFactory;
use nofw\core\Constants;
use Psr\Http\Message\ServerRequestInterface;

class TranslationService {

    private $translation;
    private $lang;

    public function __construct() {
        $this->translation = $config = require_once Constants::TRANSLATION_FILE;
        $this->setLang($this->detectLang());
    }

    public function detectLang(): string {
        $request = ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_COOKIE
        );

        // Set the default language. If no other rule matches, this one wins.
        $lang = Constants::DEFAULT_LANG;

        // Try to get Language from Accept-Language Header
        $header = $request->getHeader('accept-language');
        if (!empty($header)) {
            $acceptFromHttp = \Locale::acceptFromHttp($header[0]);
            $headerLang = explode('_', $acceptFromHttp)[0];
            if (in_array($headerLang, Constants::AVAILABLE_LANG)) {
                $lang = $headerLang;
            }
        }

        // Check if any part of the URL matches an available language.
        $uriPath = $request->getUri()->getPath();
        $uriArray = explode('/', $uriPath);
        $langArray = array_intersect($uriArray, Constants::AVAILABLE_LANG);
        if (!empty($langArray)) {
            $lang = array_values($langArray)[0];
        }

        // Check if there is a 'lang' query param.
        $queryParam = $request->getQueryParams();
        if (array_key_exists('lang', $queryParam)) {
            $lang = $queryParam['lang'];
        }

        // Check if 'lang' cookie was set
        $cookie = $request->getCookieParams();
        if (isset($cookie["lang"])) {
            $lang = $cookie["lang"];
        }

        return $lang;
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