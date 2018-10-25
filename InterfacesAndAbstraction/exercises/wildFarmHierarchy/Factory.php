<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 24.10.2018 г.
 * Time: 11:50
 */

class Factory
{
    public static function getAnimal(array $tokens):Animal{
        $animalType=$tokens[0];
        $animalName=$tokens[1];
        $animalWeight=floatVal($tokens[2]);
        $animalLivingRegion=$tokens[3];
        if (count($tokens) == 5) {
            $catBreed=$tokens[4];
            if(class_exists($animalType)){
                return new $animalType($animalName,$animalType,$animalWeight,$animalLivingRegion,$catBreed);
            }
        }else {
            if(class_exists($animalType)){
                return new $animalType($animalName,$animalType,$animalWeight,$animalLivingRegion);
            }
        }
        return null;
    }

    public static function getFood(array $tokens):Food{
        $foodType=strtolower($tokens[0]);
        $quantity=intval($tokens[1]);

        if(class_exists($foodType)){
            return new $foodType($quantity);
        }else{
            return null;
        }
    }
}