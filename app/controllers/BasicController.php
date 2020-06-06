<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2020
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Nofw\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Nofw\Services\ViewService;


class BasicController extends AbstractController {

    protected $view;

    public function __construct(ViewService $view) {
        $this->view = $view;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface {
        return $this->page('index');
    }

}