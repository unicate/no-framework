<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Nofw\Utils;

use Firebase\JWT\JWT;

class JWTHelper {

    /**
     * @see https://tools.ietf.org/html/rfc7519#section-4.1.1
     *
     * @param type $secret
     * @param type $scopes
     * @return type
     * @throws \Exception
     */
    public static function getToken($secret, $scopes, $user): string {
        $now = new \DateTime();
        $future = new \DateTime("now +1 hour");

        $payload = [
            "iss" => "nofw",
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => md5("nofw-" . $now->getTimeStamp()),
            "sub" => $user,
            "scope" => $scopes
        ];

        return JWT::encode($payload, $secret, "HS256");
    }

    public static function setTokenCookie($secret, $scopes, $user): string {
        $token = self::getToken($secret, $scopes, $user);
        //setcookie(name, value, expire, path, domain, secure, httponly);
        setcookie("token", $token, 0, "/", "", false, true);
        return $token;
    }

    public static function getTokenPayload() : array {
        $token = $_COOKIE["token"];
        $payload = explode(".", $token)[1];
        $payload = JWT::urlsafeB64Decode($payload);
        $payload = JWT::jsonDecode($payload);
        return get_object_vars($payload);
    }

    public static function deleteTokenCookie() : bool {
        return setcookie("token", "", time() - 3600, "/", "", false, true);
    }

}

?>
