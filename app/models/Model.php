<?php

namespace Nofw\models;

use Medoo\Medoo;
use Nofw\Services\DatabaseService;

class Model {

    private $db;
    private $table;

    public function __construct(Medoo $db, $table = '') {
        $this->db = $db;
        $this->setTable($table);
    }

    private function setTable(string $table) {
        if (empty($table)) {
            $nameSpace = explode('\\', get_class($this));
            $clazz = strtolower(end($nameSpace));
            $table = str_replace('model', '', $clazz);
        }
        $this->table = $table;
    }

    public function hasOne(array $where): bool {
        return $this->db->has($this->table, ["AND" => $where]);
    }

    public function getOne(array $where): array {
        $result = $this->db->get($this->table, "*", ["AND" => $where]);
        if (empty($result)) {
            return [];
        } else {
            return $result;
        }
    }

    public function getAll(array $where): array {
        return $this->db->select($this->table, "*", ["AND" => $where]);
    }

    public function insert(array $data): bool {
        $pdo = $this->db->insert($this->table, $data);
        return ($pdo->rowCount() > 0);
    }

    public function update(array $data, array $where): bool {
        $pdo = $this->db->update($this->table, $data, ["AND" => $where]);
        return ($pdo->rowCount() > 0);
    }

    public function delete(array $where): bool {
        $pdo = $this->db->delete($this->table, ["AND" => $where]);
        return ($pdo->rowCount() > 0);
    }

    public function info() {
        return $this->db->info();
    }

}