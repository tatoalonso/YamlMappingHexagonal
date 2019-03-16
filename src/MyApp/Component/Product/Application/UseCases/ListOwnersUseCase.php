<?php

namespace MyApp\Component\Product\Application\UseCases;

use MyApp\Component\Product\Domain\Repository\OwnerRepository;

class ListOwnersUseCase
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }
    public function listAll(): array
    {
        return $this->ownerRepository->findAll();
    }

}