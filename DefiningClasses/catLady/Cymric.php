<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 23.10.2018 г.
 * Time: 19:02 ч.
 */

class Cymric extends Cat
{
    /**
     * @var float
     */
    private $furLength;

    private $type;

    public function catSpecific(string $specific)
    {
        $this->furLength=floatval($specific);
        $this->type='Cymric';
    }

    private function  getFurLength():float
    {
        return $this->furLength;
    }


    public function __toString()
    {
        return "{$this->type} {$this->getName()} {$this->getFurLength()}";
    }
}