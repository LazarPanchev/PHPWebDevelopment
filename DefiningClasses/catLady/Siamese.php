<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 23.10.2018 г.
 * Time: 18:50 ч.
 */

class Siamese extends Cat
{
    /**
     * @var float
     */
    private $earSize;

    private $type;

    public function catSpecific(string $specific)
    {
        $this->earSize=floatval($specific);
        $this->type='Siamese';
    }

    private function  getEarSize():float
    {
        return $this->earSize;
    }


    public function __toString()
    {
        return "{$this->type} {$this->getName()} {$this->getEarSize()}";
    }
}