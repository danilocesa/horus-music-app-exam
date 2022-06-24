<?php

namespace App\Controller;

use App\Service\GeometryCalculator;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class TriangleController
{   
    private $geoCalculator;

    public function __construct(){
        $this->geoCalculator = new GeometryCalculator();
    }

    #[Route(
        '/triangle/{a}/{b}/{c}'
        , methods: ['GET', 'HEAD']
        , requirements: ['a' => '\d+', 'b' => '\d+', 'c' => '\d+' ]
    )]
    public function show(int $a, int $b, int $c): JsonResponse
    {
        $message =[
            'type'=> $this->geoCalculator::TRIANGLE_SHAPE_NAME
            , 'points' => ['a'=>$a,'b'=>$b,'c'=>$c]
            , 'surface' => $this->geoCalculator->calcSurface($this->geoCalculator::TRIANGLE_CODE,[$a,$b])
            , 'perimeter/circumference' => $this->geoCalculator->calcPerimeter($this->geoCalculator::TRIANGLE_CODE,[$a,$b,$c])
        ];

        return new JsonResponse($message);
    }

}