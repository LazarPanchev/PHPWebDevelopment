<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 23.10.2018 г.
 * Time: 17:11 ч.
 */

class Tomcats extends Animal
{

    public function produceSound()
    {
        return 'Give me one million b***h' .PHP_EOL;
    }
    public function __toString()
    {
        return "Tomcat {$this->getName()} {$this->getAge()} {$this->getGender()}" . "\n" .
            $this->produceSound();
    }


}