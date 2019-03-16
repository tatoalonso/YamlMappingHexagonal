<?php

namespace MyApp\Component\Product\Domain;




class Owner
{


    private $id;


    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }


    public function getId() :int
    {
        return $this->id;
    }


    public function getName():string
    {
        return $this->name;
    }


    public function setName(string $name) :string
    {
        $this->name = $name;
    }

    public function ownerToArray():array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }

}