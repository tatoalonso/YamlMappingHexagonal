<?php

namespace MyApp\Component\Product\Domain;

use Doctrine\ORM\Mapping as ORM;


class Owner
{


    private $id;


    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

}