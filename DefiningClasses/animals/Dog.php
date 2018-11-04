<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 23.10.2018 г.
 * Time: 17:10 ч.
 */

class Dog extends Animal
{

    public function produceSound()
    {
        return 'BauBau' .PHP_EOL;
    }

    public function __toString()
    {
        return "Dog {$this->getName()} {$this->getAge()} {$this->getGender()}" . "\n" .
            $this->produceSound();
    }

}