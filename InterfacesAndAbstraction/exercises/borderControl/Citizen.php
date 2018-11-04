<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 14:57 ч.
 */

class Citizen implements ICheckerId,ICheckerDate
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

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthDate
     */
    public function __construct(string $name, int $age, string $id, string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthDate);
    }

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthDay
     */

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }


    public function checkId(string $id):bool
    {
        $countDigits=strlen($id);
        return substr($this->id,-$countDigits)==$id;
    }

    public function checkDate(string $date): bool
    {
        $countDigits=strlen($date);
        return substr($this->getBirthDate(),-$countDigits)==$date;
    }

}