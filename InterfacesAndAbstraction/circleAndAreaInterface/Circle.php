<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 22:50 ч.
 */

class Circle implements Area,Circumference
{

    private $radius;

    public function __construct(float $radius)
    {
        $this->radius=$radius;
    }

    public function getSurface()
    {
        return pi() * $this->radius * $this->radius;
    }

    public function getCircumference()
    {
        return 2 * pi() * $this->radius;
    }

}