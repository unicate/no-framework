<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

namespace Nofw\Models;

use Nofw\Services\DatabaseService;

class UserModel {

    private $model;

    public function __construct(DatabaseService $db) {
        $this->model = $db->model(self::class);
    }

    public function register(string $name, string $email, string $password) :bool {
        return $this->model->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            "status" => 0,
            "date_created" => date("Y-m-d H:i:s")
        ]);
    }

    public function verifyLogin(string $email, string $password) : bool {
        return $this->model->hasOne([
            'email' => $email,
            'password' => $password
        ]);
    }


}