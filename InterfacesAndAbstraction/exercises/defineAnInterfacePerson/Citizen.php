<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 10:46 ч.
 */

class Citizen implements Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    public function __construct(string $name, int $age)
    {
            $this->setName($name);
            $this->setAge($age);
    }

    public function setName(string $name):void
    {
        $this->name=$name;
    }

    public function setAge(int $age):void
    {
        $this->age=$age;
    }

    public function __toString()
    {
        return "{$this->name}\n{$this->age}\n";
    }
}