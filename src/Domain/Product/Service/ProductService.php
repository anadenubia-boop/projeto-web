<?php

declare(strict_types=1);

namespace Ana\FdsApp\Domain\Product\Service;

use Ana\FdsApp\Domain\Product\Entity\Product;
use Ana\FdsApp\Domain\Product\Repository\ProductRepositoryInterface;

final readonly class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {
    }

    /**
     * @return Product[]
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    public function findById(int $id): ?Product
    {
        return $this->repository->findById($id);
    }
}