<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 2.11.2018 г.
 * Time: 18:39 ч.
 */

namespace App\Data;


class ErrorDTO
{
    private $message;

    /**
     * ErrorDTO constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }



}