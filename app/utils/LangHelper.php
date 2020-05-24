<?php

declare(strict_types=1);

namespace nofw\utils;


use nofw\core\Constants;

class LangHelper {

    public static function getLang(): string {

        // Set the default language. If no other rule matches, this one wins.
        $lang = Constants::DEFAULT_LANG;

        // Check if any part of the URL matches an available language.
        $uriArray = explode('/', $_SERVER['REQUEST_URI']);
        $langArray = array_intersect(Constants::AVAILABLE_LANG, $uriArray);
        if (!empty($langArray)) {
            $lang = array_values($langArray)[0];
        }

        // Check if 'lang' cookie was set
        if (isset($_COOKIE["lang"])) {
            $lang = $_COOKIE["lang"];
        }

        // Check if there is a 'lang' query param.
        if (array_key_exists('lang', $_GET)) {
            $lang = $_GET['lang'];
        }

        // Check if there is a 'language' query param.
        if (array_key_exists('language', $_GET)) {
            $lang = $_GET['language'];
        }

        return $lang;

    }

    public static function setLangCookie(string $lang): bool {
        return setcookie("lang", $lang);
    }


}

?>
