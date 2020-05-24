<?php

declare(strict_types=1);

namespace nofw\utils;


use nofw\core\Constants;

class LangHelper {


    public static function getLang(): string {
        $query = $_GET;
        if (array_key_exists('lang', $query)) {
            $lang = $query['lang'];
        } else if (array_key_exists('language', $query)) {
            $lang = $query['language'];
        } else {
            $lang = Constants::DEFAULT_LANG;
        }
        return $lang;

    }


}

?>
