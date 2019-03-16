<?php

namespace MyApp\Component\Product\Domain\Repository;

use MyApp\Component\Product\Domain\Owner;

interface OwnerRepository
{

    public function saveOwner(Owner $owner) :?array;
    public function findAll(): array;
    public function findOwnerById(int $ownerId): Owner;

}