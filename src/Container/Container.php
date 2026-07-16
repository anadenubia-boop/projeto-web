<?php

declare(strict_types=1);

namespace Ana\FdsApp\Container;

use RuntimeException;

final class Container implements ContainerInterface
{
    /**
     * @var array<string, callable(self): object>
     */
    private array $bindings = [];

    /**
     * @var array<string, object>
     */
    private array $instances = [];

    public function register(
        string $id,
        callable $factory
    ): void {

        $this->bindings[$id] = $factory;
    }

    public function has(string $id): bool
    {
        return isset($this->bindings[$id]);
    }

    public function get(string $id): object
    {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        if (! isset($this->bindings[$id])) {
            throw new RuntimeException(
                sprintf(
                    'Serviço "%s" não registrado no Container.',
                    $id
                )
            );
        }

        $instance = ($this->bindings[$id])($this);

        $this->instances[$id] = $instance;

        return $instance;
    }
}