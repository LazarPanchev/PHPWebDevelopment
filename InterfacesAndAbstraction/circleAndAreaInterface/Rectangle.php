<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 22:58 ч.
 */

class Rectangle implements Area
{
    private $width;

    private $height;

    public function __construct(float $width, float $height)
    {
        $this->width=$width;
        $this->height=$height;
    }

    public function getSurface()
    {
       return $this->height * $this->width;
    }

    public function getArea(){
        return $this->width*2 + $this->height*2;
    }

}