<?php

namespace Nofw\models;

use Medoo\Medoo;
use Nofw\Services\DatabaseService;
use PhpParser\Node\Expr\AssignOp\Mod;

class UserModel extends Model {

    public function __construct(Medoo $db) {
        parent::__construct($db);
    }



    public function login() {
        $this->getOne(['email' => 'raoul@bla.com']);
    }


}