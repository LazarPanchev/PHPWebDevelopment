<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 20:14 ч.
 */

class Demon extends Character implements HashPassword
{
    /**
     * @var float
     */
    protected $energy;

    public function __construct(string $username, float $level, float $energy)
    {
        parent::__construct($username, $level);
        $this->setEnergy($energy);

    }

    private function setEnergy(float $energy):void{
        $this->energy=$energy;
    }

    public function getEnergy():float{
        return $this->energy;
    }

    public function hash()
    {
        parent::setHashedPassword(round(strlen($this->username) * 217));
    }

    public function __toString()
    {
        $charType=get_class($this);
        $totalPoints=number_format(($this->getEnergy()*$this->getLevel()),1,'.','');
        return "\"{$this->getUserName()}\" | \"{$this->getHashedPassword()}\" -> {$charType}\n{$totalPoints}";
    }
}