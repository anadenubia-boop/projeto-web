<?php

declare(strict_types=1);

namespace Ana\FdsApp\Http;

final class Route
{
    /**
     * @var array<int, string>
     */
    private array $matches = [];

    public function __construct(
        private readonly string $method,
        private readonly string $path,
        private readonly array $action
    ) {
    }

    public function matches(string $method, string $uri): bool
    {
        if ($this->method !== $method) {
            return false;
        }

        $result = preg_match(
            $this->pattern(),
            $uri,
            $this->matches
        );

        return $result === 1;
    }

    /**
     * @return array<int, string>
     */
    public function extractParameters(): array
    {
        $matches = $this->matches;

        array_shift($matches);

        return array_values($matches);
    }

    public function action(): array
    {
        return $this->action;
    }

    private function pattern(): string
    {
        $pattern = preg_replace(
            '#\{[^/]+\}#',
            '([^/]+)',
            $this->path
        );

        return '#^' . $pattern . '$#';
    }
}