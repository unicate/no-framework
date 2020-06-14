<?php

namespace Nofw\Tests\Utils;

use Nofw\Utils\JWTHelper;
use PHPUnit\Framework\TestCase;

class JWTHelperTest extends TestCase {
    private $secret;
    private $scopes;
    private $user;

    protected function setUp() {
        $this->secret = '123456';
        $this->scopes = ['user', 'admin'];
        $this->user = 'User-Name';
    }

    public function testToken() {
        // Generate Token
        $token = JWTHelper::getToken($this->secret, $this->scopes, $this->user);

        // Token Header
        $this->assertEquals(
            'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9',
            explode('.', $token)[0]
        );

        // Set Cookie
        $_COOKIE["token"] = $token;

        // Get Token
        $payload = JWTHelper::getTokenPayload();

        $this->assertNotNull($payload);
        $this->assertEquals($this->user, $payload['sub']);
        $this->assertEquals($this->scopes, $payload['scope']);
    }

}
