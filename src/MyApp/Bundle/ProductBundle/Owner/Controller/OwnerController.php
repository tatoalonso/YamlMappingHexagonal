<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use MyApp\Component\Product\Application\UseCases\ListOwnersUseCase;
use MyApp\Component\Product\Application\UseCases\RegisterNewOwnerUseCase;
use MyApp\Component\Product\Domain\Owner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use MyApp\Component\Product\Application\Dto\OwnerDto;
use MyApp\Bundle\ProductBundle\Owner\Repository\MySqlOwnerRepository;

class OwnerController extends Controller
{

    public function newOwner(Request $request):Response
    {

        $json = json_decode($request->getContent(), true);


        $em = $this->getDoctrine();
        $repository = new MySqlOwnerRepository($em);
        $ownerDto = new OwnerDto((string)$json['name']);
        $useCase = new RegisterNewOwnerUseCase($repository);
        $result = $useCase -> registerOwner($ownerDto);

        if (!isset($result['error'])){

            return new Response('', 201);

        }else{
            return new Response($result['error'], 400);
        }

    }

    public function listOwner() :JsonResponse
    {
        $em = $this->getDoctrine();

        $owners = (new ListOwnersUseCase(new MySqlOwnerRepository($em)))->listAll();


        if (!isset($owners['error'])){
            $ownersAsArray = array_map(function (Owner $owner) {

                return $owner->ownerToArray();

            }, $owners);

            return new JsonResponse($ownersAsArray);
        }else{
            return new JsonResponse($owners['error'], 400);
        }
    }


}