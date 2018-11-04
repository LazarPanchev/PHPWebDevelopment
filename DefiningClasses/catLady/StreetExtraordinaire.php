<?php

class StreetExtraordinaire extends Cat
{
    /**
     * @var float
     */
    private $meowing;

    private $type;

    public function catSpecific(string $specific)
    {
        $this->meowing=floatval($specific);
        $this->type='StreetExtraordinaire';
    }

    private function  getMeowing():float
    {
        return $this->meowing;
    }

    public function __toString()
    {
        return "{$this->type} {$this->getName()} {$this->getMeowing()}";
    }
}