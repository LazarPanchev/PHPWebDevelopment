<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 23.10.2018 г.
 * Time: 18:49 ч.
 */

abstract class Cat
{
    /**
     * @var string
     */
    private $name;

    /**
     * Cat constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
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

    public abstract function catSpecific(string $specific);

    public abstract function __toString();
}