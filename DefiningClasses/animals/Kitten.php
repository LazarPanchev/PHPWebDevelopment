<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 23.10.2018 г.
 * Time: 17:11 ч.
 */

    class Kitten extends Animal
    {
        public function produceSound()
        {
            return 'Miau' .PHP_EOL;
        }

        public function __toString()
        {
            return "Kitten {$this->getName()} {$this->getAge()} {$this->getGender()}" . "\n" .
                $this->produceSound();
        }

    }