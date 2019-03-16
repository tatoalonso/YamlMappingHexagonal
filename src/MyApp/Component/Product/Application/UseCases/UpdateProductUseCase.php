<?php


namespace MyApp\Component\Product\Application\UseCases;

use MyApp\Component\Product\Domain\Repository\ProductRepository;
use MyApp\Component\Product\Application\Dto\ProductDto;


class UpdateProductUseCase
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;

    }
    public function updateProduct(int $idProduct,ProductDto $dto): void
    {
        $product = $this->productRepository->findProductById($idProduct);
        $product->setName($dto->getName());
        $product->setPrice($dto->getPrice());
        $product->setDescription($dto->getDescription());
        $this->productRepository->updateProduct($product);

    }



}