<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Ana\FdsApp\Http\Request;
use Ana\FdsApp\Http\Router;
use Ana\FdsApp\Support\Config;

Config::load(__DIR__ . '/../config/app.php');

$router = new Router();

require_once __DIR__ . '/../routes/web.php';

$request = new Request();

$response = $router->dispatch($request);

$response->send();