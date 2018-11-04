<?php

class Archangel extends Character implements HashPassword
{
    /**
     * @var float
     */
    protected $mana;

    public function __construct(string $username, int $level, float $mana)
    {
        parent::__construct($username, $level);
        $this->setMana($mana);
    }

    public function hash()
    {
        parent::setHashedPassword(strrev($this->getUsername()) . round(strlen($this->getUsername())*21));
    }

    /**
     * @return float
     */
    protected function getMana(): float
    {
        return $this->mana;
    }

    /**
     * @param float $mana
     */
    private function setMana(float $mana): void
    {
        $this->mana = $mana;
    }


    public function __toString()
    {
        $charType=get_class($this);
        $totalPoints=($this->getMana()*$this->getLevel());
        return "\"{$this->getUsername()}\" | \"{$this->getHashedPassword()}\" -> {$charType}\n{$totalPoints}";
    }
}