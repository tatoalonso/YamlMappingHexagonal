<?php


namespace MyApp\Component\Product\Application\UseCases;

use MyApp\Component\Product\Domain\Repository\ProductRepository;


class DeleteProductUseCase
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function deleteProduct(int $productId): void
    {
         $this->productRepository->deleteProduct($productId);
    }
}