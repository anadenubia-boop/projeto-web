<?php

declare(strict_types=1);

namespace Ana\FdsApp\Controller;

final class HomeController
{
    public function index(): array
    {
        return [
            'titulo' => 'Olá, Mundo!',
            'mensagem' => 'Bem-vinda ao projeto FDS App.',
        ];
    }
}