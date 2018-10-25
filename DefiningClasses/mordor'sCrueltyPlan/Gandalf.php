<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 23.10.2018 г.
 * Time: 9:13
 */

class Gandalf
{

    private $totalPoints;

    private $mood;

    public function __construct()
    {
        $this->totalPoints=0;
        $this->mood=null;
    }

    public function eat($food){
        $this->totalPoints+=$food->getPoints();
    }

    public function getTotalPoints(){
        return $this->totalPoints;
    }

    public function getMood($moodObj){
        return $moodObj->getMood();
    }
}