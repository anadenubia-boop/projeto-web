<?php

declare(strict_types=1);

namespace Ana\FdsApp\Controller\Catalog;

use Ana\FdsApp\Domain\Product\Service\ProductService;
use Ana\FdsApp\Controller\AbstractController;
use Ana\FdsApp\Http\Request;
use Ana\FdsApp\Http\Response;


final class HomeController extends AbstractController
{
    
    public function __construct(
        private readonly ProductService $productService
    ) {
        parent::__construct();
    }

    public function index(Request $request): Response
    {
        $products = $this->productService->findAll();

        return $this->render(
            'catalog/index.html.twig',
            [
                'title'    => 'Catálogo',
                'products' => $products,
            ]
        );
    }
}