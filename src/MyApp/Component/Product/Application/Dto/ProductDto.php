<?php


namespace MyApp\Component\Product\Application\Dto;


class ProductDto
{
    private $name;
    private $price;
    private $description;
    private $ownerId;
    public function __construct(string $name, float $price, string $description, int $ownerId)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->ownerId = $ownerId;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

}