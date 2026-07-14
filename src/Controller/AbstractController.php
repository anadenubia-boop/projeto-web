<?php

declare(strict_types=1);

namespace Ana\FdsApp\Controller;

use Ana\FdsApp\Http\Response;
use Ana\FdsApp\View\View;

abstract class AbstractController
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function render(
        string $view,
        array $data = []
    ): Response
    {
        $defaults = [
            'appName' => 'FDS App',
        ];

        $html = $this->view->render(
            $view,
            array_merge($defaults, $data)
        );

        return new Response($html);
    }

    protected function redirect(string $url): Response
    {
        return new \Ana\FdsApp\Http\RedirectResponse($url);
    }
}