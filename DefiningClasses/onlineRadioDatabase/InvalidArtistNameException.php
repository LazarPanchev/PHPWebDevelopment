<?php


class InvalidArtistNameException extends InvalidSongException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}