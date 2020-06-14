<?php

namespace Nofw\Tests\Models;

use Nofw\Tests\AbstractDBService;
use Nofw\Models\TaskModel;


class TaskModelTest extends AbstractDBService {
    private $model;
    private $ts;

    public function setUp() {
        parent::setUp();
        $this->model = new TaskModel($this->getDBService());
        $this->ts = time();
    }


    public function testAdd() {
        $success = $this->model->add(
            'Task ' . $this->ts,
            'some task text'
        );
        $this->assertTrue($success);

    }

    /**
     * @depends testAdd
     */
    public function testList() {
        $list = $this->model->list();
        $this->assertNotEmpty($list);
    }




}
