<?php

namespace Nofw\Tests\Services;

use Medoo\Medoo;
use Nofw\Core\Config;
use Nofw\Core\Constants;
use Nofw\Models\UserModel;
use Nofw\Services\DatabaseService;
use Nofw\Tests\AbstractDBService;
use \PDO;

class DatabaseServiceTest extends AbstractDBService {

    private $provider;

    protected function setUp() {
        parent::setUp();
    }

    public function testConnection() {
        $info = $this->getDBService()->info();
        echo print_r($info, true);
        $this->assertNotEmpty($info);
    }


}
