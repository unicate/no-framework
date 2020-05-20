<?php


namespace nofw\services;


class ConfigService {

    public $appVersion;
    public $basePath;
    public $dbName;
    public $dbUser;
    public $dbPassword;

    public function __construct() {
        $config = include(__DIR__ . '/../config/config.php');

        $this->appVersion = $config['APP_VERSION'];
        $this->basePath = $config['BASE_PATH'];
        $this->dbName = $config['DB_NAME'];
        $this->dbUser = $config['DB_USER'];
        $this->dbPassword = $config['DB_PWD'];
    }
}