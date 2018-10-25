<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 23.10.2018 г.
 * Time: 8:24
 */

class MoodFactory
{
    public static function getMood($points)
    {
        if($points<-5){
           return  new Angry();
        }elseif ($points<0){
            return new Sad();
        }elseif ($points<15){
            return new Happy();
        }else{
            return new PHP();
        }
    }
}