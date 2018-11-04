<?php

class Pet implements ICheckerDate {
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $birthDate;

    /**
     * Pet constructor.
     * @param string $name
     * @param string $birthDate
     */
    public function __construct(string $name, string $birthDate)
    {
        $this->setName($name);
        $this->setBirthDate($birthDate);
    }

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

    public function checkDate(string $date): bool
    {
        $countDigits=strlen($date);
        return substr($this->getBirthDate(),-$countDigits)==$date;
    }

}