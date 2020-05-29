<?php

declare(strict_types=1);

namespace nofw\services;

use Medoo\Medoo;
use PDO;
use nofw\core\Config;

class DatabaseService {

    private $connection;

    public function __construct(Config $config) {

        $this->connection = new Medoo([
            'database_type' => 'mysql',
            'server' => $config->getDbHost(),
            'port' => $config->getDbPort(),
            'database_name' => $config->getDbName(),
            'username' => $config->getDbUser(),
            'password' => $config->getDbPassword(),
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