<?php

declare(strict_types=1);

use Ana\FdsApp\Controller\HomeController;
use Ana\FdsApp\Controller\LoginController;

/** @var \Ana\FdsApp\Http\Router $router */

$router->get('/', [HomeController::class, 'index']);

$router->get('/login', [LoginController::class, 'index']);

$router->post('/login', [LoginController::class, 'authenticate']);