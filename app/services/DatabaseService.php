<?php

declare(strict_types=1);

namespace Nofw\Services;

use Medoo\Medoo;

class DatabaseService {

    private $provider;

    public function __construct(Medoo $provider) {
        $this->provider = $provider;
    }

    public function get(): Medoo {
        return $this->provider;
    }

    public function info(): Medoo {
        return $this->provider->info();
    }


}