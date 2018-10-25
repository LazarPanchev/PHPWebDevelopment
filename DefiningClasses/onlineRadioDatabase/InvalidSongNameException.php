<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19.10.2018 г.
 * Time: 11:43
 */

class InvalidSongNameException extends InvalidSongException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }

}