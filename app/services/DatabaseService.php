<?php

namespace nofw\services;

use Medoo\Medoo;
use nofw\services\ConfigService;
use PDO;

class DatabaseService {

    private $configService;
    private $connection;

    public function __construct(ConfigService $configService) {
        $this->configService = $configService;
        $this->init();
    }

    public function info() {
        return $this->connection->info();
    }

    /**
     * @see https://medoo.in/
     */
    private function init() {
        $connection = new Medoo([
            'database_type' => 'mysql',
            'server' => 'localhost',
            'database_name' => $this->configService->dbName,
            'username' => $this->configService->dbUser,
            'password' => $this->configService->dbPassword,
            'charset' => 'utf8',
            "logging" => true,
            // [optional]
            // 'port' => 8889,
            // [optional] Table prefix
            'prefix' => 'wy_',
            // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ]);
        $this->connection = $connection;
    }

    public function getConnection() {
        return $this->connection;
    }


}