<?php

namespace MyApp\Component\Product\Application\UseCases;

use MyApp\Component\Product\Domain\Repository\ProductRepository;

class ListProductsUseCase
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function listAll(): array
    {
        return $this->productRepository->findAll();
    }
}