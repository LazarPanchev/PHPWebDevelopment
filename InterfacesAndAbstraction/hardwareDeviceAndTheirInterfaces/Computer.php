<?php

abstract class Computer
{
    /**
     * @var float
     */
    protected $ram;

    /**
     * @var float
     */
    protected $processor;

    /**
     * Computer constructor.
     * @param $ram
     * @param $processor
     */
    public function __construct(float $ram, float $processor)
    {
        $this->ram = $ram;
        $this->processor = $processor;
    }


    public abstract function getParameters();

    protected function printData(){
        return $this->ram . ' ' .  $this->processor;
    }

}