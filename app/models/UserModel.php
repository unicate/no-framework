<?php

namespace Nofw\models;

use Nofw\Services\DatabaseService;
use PhpParser\Node\Expr\AssignOp\Mod;

class UserModel extends Model {

    private $db;

    public function __construct(DatabaseService $dbService) {
        parent::__construct($dbService);
    }

    public function getInfo() {
        return array('depricated');
    }




}