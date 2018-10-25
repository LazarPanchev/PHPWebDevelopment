<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.10.2018 г.
 * Time: 11:24
 */

class Car extends Vehicle
{
    public function drive():string {
        return "Driving";
    }

    public function wash(string $method):string {
        if($method=='shampoo'){
            return "not washing";
        }
        return "Washing" . self::lights;
    }
}