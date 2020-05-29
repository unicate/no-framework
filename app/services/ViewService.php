<?php

declare(strict_types=1);

namespace nofw\services;

use League\Plates\Engine;

class ViewService {

    private $provider;

    function __construct(Engine $provider) {
        $this->provider = $provider;
    }

    public function renderPage(string $pageName, array $data): string {
        return $this->provider->render($pageName, $data);
    }


}
