<?php

declare(strict_types=1);

namespace Ana\FdsApp\Infrastructure\Persistence\Product;

use Ana\FdsApp\Domain\Product\Entity\Product;
use Ana\FdsApp\Domain\Product\Repository\ProductRepositoryInterface;

final class FakeProductRepository implements ProductRepositoryInterface
{
    /**
     * @return Product[]
     */
    public function findAll(): array
    {
        return [

            new Product(
                1,
                'Rosa Vermelha',
                'Buquê com 12 rosas vermelhas.',
                89.90,
                'rosa.jpg'
            ),

            new Product(
                2,
                'Girassol',
                'Girassol natural.',
                39.90,
                'girassol.jpg'
            ),

            new Product(
                3,
                'Tulipa',
                'Tulipas importadas.',
                69.90,
                'tulipa.jpg'
            ),

        ];
    }

    public function findById(int $id): ?Product
    {
        foreach ($this->findAll() as $product) {

            if ($product->id() === $id) {
                return $product;
            }

        }

        return null;
    }
}