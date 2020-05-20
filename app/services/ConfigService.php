<?php


namespace nofw\services;

use Symfony\Component\Dotenv\Dotenv;

class ConfigService {

    public $appVersion;
    public $basePath;
    public $dbName;
    public $dbUser;
    public $dbPassword;

    public function __construct() {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../config/.env');
        $this->appVersion = $_ENV['APP_VERSION'];
        $this->basePath = $_ENV['BASE_PATH'];
        $this->dbName= $_ENV['DB_NAME'];
        $this->dbUser = $_ENV['DB_USER'];
        $this->dbPassword = $_ENV['DB_PWD'];
    }
}