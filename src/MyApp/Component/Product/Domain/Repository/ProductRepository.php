<?php

namespace MyApp\Component\Product\Domain\Repository;

use MyApp\Component\Product\Domain\Product;

interface ProductRepository
{

    public function saveProduct(Product $product): ?array;
    public function deleteProduct(int $idProduct): void;
    public function updateProduct(Product $product): void;
    public function findProductById (int $productId): Product;
    public function findAll (): array;

}