<?php
namespace App\Service;

class GeometryCalculator
{   
    const TRIANGLE_CODE = 1;
    const TRIANGLE_SHAPE_NAME = "triangle";
    const CIRCLE_CODE = 2;
    const CIRCLE_SHAPE_NAME = "circle";

     /**
     * Calculate surface of triange, circle, cube, cylinder, etc
     *
     * @param int   $geoShapes  Check what type of geometry
     * @param array $points     Points in geometry
     *
     * @return integer          The calculated area of shapes
     *
     * @throws \Exception       When an invalid parameter is provided
     */
    public function calcSurface(int $geoShapes, array $points)
    {
        !is_array($points) || empty($geoShapes) ? throw new \Exception('calcSurface -> Invalid parameter') : null; // For checking valid parameter

        $surface = 0;
        switch($geoShapes){
            case 1 : $surface = $this->triangleSurface($points); break;
            case 2 : $surface = $this->circleSurface($points[0]); break;
        }

        return $surface;
    }

     /**
     * Calculate surface of triangle
     *
     * @param array $points    Points location in triangle
     *
     * @return integer         The calculated area of triangle
     *
     * @throws \Exception      When an invalid points is provided
     */
    private function triangleSurface(array $points)
    {
        sizeof($points) > 2 ? throw new \Exception('triangleSurface -> Triangle points is more than 2') : null;

        return ($points[0] * $points[1]) / 2;
    }

     /**
     * Calculate surface of circle
     * 
     * @param integer $radius    Points location in circle
     *
     * @return integer         The calculated area of circle
     *
     */
    private function circleSurface(int $radius)
    {
        return pi() * ($radius ** 2);;
    }


     /**
     * Calculate perimeter of triange, square
     *
     * @param int   $geoShapes  Check what type of geometry
     * @param array $points     Points in geometry
     *
     * @return integer          The calculated perimeter of shapes
     *
     * @throws \Exception       When an invalid parameter is provided
     */
    public function calcPerimeter(int $geoShapes, array $points)
    {
        !is_array($points) || empty($geoShapes) ? throw new \Exception('calcPerimeter -> Invalid parameter') : null; // For checking valid parameter

        $perimeter = 0;
        switch($geoShapes){
            case 1 : $perimeter = $this->trianglePerimeter($points); break;
        }

        return $perimeter;
    }   

     /**
     * Calculate perimeter of triangle
     *
     * @param array $points    Points location in triangle
     *
     * @return integer         The calculated perimeter of triangle
     *
     * @throws \Exception      When an invalid points is provided
     */
    private function trianglePerimeter(array $points)
    {
        sizeof($points) > 3 ? throw new \Exception('triangleSurface -> Triangle points is more than 3') : null;

        return $points[0] + $points[1] + $points[2];
    }

    /**
     * Calculate circumference of circle
     *
     * @param integer $radius  Points location in circle
     *
     * @return integer         The calculated circumference of circle
     *
     */
    public function cirCumference(int $radius)
    {
        return 2 * pi() * $radius;
    }  

}