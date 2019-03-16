<?php

namespace MyApp\Component\Product\Application\Dto;


class OwnerDto
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
}