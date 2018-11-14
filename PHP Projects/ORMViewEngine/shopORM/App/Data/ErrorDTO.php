<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 17:00
 */

namespace App\Data;


class ErrorDTO
{
    /**
     * @var string
     */
    private $message;

    public function __construct(string $message)
    {
        $this->message=$message;
    }

    public function getMessage(){
        return $this->message;
    }

}