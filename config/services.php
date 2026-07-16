<?php

declare(strict_types=1);

use Ana\FdsApp\Container\ContainerInterface;
use Ana\FdsApp\Domain\Product\Repository\ProductRepositoryInterface;
use Ana\FdsApp\Domain\Product\Service\ProductService;
use Ana\FdsApp\Infrastructure\Persistence\Product\FakeProductRepository;
use Ana\FdsApp\Controller\Catalog\HomeController;


/** @var ContainerInterface $container */

$container->register(
    ProductRepositoryInterface::class,

    fn () => new FakeProductRepository()
);

$container->register(
    ProductService::class,

    fn (ContainerInterface $c) => new ProductService(
        $c->get(ProductRepositoryInterface::class)
    )
);

$container->register(
    HomeController::class,
    fn (ContainerInterface $c) => new HomeController(
        $c->get(ProductService::class)
    )
);