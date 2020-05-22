<?php

declare(strict_types=1);

namespace nofw\services;

use nofw\core\Constants;

class ConfigService {

    private $appVersion;
    private $appSecret;
    private $basePath;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public function __construct() {
        $config = require_once Constants::CONFIG_FILE;
        $this->appVersion = $config['APP_VERSION'];
        $this->appSecret = $config['APP_SECRET'];
        $this->basePath = $config['BASE_PATH'];
        $this->dbName = $config['DB_NAME'];
        $this->dbUser = $config['DB_USER'];
        $this->dbPassword = $config['DB_PWD'];
    }

    public function getAppVersion(): string {
        return $this->appVersion;
    }

    public function getAppSecret(): string {
        return $this->appSecret;
    }

    public function getBasePath(): string {
        return $this->basePath;
    }

    public function getDbName(): string {
        return $this->dbName;
    }

    public function getDbUser(): string {
        return $this->dbUser;
    }

    public function getDbPassword(): string {
        return $this->dbPassword;
    }


}