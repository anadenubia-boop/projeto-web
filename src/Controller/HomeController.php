<?php

declare(strict_types=1);

namespace Ana\FdsApp\Controller\Catalog;

use Ana\FdsApp\Bootstrap\ProductBootstrap;
use Ana\FdsApp\Controller\AbstractController;
use Ana\FdsApp\Http\Request;
use Ana\FdsApp\Http\Response;

final class HomeController extends AbstractController
{
    public function index(Request $request): Response
    {
        $productService = ProductBootstrap::service();

        $products = $productService->findAll();

        return $this->render(
            'catalog/index.html.twig',
            [
                'title'    => 'Catálogo',
                'products' => $products,
            ]
        );
    }
}