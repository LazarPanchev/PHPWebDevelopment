<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19.10.2018 г.
 * Time: 11:52
 */

class InvalidSongMinutesException extends InvalidSongLengthException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}