<?php

namespace Nofw\models;

use Nofw\Services\DatabaseService;

class UserModel {

    private $model;

    public function __construct(DatabaseService $db) {
        $this->model = $db->model($this);
    }

    public function verifyLogin(string $email, string $password) {
        return $this->model->hasOne([
            'email' => $email,
            'password' => md5(md5($password))
        ]);
    }


}