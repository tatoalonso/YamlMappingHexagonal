<?php

namespace MyApp\Bundle\ProductBundle\Owner\Repository;


use MyApp\Component\Product\Domain\Owner;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;
use Exception;

class MySqlOwnerRepository implements OwnerRepository
{
    private $em;

    public function __construct( $entityManager)
    {
        $this->em = $entityManager;
    }
    public function findAll():array
    {
        try{

        return $this->em->getRepository(Owner::class)->findAll();

        } catch (Exception $e) {
            return  $array = ["error" => "Se produjo un error"];

        }
    }

    public function saveOwner(Owner $owner): ?array
    {
        try {

            $this->em->getManager()->persist($owner);
            $this->em->getManager()->flush();
            return null;

        } catch (Exception $e) {
            return  $array = ["error" => "Se produjo un error"];

        }
    }

    public function findOwnerById(int $ownerId): Owner
    {
         $owner = $this->em->getRepository(Owner::class)->findOneBy(['id' => $ownerId]);

         if (is_null($owner)){

             throw new Exception('Se produjo un error');
         }

         return $owner;


    }

}