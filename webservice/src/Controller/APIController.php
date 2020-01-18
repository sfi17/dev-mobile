<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Parking;
use App\Form\ParkingType;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ParkingRepository;

/**
* @Route("/api", name="api_")
*/
     
class APIController extends AbstractController
{
    
    /** @Route("/parking", name="parking")
     * @Method({"GET"})
     */
    public function listAction(ParkingRepository $parkingRepository): Response
    {
        $articles = $parkingRepository->findAll();
        $data = $this->get('jms_serializer')->serialize($articles, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
