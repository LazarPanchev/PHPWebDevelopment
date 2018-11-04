<?php

class Laptop extends Computer implements Keyboard,Mouse,TouchScreen
{
    public function getParameters()
    {
        return 'Laptop: params' . PHP_EOL;
    }

    public function pressKey(){
        return 'L key pressed' . PHP_EOL;
    }

    public function changeStatus(){
        return 'L changed status' . PHP_EOL;
    }

    public function keyboardColor(){
        return 'L black' . PHP_EOL;
    }

    public function click(){
        return 'L clicked' . PHP_EOL;
    }

    public function move(){
        return 'L moved' . PHP_EOL;
    }

    public function moveFinger(){
        return 'L moved finger'  . PHP_EOL;
    }

    public function clickFinger(){
        return 'L clicked finger'  . PHP_EOL;
    }


    public function writeText(){
        return 'L write text'  . PHP_EOL;
    }

}