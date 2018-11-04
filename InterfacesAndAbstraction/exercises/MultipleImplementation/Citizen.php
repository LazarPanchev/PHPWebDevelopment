<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 10:46 ч.
 */

class Citizen implements Person,Identifiable, Birthable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $birthDate;

    public function __construct(string $name, int $age, string $id, string $birthDate)
    {
            $this->setName($name);
            $this->setAge($age);
            $this->setId($id);
            $this->setBirthdate($birthDate);
    }

    public function setName(string $name):void
    {
        $this->name=$name;
    }

    public function setAge(int $age):void
    {
        $this->age=$age;
    }


    public function setId(string $id):void{
        $this->id=$id;
    }

    public function setBirthdate(string $birthDate): void
    {
        $this->birthDate=$birthDate;
    }


    public function __toString()
    {
        return "{$this->name}\n{$this->age}\n{$this->id}\n{$this->birthDate}";
    }
}