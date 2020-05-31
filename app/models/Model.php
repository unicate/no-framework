<?php

namespace Nofw\models;

use Nofw\Services\DatabaseService;

class Model {

    private $db;
    private $table;

    public function __construct(DatabaseService $dbService, $table = null) {
        $this->db = $dbService->get();
        if (is_null($table)) {
            $clazz = strtolower(substr(strrchr(get_class($this), "\\"), 1));
            $table = str_replace('model', '', $clazz);
        }
        $this->table = $table;
    }

    public function getOne(array $params): array {
        $result = $this->db->get($this->table, "*", ["AND" => $params]);
        if (empty($result)) {
            return [];
        } else {
            return $result;
        }
    }

    public function getAll(array $params): array {
        return $this->db->select($this->table, "*", ["AND" => $params]);
    }


    public function insertOne(array $data): bool {
        $pdo = $this->db->insert($this->table, $data);
        return ($pdo->rowCount() > 0);
    }


}