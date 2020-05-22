<?php

declare(strict_types=1);

namespace nofw\services;

use Medoo\Medoo;
use PDO;

class DatabaseService {

    private $connection;

    public function __construct(ConfigService $configService) {
        $this->connection = new Medoo([
            'database_type' => 'mysql',
            'server' => 'localhost',
            'database_name' => $configService->getDbName(),
            'username' => $configService->getDbUser(),
            'password' => $configService->getDbPassword(),
            'charset' => 'utf8',
            "logging" => true,
            // 'port' => 8889,
            'prefix' => 'wy_',
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ]);
    }

    public function info() : array {
        return $this->connection->info();
    }



}