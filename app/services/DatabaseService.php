<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Nofw\Services;

use Medoo\Medoo;

class DatabaseService {

    private $db;
    private $table;

    public function __construct(Medoo $db) {
        $this->db = $db;
    }

    public function getService(): Medoo {
        return $this->db;
    }

    public function table(string $table) : DatabaseService{
        $this->table = $table;
        return $this;
    }

    public function model($model) : DatabaseService{
        $nameSpace = explode('\\', $model);
        $clazz = strtolower(end($nameSpace));
        $this->table = str_replace('model', '', $clazz);
        return $this;
    }

    public function hasOne(array $where): bool {
        return $this->db->has($this->table, $where);
    }

    public function getOne(array $where): array {
        $result = $this->db->get($this->table, "*", $where);
        if (empty($result)) {
            return [];
        } else {
            return $result;
        }
    }

    public function getAll(array $where): array {
        $result = $this->db->select($this->table, "*", $where);
        if (empty($result)) {
            return [];
        } else {
            return $result;
        }
    }

    public function insert(array $data): bool {
        $pdo = $this->db->insert($this->table, $data);
        return ($pdo->rowCount() > 0);
    }

    public function update(array $data, array $where): bool {
        $pdo = $this->db->update($this->table, $data, $where);
        return ($pdo->rowCount() > 0);
    }

    public function delete(array $where): bool {
        $pdo = $this->db->delete($this->table, $where);
        return ($pdo->rowCount() > 0);
    }

    public function info() {
        return $this->db->info();
    }

}