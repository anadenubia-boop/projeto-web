<?php

declare(strict_types=1);

namespace Ana\FdsApp\Http;

use RuntimeException;

final class Router
{
    /**
     * @var array Route[]
     */
    private array $routes = [];

    public function get(string $path, array $action): void
    {
        $this->routes[] = new Route(
            'GET',
            $path,
            $action,
        );
    }

    public function post(string $path, array $action): void
    {
        $this->routes[] = new Route(
            'POST',
            $path,
            $action,
        );
    }

    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {

            if (! $route->matches(
                $request->method(),
                $request->uri()
            )) {
                continue;
            }

            [$controllerClass, $method] = $route->action();

            // TODO: Substituir pela resolução via Container de Dependências.
            $controller = new $controllerClass();

            return $controller->$method(
                $request,
                ...$route->extractParameters()
            );
        }

        throw new RuntimeException(
            sprintf(
                'Rota "%s %s" não encontrada.',
                $request->method(),
                $request->uri()
            )
        );
    }
}