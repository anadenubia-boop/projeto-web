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
        string $template,
        array $data = [],
        int $status = 200
    ): Response {
        return new Response(
            $this->view->render($template, $data),
            $status
        );
    }

    protected function redirect(string $url): Response
    {
        return new \Ana\FdsApp\Http\RedirectResponse($url);
    }
}