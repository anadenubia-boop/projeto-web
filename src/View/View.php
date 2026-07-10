<?php

declare(strict_types=1);

namespace Ana\FdsApp\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class View
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(
            __DIR__ . '/../../templates'
        );

        $this->twig = new Environment($loader);
    }

    public function render(
        string $template,
        array $data = []
    ): string {
        return $this->twig->render($template, $data);
    }
}