<?php

declare(strict_types=1);

namespace Ana\FdsApp\Controller;

use Ana\FdsApp\Bootstrap\ProductBootstrap;
use Ana\FdsApp\Controller\Catalog\HomeController;
use Ana\FdsApp\Controller\Catalog\ProductController;
use RuntimeException;

final class ControllerFactory
{
    /**
     * @var array<string, callable(): object>
     */
    private array $factories;

    public function __construct()
    {
        $this->factories = [

            HomeController::class => fn () => new HomeController(
                ProductBootstrap::make()
            ),

            ProductController::class => fn () => new ProductController(
                ProductBootstrap::make()
            ),

        ];
    }

    public function make(string $controllerClass): object
    {
        if (! isset($this->factories[$controllerClass])) {
            throw new RuntimeException(
                sprintf(
                    'Controller "%s" não registrado.',
                    $controllerClass
                )
            );
        }

        return ($this->factories[$controllerClass])();
    }
}