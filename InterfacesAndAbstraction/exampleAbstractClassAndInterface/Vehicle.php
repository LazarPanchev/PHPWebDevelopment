<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.10.2018 г.
 * Time: 11:22
 */

abstract class Vehicle
{
    private $color;
    const lights='xenon';
    public abstract function drive():string;

    public abstract function wash(string $method):string;

    public function clean():string{
        return 'Clean';
    }
}