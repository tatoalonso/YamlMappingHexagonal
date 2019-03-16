<?php

namespace MyApp\Component\Product\Application\UseCases;

use MyApp\Component\Product\Application\Dto\ProductDto;
use MyApp\Component\Product\Domain\Product;
use MyApp\Component\Product\Domain\Repository\ProductRepository;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;

class RegisterNewProductUseCase
{
    private $productRepository;
    private $ownerRepository;


    public function __construct(ProductRepository $productRepository,OwnerRepository $ownerRepository)
    {
        $this->productRepository = $productRepository;
        $this->ownerRepository = $ownerRepository;
    }
    public function registerProduct(ProductDto $dto): ?array
    {

        $owner = $this->ownerRepository->findOwnerById($dto->getOwnerId());
        $product = new Product($dto->getName(), $dto->getPrice(), $dto->getDescription(), $owner);
        return $this->productRepository->saveProduct($product);


    }
}