<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Domain\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use MyApp\Component\Product\Application\UseCases\ListProductsUseCase;
use MyApp\Component\Product\Application\UseCases\RegisterNewProductUseCase;
use MyApp\Component\Product\Application\UseCases\DeleteProductUseCase;
use MyApp\Component\Product\Application\UseCases\UpdateProductUseCase;
use MyApp\Component\Product\Application\Dto\ProductDto;
use MyApp\Bundle\ProductBundle\Product\Repository\MySqlProductRepository;
use MyApp\Bundle\ProductBundle\Owner\Repository\MySqlOwnerRepository;



class ProductController extends Controller
{

    public function newProduct(Request $request): Response
    {

        $json = json_decode($request->getContent(), true);


        try {

            $em = $this->getDoctrine();
            $productRepository = new MySqlProductRepository($em);
            $ownerRepository = new MySqlOwnerRepository($em);
            $productDto = new ProductDto((string)$json['name'], $json['price'], $json['description'], $json['ownerId']);
            $useCase = new RegisterNewProductUseCase($productRepository, $ownerRepository);
            $useCase->registerProduct($productDto);
            return new Response('', 201);

            }catch (Exception $e) {

                throw new Exception('Se produjo un error');
            }


    }

    public function deleteProduct($id) : Response
    {

        try {

            $em = $this->getDoctrine();
            $productRepository = new MySqlProductRepository($em);
            $useCase = new DeleteProductUseCase($productRepository);
            $useCase->deleteProduct($id);
            return new Response('', 200);

        }catch (Exception $e) {

            throw new Exception('Se produjo un error');
        }


    }


    public function updateProduct(Request $request, $id)
    {

        /*$json = json_decode($request->getContent(), true);

        $product = $this->getDoctrine()->getRepository('\MyApp\Component\Product\Domain\Product')->findOneBy(['id' => $id]);

        $product->setName($json['name']);
        $product->setPrice($json['price']);
        $product->setDescription($json['description']);

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return new Response('', 200);*/
        $json = json_decode($request->getContent(), true);

        try {

            $em = $this->getDoctrine();
            $productRepository = new MySqlProductRepository($em);
            $useCase = new UpdateProductUseCase($productRepository);
            $productDto = new ProductDto((string)$json['name'], $json['price'], $json['description'], $json['ownerId']);
            $useCase->updateProduct($id,$productDto);
            return new Response('', 200);

        }catch (Exception $e) {

            throw new Exception('Se produjo un error');
        }

    }

    public function listProduct():JsonResponse
    {

        $em = $this->getDoctrine();

        $products = (new ListProductsUseCase(new MySqlProductRepository($em)))->listAll();


        if (!isset($owners['error'])){
            $productsAsArray = array_map(function (Product $product) {
                return $product->productToArray();
            }, $products);

            return new JsonResponse($productsAsArray);

        }else{
            return new JsonResponse($products['error'], 400);
        }

    }




}