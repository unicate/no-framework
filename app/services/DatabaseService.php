<?php

declare(strict_types=1);

namespace nofw\services;

use Medoo\Medoo;

class DatabaseService {

    private $provider;

    public function __construct(Medoo $provider) {
        $this->provider = $provider;
    }

    public function get(): Medoo {
        return $this->provider;
    }


}