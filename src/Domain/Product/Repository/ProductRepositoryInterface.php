<?php

declare(strict_types=1);

namespace Ana\FdsApp\Domain\Product\Repository;

use Ana\FdsApp\Domain\Product\Entity\Product;

interface ProductRepositoryInterface
{
    /**
     * @return Product[]
     */
    public function findAll(): array;

    public function findById(int $id): ?Product;
}