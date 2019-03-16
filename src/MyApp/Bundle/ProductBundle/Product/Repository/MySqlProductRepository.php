<?php


namespace MyApp\Bundle\ProductBundle\Product\Repository;

use MyApp\Component\Product\Domain\Product;
use Exception;
use MyApp\Component\Product\Domain\Repository\ProductRepository;

class MySqlProductRepository implements ProductRepository
{
    private $em;

    public function __construct( $entityManager)
    {
        $this->em = $entityManager;
    }
    public function findAll():array
    {
        try{

            return $this->em->getRepository(Product::class)->findAll();

        } catch (Exception $e) {
            return  $array = ["error" => "Se produjo un error"];

        }
    }

    public function saveProduct(Product $product): ?array
    {
        try {

            $this->em->getManager()->persist($product);
            $this->em->getManager()->flush();
            return null;

        } catch (Exception $e) {
            return  $array = ["error" => "Se produjo un error"];

        }
    }

    public function deleteProduct(int $idProduct): void
    {
        try{

            $product = $this->em->getManager()->getReference(Product::class, $idProduct);
            $this->em->getManager()->remove($product);
            $this->em->getManager()->flush();



        } catch (Exception $e) {

            throw new Exception('Se produjo un error');

        }
    }

    public function updateProduct(Product $product): void
    {

        try{

            $this->em->getManager()->flush();

        } catch (Exception $e) {

            throw new Exception('Se produjo un error');

        }
    }

    public function findProductById(int $productId): Product
    {
        $product = $this->em->getRepository(Product::class)->findOneBy(['id' => $productId]);

        if (is_null($product)){

            throw new Exception('Se produjo un error');
        }

        return $product;
    }
}