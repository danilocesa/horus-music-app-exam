<?php

namespace App\Controller;

use App\Service\GeometryCalculator;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class CircleController
{   
    private $geoCalculator;

    public function __construct(){
        $this->geoCalculator = new GeometryCalculator();
    }

    #[Route(
        '/circle/{radius}'
        , methods: ['GET', 'HEAD']
        , requirements: ['a' => '\d+']
    )]
    public function show(int $radius): JsonResponse
    {
        $message =[
            'type'=> $this->geoCalculator::CIRCLE_SHAPE_NAME
            , 'radius' => $radius
            , 'surface' => $this->geoCalculator->calcSurface($this->geoCalculator::CIRCLE_CODE,[$radius])
            , 'circumference' => $this->geoCalculator->cirCumference($radius)
        ];

        return new JsonResponse($message);
    }

}