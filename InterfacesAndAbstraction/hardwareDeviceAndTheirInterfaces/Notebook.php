<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 10:14 ч.
 */

class Notebook extends Mobile implements TouchScreen,Keyboard,Mouse
{


    public function pressKey()
    {
        // TODO: Implement pressKey() method.
    }

    public function changeStatus()
    {
        // TODO: Implement changeStatus() method.
    }

    public function keyboardColor()
    {
        // TODO: Implement keyboardColor() method.
    }

    public function getSize()
    {
        // TODO: Implement getSize() method.
    }

    public function click()
    {
        // TODO: Implement click() method.
    }

    public function move()
    {
        // TODO: Implement move() method.
    }

    public function moveFinger()
    {
        // TODO: Implement moveFinger() method.
    }

    public function clickFinger()
    {
        // TODO: Implement clickFinger() method.
    }

    public function writeText()
    {
        $this->writtenText='N++ text';
    }
}