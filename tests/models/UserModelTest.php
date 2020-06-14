<?php

namespace Nofw\Tests\Models;

use Nofw\Tests\AbstractDBService;
use Nofw\Models\UserModel;


class UserModelTest extends AbstractDBService {
    private $model;
    private $ts;

    public function setUp() {
        parent::setUp();
        $this->model = new UserModel($this->getDBService());
        $this->ts = time();
    }


    public function testRegister() {
        $success = $this->model->register(
            'Tester',
            'tester' . $this->ts . '@test.com',
            '123456'
        );
        $this->assertTrue($success);

    }

    /**
     * @depends testRegister
     */
    public function testVerifyLogin() {
        $success = $this->model->verifyLogin('tester' . $this->ts . '@test.com', '123456');
        $this->assertTrue($success);
    }


}
