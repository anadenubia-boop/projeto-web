<?php

declare(strict_types=1);

namespace Ana\FdsApp\Container;

interface ContainerInterface
{
    public function set(string $id, callable $factory): void;

    public function get(string $id): object;

    public function has(string $id): bool;
}