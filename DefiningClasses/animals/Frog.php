<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 23.10.2018 г.
 * Time: 17:10 ч.
 */

class Frog extends Animal
{

    public function produceSound()
    {
        return 'Frogggg' .PHP_EOL;
    }
    public function __toString()
    {
        return "Frog {$this->getName()} {$this->getAge()} {$this->getGender()}" . "\n" .
            $this->produceSound();
    }

}