<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 23.10.2018 г.
 * Time: 9:40
 */

abstract class Food
{
    /**
     * @var int
     */
    protected $points;

    abstract function __construct();

    public function getPoints():int{
        return $this->points;
    }
}