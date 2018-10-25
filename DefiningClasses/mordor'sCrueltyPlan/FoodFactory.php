<?php


 class FoodFactory
{
    public static function returnNewFood($foodName)
    {
        $possibleFood=['cram','lembas','apple','melon','honeycake','mushrooms'];
        if(in_array($foodName,$possibleFood)){
            return new $foodName();
        }else{
            return new OtherFood();
        }

    }
}