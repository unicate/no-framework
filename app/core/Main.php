<?php

use DI\Container;
use nofw\services\RoutingService;

class Main {

    public function __construct() {
        $container = new Container();
        $routing = new RoutingService($container);
    }
}

new Main();
