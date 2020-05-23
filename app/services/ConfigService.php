<?php

declare(strict_types=1);

namespace nofw\services;

use nofw\core\Constants;

class ConfigService {

    private $appVersion;
    private $appLogLevel;
    private $appSecret;
    private $basePath;
    private $dbHost;
    private $dbPort;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public function __construct() {
        $config = require_once Constants::CONFIG_FILE;
        $this->appVersion = $config['APP_VERSION'];
        $this->appLogLevel = $config['APP_LOG_LEVEL'];
        $this->appSecret = $config['APP_SECRET'];
        $this->basePath = $config['BASE_PATH'];
        $this->dbHost = $config['DB_HOST'];
        $this->dbPort = $config['DB_PORT'];
        $this->dbName = $config['DB_NAME'];
        $this->dbUser = $config['DB_USER'];
        $this->dbPassword = $config['DB_PWD'];
    }

    public function getAppVersion(): string {
        return $this->appVersion;
    }

    public function getAppLogLevel() {
        return $this->appLogLevel;
    }

    public function getAppSecret(): string {
        return $this->appSecret;
    }

    public function getBasePath(): string {
        return $this->basePath;
    }

    public function getDbHost(): string {
        return $this->dbHost;
    }

    public function getDbPort(): string {
        return $this->dbPort;
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