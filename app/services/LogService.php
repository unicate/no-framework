<?php

declare(strict_types=1);

namespace nofw\services;

use League\Plates\Engine;
use nofw\core\Constants;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\InvalidArgumentException;

class LogService implements LoggerInterface {

    private $configService;
    private $logLevel;
    private $supportedLogLevels;

    function __construct(ConfigService $configService) {
        $this->configService = $configService;
        $this->logLevel = $configService->getAppLogLevel();
        $this->supportedLogLevels = [
            LogLevel::EMERGENCY, LogLevel::ALERT, LogLevel::CRITICAL,
            LogLevel::ERROR, LogLevel::WARNING, LogLevel::NOTICE,
            LogLevel::INFO, LogLevel::DEBUG
        ];
        if (!in_array($this->logLevel, $this->supportedLogLevels)) {
            throw new InvalidArgumentException("Log-Level \"$this->logLevel\" is not supported.");
        }
    }

    public function emergency($message, array $context = array()) {
        if ($this->logThisLevel(LogLevel::EMERGENCY)) {
            $this->log(LogLevel::EMERGENCY, $message, $context);
        }
    }

    public function alert($message, array $context = array()) {
        if ($this->logThisLevel(LogLevel::ALERT)) {
            $this->log(LogLevel::ALERT, $message, $context);
        }
    }

    public function critical($message, array $context = array()) {
        if ($this->logThisLevel(LogLevel::CRITICAL)) {
            $this->log(LogLevel::CRITICAL, $message, $context);
        }
    }

    public function error($message, array $context = array()) {
        if ($this->logThisLevel(LogLevel::ERROR)) {
            $this->log(LogLevel::ERROR, $message, $context);
        }
    }

    public function warning($message, array $context = array()) {
        if ($this->logThisLevel(LogLevel::WARNING)) {
            $this->log(LogLevel::WARNING, $message, $context);
        }
    }

    public function notice($message, array $context = array()) {
        if ($this->logThisLevel(LogLevel::NOTICE)) {
            $this->log(LogLevel::NOTICE, $message, $context);
        }
    }

    public function info($message, array $context = array()) {
        if ($this->logThisLevel(LogLevel::INFO)) {
            $this->log(LogLevel::INFO, $message, $context);
        }
    }

    public function debug($message, array $context = array()) {
        if ($this->logThisLevel(LogLevel::DEBUG)) {
            $this->log(LogLevel::DEBUG, $message, $context);
        }
    }

    private function logThisLevel($callerLogLevel): bool {
        $currentLogLevelInt = array_search($this->logLevel, $this->supportedLogLevels);
        $callerLogLevelInt = array_search($callerLogLevel, $this->supportedLogLevels);
        return $callerLogLevelInt <= $currentLogLevelInt;
    }

    function interpolate($message, array $context = array()) {
        // build a replacement array with braces around the context keys
        $replace = array();
        foreach ($context as $key => $val) {
            // check that the value can be casted to string
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }

        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }

    public function log($level, $message, array $context = array()) {
        $dateTime = (new \DateTimeImmutable('now'))->format('Y-m-d H:i:s.u');
        $fileName = (new \DateTimeImmutable('now'))->format('Y-m-d') . '_nofw_log.txt';
        $message = $this->interpolate($message, $context);
        $logEntry = '' .
            $dateTime . ' ' .
            str_pad(strtoupper($level), 9) . ' ' .
            $this->interpolate($message, $context) . ' ' .
            PHP_EOL;
        try {
            $fh = fopen(Constants::LOGS_DIR . '/' . $fileName, 'a');
            fwrite($fh, $logEntry);
            fclose($fh);
        } catch (\Throwable $e) {
            throw new \RuntimeException("Could not open logs file!", 0, $e);
        }
    }

}
