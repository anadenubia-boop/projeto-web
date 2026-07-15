<?php

declare(strict_types=1);

use Ana\FdsApp\Controller\Catalog\HomeController;
use Ana\FdsApp\Controller\LoginController;

/** @var \Ana\FdsApp\Http\Router $router */

$router->get('/', [HomeController::class, 'index']);
