<?php


namespace MyApp\Component\Product\Application\UseCases;


use MyApp\Component\Product\Application\Dto\OwnerDto;
use MyApp\Component\Product\Domain\Owner;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;

class RegisterNewOwnerUseCase
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }
    public function registerOwner(OwnerDto $dto): ?array
    {
        $owner = new Owner($dto->getName());
        return $this->ownerRepository->saveOwner($owner);

    }

}