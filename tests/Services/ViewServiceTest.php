<?php

namespace Nofw\Tests\Services;

use League\Plates\Engine;
use Nofw\Core\Config;
use Nofw\Core\Constants;
use Nofw\Services\ViewService;
use PHPUnit\Framework\TestCase;

class ViewServiceTest extends TestCase {

    private $provider;

    protected function setUp() {
        $this->provider = new Engine(__DIR__);
    }

    public function testRenderPage() {
        $view = new ViewService($this->provider);
        $page = $view->renderPage('view', ['test'=>'some data']);
        $this->assertEquals('<html><head></head><body>some data</body></html>', $page);
    }

}
