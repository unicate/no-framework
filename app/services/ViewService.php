<?php

declare(strict_types=1);

namespace Nofw\Services;

use League\Plates\Engine;

class ViewService {

    private $provider;

    function __construct(Engine $provider) {
        $this->provider = $provider;
    }

    public function renderPage(string $pageName, array $data): string {
        return $this->provider->render($pageName, $data);
    }

    /**
     * @deprecated
     */
    public function addData(array $data) {
        $this->provider->addData($data);
    }


}
