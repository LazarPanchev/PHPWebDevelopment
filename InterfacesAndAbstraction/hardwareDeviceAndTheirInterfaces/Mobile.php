<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 23:28 ч.
 */

abstract  class Mobile
{
    /**
     * @var String string
     */
    protected $operator;

    /**
     * @var bool
     */
    protected $canCall;

    /**
     * @var string string
     */
    protected $battery;

    protected $writtenText;

    public function __construct(string $operator, bool $canCall, string $battery)
    {
        $this->operator=$operator;
        $this->canCall=$canCall;
        $this->battery=$battery;
    }

    public function getWrittenText(){
        return $this->writtenText;
    }

    public abstract function getSize();

}