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
        return $this->products();
    }

    public function findById(int $id): ?Product
    {
        foreach ($this->products() as $product) {

            if ($product->id() === $id) {
                return $product;
            }
        }

        return null;
    }

    /**
     * @return Product[]
     */
    private function products(): array
    {
        return [

            new Product(
                1,
                'Rosa Vermelha',
                'Buquê com 12 rosas vermelhas.',
                89.90,
                'rosa-vermelha.jpg'
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
}