<?php


namespace nofw\services;

use nofw\core\Constants;

class ConfigService {

    public $appVersion;
    public $basePath;
    public $dbName;
    public $dbUser;
    public $dbPassword;

    public function __construct() {
        $config = require_once Constants::CONFIG_FILE;

        $this->appVersion = $config['APP_VERSION'];
        $this->basePath = $config['BASE_PATH'];
        $this->dbName = $config['DB_NAME'];
        $this->dbUser = $config['DB_USER'];
        $this->dbPassword = $config['DB_PWD'];
    }
}