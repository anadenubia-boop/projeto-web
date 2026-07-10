<?php

declare(strict_types=1);

namespace Ana\FdsApp\Controller;

use Ana\FdsApp\Http\Request;
use Ana\FdsApp\Http\Response;

final class HomeController extends AbstractController
{
    public function index(Request $request): Response
    {
        return $this->render(
            'home/index.html.twig',
            [
                'titulo' => 'Página Inicial'
            ]
        );
    }
}