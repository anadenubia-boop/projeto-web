<?php

use Ana\FdsApp\Container\Container;
use Ana\FdsApp\Domain\Product\Repository\ProductRepositoryInterface;
use Ana\FdsApp\Domain\Product\Service\ProductService;
use Ana\FdsApp\Infrastructure\Persistence\Product\FakeProductRepository;

return static function (Container $container): void {

    $container->set(
        ProductRepositoryInterface::class,
        fn () => new FakeProductRepository()
    );

    $container->set(
        ProductService::class,
        fn (Container $c) => new ProductService(
            $c->get(ProductRepositoryInterface::class)
        )
    );

};