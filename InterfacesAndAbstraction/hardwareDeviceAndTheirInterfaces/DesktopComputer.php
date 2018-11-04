<?php


class DesktopComputer extends Computer implements Keyboard,Mouse
{
    public function getParameters()
    {
        return 'Desktop computer: params' .PHP_EOL;
    }

    public function pressKey(){
        return 'key pressed' . PHP_EOL;
    }

    public function changeStatus(){
        return 'changed status' . PHP_EOL;
    }

    public function keyboardColor(){
        return 'black' . PHP_EOL;
    }

    public function click(){
        return 'clicked' . PHP_EOL;
    }

    public function move(){
        return 'moved' . PHP_EOL;
    }

}