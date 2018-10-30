<?php


namespace Database;

class User
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    public function getUsername():string{
        return $this->username;
    }

    private function setUsername(string $username):void{
        $this->username=$username;
    }

    public function getPassword():string{
        return $this->password;
    }

    private function setPassword(string $password):void{
        $this->password=$password;
    }
}