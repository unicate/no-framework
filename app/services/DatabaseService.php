<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Nofw\Services;

use Medoo\Medoo;
use Psr\Log\LoggerInterface;

class DatabaseService {

    private $db;
    private $logger;
    private $table;

    public function __construct(Medoo $db, LoggerInterface $logger) {
        $this->db = $db;
        $this->logger = $logger;
    }

    public function getService(): Medoo {
        return $this->db;
    }

    public function table(string $table): DatabaseService {
        $this->table = $table;
        return $this;
    }

    public function model($model): DatabaseService {
        $nameSpace = explode('\\', $model);
        $clazz = strtolower(end($nameSpace));
        $this->table = str_replace('model', '', $clazz);
        $this->logger->debug(__METHOD__ . ' | Table: ' . $this->table);
        return $this;
    }

    public function hasOne(array $where): bool {
        $result = $this->db->has($this->table, $where);
        $this->logger->debug(__METHOD__ . ' | ' . $this->db->last());
        return $result;
    }

    public function getOne(array $where): array {
        $result = $this->db->get($this->table, "*", $where);
        $this->logger->debug(__METHOD__ . ' | ' . $this->db->last());
        if (empty($result)) {
            return [];
        } else {
            return $result;
        }
    }

    public function getAll(array $where): array {
        $result = $this->db->select($this->table, "*", $where);
        $this->logger->debug(__METHOD__ . ' | ' . $this->db->last());
        if (empty($result)) {
            return [];
        } else {
            return $result;
        }
    }

    public function insert(array $data): bool {
        $pdo = $this->db->insert($this->table, $data);
        $this->logger->debug(__METHOD__ . ' | ' . $this->db->last());
        return ($pdo->rowCount() > 0);
    }

    public function update(array $data, array $where): bool {
        $pdo = $this->db->update($this->table, $data, $where);
        $this->logger->debug(__METHOD__ . ' | ' . $this->db->last());
        return ($pdo->rowCount() > 0);
    }

    public function delete(array $where): bool {
        $pdo = $this->db->delete($this->table, $where);
        $this->logger->debug(__METHOD__ . ' | ' . $this->db->last());
        return ($pdo->rowCount() > 0);
    }

    public function info() {
        return $this->db->info();
    }

}