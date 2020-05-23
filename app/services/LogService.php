<?php

declare(strict_types=1);

namespace nofw\services;

use League\Plates\Engine;
use nofw\core\Constants;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class LogService implements LoggerInterface {

    private $configService;
    private $logLevel;
    private $logLevels;

    function __construct(ConfigService $configService) {
        $this->configService = $configService;
        $this->logLevel = $configService->getAppLogLevel();
        $this->logLevels = [
            LogLevel::EMERGENCY, LogLevel::ALERT, LogLevel::CRITICAL,
            LogLevel::ERROR, LogLevel::WARNING, LogLevel::NOTICE,
            LogLevel::INFO, LogLevel::DEBUG
        ];
    }


    public function emergency($message, array $context = array()) {
        if ($this->logLevel === LogLevel::EMERGENCY) {
            $this->log(LogLevel::EMERGENCY, $message, $context);
        }
    }

    public function alert($message, array $context = array()) {
        if ($this->logLevel === LogLevel::ALERT) {
            $this->log(LogLevel::ALERT, $message, $context);
        }
    }

    public function critical($message, array $context = array()) {
        if ($this->logLevel === LogLevel::CRITICAL) {
            $this->log(LogLevel::CRITICAL, $message, $context);
        }
    }

    public function error($message, array $context = array()) {
        if ($this->logLevel === LogLevel::ERROR) {
            $this->log(LogLevel::ERROR, $message, $context);
        }
    }

    public function warning($message, array $context = array()) {
        if ($this->logLevel === LogLevel::WARNING) {
            $this->log(LogLevel::WARNING, $message, $context);
        }
    }

    public function notice($message, array $context = array()) {
        if ($this->logLevel === LogLevel::NOTICE) {
            $this->log(LogLevel::NOTICE, $message, $context);
        }
    }

    public function info($message, array $context = array()) {
        if ($this->logLevel === LogLevel::INFO) {
            $this->log(LogLevel::INFO, $message, $context);
        }
    }

    public function debug($message, array $context = array()) {
        if ($this->logLevel === LogLevel::DEBUG) {
            $this->log(LogLevel::DEBUG, $message, $context);
        }
    }

    private function isEnabled($messageLogLevel) {
        $logLevelInt = array_search($this->logLevels, $this->logLevels);
        $logLevelInt = array_search($messageLogLevel, $this->logLevels);

    }

    public function log($level, $message, array $context = array()) {
        $dateTime = (new \DateTimeImmutable('now'))->format('Y-m-d H:i:s.u');
        $logEntry = $dateTime . ' ' .  str_pad($level, 10) . ' ' . $message . ' ' . PHP_EOL;
        try {
            $fh = fopen(Constants::LOGS_DIR . '/log.txt', 'a');
            fwrite($fh, $logEntry);
            fclose($fh);
        } catch (\Throwable $e) {
            throw new \RuntimeException("Could not open logs file!", 0, $e);
        }
    }

}
