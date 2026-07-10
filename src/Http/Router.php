<?php

declare(strict_types=1);

namespace Ana\FdsApp\Http;

use RuntimeException;

final class Router
{
    /**
     * @var array<string, array<string, array{0: class-string, 1: string}>>
     */
    private array $routes = [];

    public function get(string $uri, array $action): void
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, array $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute(string $method, string $uri, array $action): void
    {
        $this->routes[$method][$uri] = $action;
    }

    public function dispatch(Request $request): Response
    {
        $method = $request->method();
        $uri = $request->uri();

        if (! isset($this->routes[$method][$uri])) {
            throw new RuntimeException(
                sprintf('Rota "%s %s" não encontrada.', $method, $uri)
            );
        }

        [$controller, $action] = $this->routes[$method][$uri];

        $instance = new $controller();

        return $instance->$action($request);
    }
}