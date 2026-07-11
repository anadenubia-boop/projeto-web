<?php

declare(strict_types=1);

namespace Ana\FdsApp\Bootstrap;

use Ana\FdsApp\Domain\Product\Service\ProductService;
use Ana\FdsApp\Infrastructure\Persistence\Product\FakeProductRepository;

final class ProductBootstrap
{
    public static function service(): ProductService
    {
        return new ProductService(
            new FakeProductRepository()
        );
    }
}