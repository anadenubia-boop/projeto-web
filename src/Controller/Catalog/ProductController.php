<?php

declare(strict_types=1);

namespace Ana\FdsApp\Controller\Catalog;

use Ana\FdsApp\Controller\AbstractController;
use Ana\FdsApp\Domain\Product\Service\ProductService;
use Ana\FdsApp\Http\Request;
use Ana\FdsApp\Http\Response;
use RuntimeException;

final class ProductController extends AbstractController
{
    public function __construct(
        private readonly ProductService $productService
    ) {
        parent::__construct();
    }

    public function show(
        Request $request,
        int $id
    ): Response {

        $product = $this->productService->findById($id);

        if ($product === null) {
            throw new RuntimeException(
                'Produto não encontrado.'
            );
        }

        return $this->render(
            'catalog/product.html.twig',
            [
                'title' => $product->name(),
                'product' => $product,
            ]
        );
    }
}