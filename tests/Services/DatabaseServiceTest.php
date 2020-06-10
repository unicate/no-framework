<?php

namespace services;

use Medoo\Medoo;
use Nofw\Core\Config;
use Nofw\Core\Constants;
use Nofw\Services\DatabaseService;
use PHPUnit\Framework\TestCase;
use \PDO;

class DatabaseServiceTest extends TestCase {

    private $provider;

    protected function setUp() {
        $config = new Config(Constants::CONFIG_FILE);
        $dbConfig = [
            'database_type' => 'mysql',
            'server' => $config->getDbHost(),
            'port' => $config->getDbPort(),
            'database_name' => $config->getDbName(),
            'username' => $config->getDbUser(),
            'password' => $config->getDbPassword(),
            'charset' => 'utf8',
            "logging" => true,
            'prefix' => 'nofw_',
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ];
        $this->provider = new Medoo($dbConfig);

    }

    public function testConnection() {
        $db = new DatabaseService($this->provider);
        $info = $db->info();
        echo print_r($info, true);
        $this->assertNotEmpty($info);
    }
}
