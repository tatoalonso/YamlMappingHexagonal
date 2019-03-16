<?php

namespace MyApp\Component\Product\Domain;




class Product
{

    private $id;


    private $name;


    private $price;


    private $description;
    

    private $owner;

    public function __construct(string $name, float $price, string $description, Owner $owner)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->owner = $owner;
    }


    public function getId() :int
    {
        return $this->id;
    }


    public function getName() :string
    {
        return $this->name;
    }


    public function setName(string $name)
    {
        $this->name = $name;

    }


    public function getPrice() :int
    {
        return $this->price;
    }


    public function setPrice(int $price)
    {
        $this->price = $price;
    }


    public function getDescription() :string
    {
        return $this->description;
    }


    public function setDescription(string $description)
    {
        $this->description = $description;
    }


    public function getOwner(): Owner
    {
        return $this->owner;
    }


    public function setOwner(Owner $owner) : Owner
    {
        $this->owner = $owner;
    }

    public function productToArray() :array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'description' => $this->getDescription(),
            'ownerId' => $this->getOwner()->getId()
        ];
    }
}