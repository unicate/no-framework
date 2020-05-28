<?php

declare(strict_types=1);

namespace nofw\services;

use Medoo\Medoo;
use PDO;
use nofw\core\Config;

class DatabaseService {

    private $connection;

    public function __construct(Config $configService) {

        $this->connection = new Medoo([
            'database_type' => 'mysql',
            'server' => $configService->getDbHost(),
            'port' => $configService->getDbPort(),
            'database_name' => $configService->getDbName(),
            'username' => $configService->getDbUser(),
            'password' => $configService->getDbPassword(),
            'charset' => 'utf8',
            "logging" => true,
            'prefix' => 'wy_',
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ]);
    }

    public function getConnection() : Medoo{
        return $this->connection;
    }

    public function info(): array {
        return $this->getConnection()->info();
    }



}