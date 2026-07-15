<?php

declare(strict_types=1);

namespace Ana\FdsApp\Domain\Product\Entity;

final class Product
{
    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly string $description,
        private readonly float $price,
        private readonly string $image
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function image(): string
    {
        return $this->image;
    }

    public function formattedPrice(): string
    {
        return number_format(
            $this->price,
            2,
            ',',
            '.'
        );
    }

    public function imagePath(): string
    {
        return '/assets/images/products/' . $this->image;
    }
}