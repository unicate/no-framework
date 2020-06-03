<?php

namespace Nofw\models;

use Nofw\Services\DatabaseService;

class TaskModel {

    private $model;

    public function __construct(DatabaseService $db) {
        $this->model = $db->model(self::class);
    }

    public function add(string $name, string $text) {
        return $this->model->insert([
            'name' => $name,
            'text' => $text,
            "status" => 0,
        ]);
    }

    public function list() {
        return $this->model->getAll(['status' => '0']);
    }


}