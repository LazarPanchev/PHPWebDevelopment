<?php


class InvalidSongException extends Exception
{
    /**
     * @var string
     */
   protected $message;

   public function __construct(string $message) //, int $code = 0, Throwable $previous = null)
   {
       $this->setMessage($message);
   }

   protected function setMessage(string $message):void{
       $this->message=$message;
   }
}