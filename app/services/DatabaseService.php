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
        $this->connection = new Medoo([
            'database_type' => 'mysql',
            'server' => 'localhost',
            'database_name' => $this->configService->dbName,
            'username' => $this->configService->dbUser,
            'password' => $this->configService->dbPassword,
            'charset' => 'utf8',
            "logging" => true,
            // 'port' => 8889,
            'prefix' => 'wy_',
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ]);
    }

    public function info() {
        return $this->connection->info();
    }

    public function getConnection() {
        return $this->connection;
    }


}